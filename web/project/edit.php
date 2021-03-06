<?php
session_start();
// $user = $_GET['user'];
$user = $_SESSION['user'];//$_GET['user'];
$taskid = $_GET['edit'];
$userstr = 'edit.php?edit='.$taskid;
require('../php/dbconnect.php');
require('../php/project.php');

$dbq1 = "SELECT task_id,title, category_id FROM public.task WHERE user_id=(SELECT user_id FROM public.user WHERE username=?)";
$pwquery1 = $db->prepare($dbq1);
$pwquery1->execute([$user]);
$pw1 = $pwquery1->fetchAll(PDO::FETCH_ASSOC);
$categories = getCategories();

$taskid = $_GET['edit'];
$dbq_main = "SELECT title,category_id,due_date FROM public.task WHERE task_id=?";
$query_main = $db->prepare($dbq_main);
$query_main->execute([$taskid]);
$main = $query_main->fetchAll(PDO::FETCH_ASSOC);

if (isset($_POST['newt1'])){
  try{
    $title = $_POST['title1'];
    $category = $_POST['category1'];
    // if given category doesn't exist, add it.
    if (!existingCategory($category)){
      insertCategory($category);
      $categories = getCategories();
    }
    for($i = 0; $i < count($categories);$i++){
      if($category == $categories[$i]['title']){
        $category = $i+1;
      }
    }

    $date = $_POST['date1'];
    if(!empty($_POST['date1'])){
    $dbq3 = "UPDATE task
             SET title=?,
             category_id=?,
             due_date=?
             WHERE task_id=?";
             $update = $db->prepare($dbq3);
             $update->execute([$title,$category,$date,$taskid]);
  } else{
    $dbq3 = "UPDATE task
             SET title=?,
             category_id=?
             WHERE task_id=?";
             $update = $db->prepare($dbq3);
             $update->execute([$title,$category,$taskid]);
  }
    header('location:tasklist.php');

  } catch (PDOException $e){
    $e->getMessage();
    echo $e;
  }
}
?>

<html>
<head>
  <title>Task Editor</title>
  <link rel="stylesheet" href="../css/project.css">
  <script src="../js/project.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
  <div class="header">Task Editor</div>
  <div class="row">
    <div class= "column left">
      <h2>Edit Task</h2>
      <form method="post" action=<?php echo $userstr ?>>
        <table class="">
          <tr><td><lable for="title1"><b>Task Name:</b></lable></td>
            <td><input class="" type="text" placeholder="Task Name" name="title1" value="<?php echo $main[0]['title']?>" required></td></tr>
            <tr><td><lable for="category1"><b>Category:</b></lable></td>
              <td><input class="" type="text" placeholder="Category" name="category1" value="<?php echo $categories[$main[0]['category_id']-1]['title']?>"></td></tr>
              <tr><td><lable for="date1"><b>Due Date:</b></lable></td>
                <td><input type="date" name="date1" value=<?php echo $main[0]['due_date'] ?> ></td></tr>
              </table>
              <button class="loginbtn" type="submit" name="newt1" value="process">Edit Task</button>
            </form>
          </div>

        </div>
        <a class="" href="../login_project.php"><button class="loginbtn logout" type="push" name="" value="process">Log Out</button></a>

      </body>
      </html>
