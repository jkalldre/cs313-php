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
    $_SESSION['db'] = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
  }
  catch (PDOException $ex)
  {
    echo 'Error!: ' . $ex->getMessage();
    die();
  }
}
if(!isset($_SESSION['db'])) alert("DB IS NOT SET");
else alert("db is set");
if($dbtest){
  $dbq1 = "SELECT title FROM public.task WHERE user_id=(SELECT user_id FROM public.user WHERE username=?)";
  alert($dbq1);
  $pwquery1 = $_SESSION['db']->prepare($dbq1);
  alert($user);
  $pwquery1->execute([$user]);
  $pw1 = $pwquery1->fetch();
  $pw1 = array_map("flattentask", $pw1);
  alert("Executed q1");

}


function flattentask($item) { return $item[0]; }

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
      <form>
      </form>
    </div>
    <div class="column right">
      <h2>Column 2</h2>
      <?php
      foreach($pw1 as $task){
        echo "<div class='task'>$task</div>";
      }
      ?>
      <div class="task">stuff</div>
      <div class="task">stuff</div>
    </div>
  </div>

</body>
</html>
