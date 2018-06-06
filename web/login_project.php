<?php
session_start();
// connect to db
require('php/dbconnect.php');
require('php/project.php');


if(isset($_POST['login'])){
  // queries
  $dbq1 = "SELECT password FROM public.user WHERE username=?";
  $dbq2 = "SELECT crypt(?,?)";
  // fetch encrypted password
  $pwquery1 = $db->prepare($dbq1);
  $pwquery1->execute([$_POST['usrname']]);
  $pw1 = $pwquery1->fetch();
  // encrypt given password
  $pwquery2 = $db->prepare($dbq2);
  $pwquery2->execute([$_POST['usrpwd'],$pw1[0]]);
  $pw2 = $pwquery2->fetch();
  // compare hashes and check if valid user
  if($pw2[0] == $pw1[0] && existingUsername($_POST['usrname'])){
    $_SESSION['user'] = $_POST['usrname'];
    // redirect to avoid multiple executions
    header("Location: project/tasklist.php");//."?user=".$_POST['usrname']);
    die();
  }
  else $error = "Invalid Username or Password";
}

?>
<html>
<head>
  <title>Login</title>
  <link rel="stylesheet" href="css/project.css">
  <script src="js/project.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
  <div class="header">Task Manager - Login in</div>
  <form method="post" action="">
    <div class="imgsignin">
      <img src="img/task.png">
    </div>

    <div class="signin">
      <lable for="usrname"><b>Username:</b></lable>
      <input class="signin" type="text" placeholder="Enter Username" name="usrname" required>
      <br />

      <lable for="usrpwd"><b>Password:</b></lable>
      <input class="signin" type="password" placeholder="Enter Password" name="usrpwd" required>

      <lable for="login"><span style="color:red"><?php echo $error?></span></lable>
      <button class="loginbtn" type="submit" name="login">Login</button>
      <a class="loginbtn" href="project/newuser.php">Create User</a>

    </div>
  </form>
</body>
</html>
