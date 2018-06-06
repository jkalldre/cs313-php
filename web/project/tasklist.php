<?php
session_start();
$user = $_SESSION['user'];//$_GET['user'];
// used for redirects
$userstr = 'tasklist.php';//?user=' . $user;
// connect to db
require('../php/dbconnect.php');
require('../php/project.php');

// if user selected a task, kill it
if (isset($_GET['id'])){
  killTask($_GET['id']);
}

$sort = (isset($_POST['sort'])) ? $_POST['sort'] : 'category_id';
$dbq1 = "SELECT task_id,title, category_id, due_date
         FROM public.task
         WHERE user_id=(SELECT user_id FROM public.user WHERE username=?)
         ORDER BY $sort";
$pwquery1 = $db->prepare($dbq1);
$pwquery1->execute([$user]);
$pw1 = $pwquery1->fetchAll(PDO::FETCH_ASSOC);
$categories = getCategories();

if ($_POST['newt'] == 'process'){
  $title = $_POST['title'];
  $category = ucwords(strtolower($_POST['category']));
  $date = $_POST['due_date'];

  // if given category doesn't exist, add it.
  if (!existingCategory($category)){
    insertCategory($category);
    $categories = getCategories();
  }
  try {
    // use this query if date is given
    if (!empty($_POST['due_date'])) {
      $query = "INSERT INTO task (user_id,title,category_id,due_date) VALUES
      ((SELECT user_id FROM public.user WHERE username='$user')
      ,'$title'
      ,(SELECT category_id FROM public.category WHERE title='$category')
      ,'$date')";
      $db->exec($query);
      // otherwise use this query that excludes date.
    } else {
      $query = "INSERT INTO task (user_id,title,category_id) VALUES
      ((SELECT user_id FROM public.user WHERE username='$user')
      ,'$title'
      ,(SELECT category_id FROM public.category WHERE title='$category'))";
      $db->exec($query);
    }
    // redirect to avoid multiple executions.
    header('location:tasklist.php');//?user='.$user);

  } catch (PDOException $e){
    $e->getMessage();
    echo $e;
  }
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
  <div class="header">Task Manager </div>
  <div class="row">
    <div class= "column left">
      <h2>New Task</h2>
      <form method="post" action=<?php echo $userstr ?>>
        <table class="">
          <tr><td><lable for="title"><b>Task Name:</b></lable></td>
            <td><input class="" type="text" placeholder="Task Name" name="title" required></td></tr>
            <tr><td><lable for="category"><b>Category:</b></lable></td>
              <td><input class="" type="text" placeholder="Category" name="category" ></td></tr>
              <tr><td><lable for="date"><b>Due Date:</b></lable></td>
                <td><input type="date" name="due_date"></td></tr>


              </table>
              <button class="loginbtn" type="submit" name="newt" value="process">Add Task</button>
            </form>

          </div>
          <div class="column right">
            <h2>Tasks</h2>
            <form method="post">
              <lable for='sort'><b>Filter:</b></lable>
              <select name="sort" onchange="this.form.submit()">
                <option value=""></option>
                <option value="title">Title</option>
                <option value="category_id">Category</option>
                <option value="due_date">Due Date</option>
              </select></form>
              <?php
              echo "
              <div class='task'><table><tr>
              <td class='cl1'></td>
              <td class='cl2'>Task Title</td>
              <td class='cl3'>Category</td>
              <td class='cl4'>Due Date</td>
              </tr></table></div>";
              // populate task list.
              for($i = 0; $i < count($pw1); $i++){
                $index = $userstr . "&id=" . $pw1[$i]['task_id'];
                $edit = "edit.php?edit=". $pw1[$i]['task_id'];
                echo "
                <a href=$index>
                <div class='task'><table><tr>
                <td class='cl1'><a href=$edit><img src='../img/threedot.jpg' height='30px' width='10px'></a></td>
                <td class='cl2'>{$pw1[$i]['title']}</td>
                <td class='cl3'>{$categories[($pw1[$i]['category_id'])-1]['title']}</td>
                <td class='cl4'>{$pw1[$i]['due_date']}</td>
                </tr></table></div></a>";
              }
              ?>
            </div>
          </div>
          <a class="" href="../login_project.php"><button class="loginbtn logout" type="push" name="" value="process">Log Out</button></a>

        </body>
        </html>
