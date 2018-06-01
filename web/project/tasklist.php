<?php
session_start();
$user = $_GET['user'];

$dbtest = true;
if($dbtest) {
  $dbUrl = getenv('DATABASE_URL');
  $dbopts = parse_url($dbUrl);
  $dbHost = $dbopts["host"];
  $dbPort = $dbopts["port"];
  $dbUser = $dbopts["user"];
  $dbPassword = $dbopts["pass"];
  $dbName = ltrim($dbopts["path"],'/');

  try
  {
    $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
    // $db = new PDO("pgsql:host=$host;port=$port;dbname=$dbname;user=$user;password=$pass;");//, 'postgres', 'Sousheldon66');
  }
  catch (PDOException $ex)
  {
    echo 'Error!: ' . $ex->getMessage();
    die();
  }
}
// if(!isset($db)) alert("DB IS NOT SET");
// else alert("db is set");
function getCategories() {
  global $db;
  $dbq = "SELECT title, category_id FROM public.category";
  try{
    $query = $db->prepare($dbq);
    $query->execute();
    $categories = $query->fetchAll(PDO::FETCH_ASSOC);
    return $categories;
  } catch (PDOException $e){
    $e->getMessage();
    echo $e;
  }
}

if($dbtest){
  $dbq1 = "SELECT title, category_id FROM public.task WHERE user_id=(SELECT user_id FROM public.user WHERE username=?)";
  // alert($dbq1);
  $pwquery1 = $db->prepare($dbq1);
  // alert($user);
  $pwquery1->execute([$user]);
  $pw1 = $pwquery1->fetchAll(PDO::FETCH_ASSOC);
  $categories = getCategories();
  // print_r($categories);
}

if (isset($_POST['newt'])){
  $query = 'INSERT INTO public.task (user_id,title,category)';
  // // if(isset($_POST['date']))
  // // $query = 'INSERT INTO public.task (user_id,title,category,date)';
  $query = $query . "VALUES((SELECT user_id FROM public.user WHERE username='$user'),'$_POST['title']',2)";
  alert($query);
  // $prepared = $db->prepare($query);
  $prepared->execute();
  // $result = $prepared->fetchAll(PDO::FETCH_ASSOC);
}

function alert($msg) {
  echo "<script type='text/javascript'>alert('$msg');</script>";
}

?>

<html>
<head>
  <title>Task Manager</title>
  <link rel="stylesheet" href="../css/project.css">
  <script src="../js/project.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
  <div class="header">Task Manager</div>
  <div class="row">
    <div class= "column left">
      <h2>New Task</h2>
      <form method="post" action="">
        <table class="">
          <tr><td><lable for="title"><b>Task Name:</b></lable></td>
            <td><input class="" type="text" placeholder="Task Name" name="title" required></td></tr>
            <tr><td><lable for="category"><b>Category:</b></lable></td>
              <td><input class="" type="text" placeholder="Category" name="category" required></td></tr>
              <tr><td><lable for="date"><b>Due Date:</b></lable></td>
                <td><input type="date" name="date"/></td></tr>


              </table>
              <button class="loginbtn" type="submit" name="newt">Add Task</button>
            </form>
          </div>
          <div class="column right">
            <h2>Tasks</h2>
            <?php
            for($i = 0; $i < count($pw1); $i++){
              echo "<div class='task'><table><tr><td>{$pw1[$i]['title']}</td>
              <td>{$categories[($pw1[$i]['category_id'])-1]['title']}</td></tr></table></div>";
            }
            ?>
          </div>
        </div>

      </body>
      </html>
