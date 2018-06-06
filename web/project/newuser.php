<?php
session_start();
// connect to db
require('../php/dbconnect.php');

// insert new user into public.user
if(isset($_POST['newuser'])){
    $user = $_POST['usrname'];
    $pass1 = $_POST['usrpwd'];
    $pass2 = $_POST['usrpwd1'];
    // only insert if two passwords given are equal
    if($pass1 == $pass2){
      global $db;
      try{
        // username is unique and will not insert duplicates
        $dbq = "INSERT INTO public.user (username, password)
        VALUES ('$user',crypt('$pass1', gen_salt('bf'))) ";
        $db->exec($dbq);
        // redirect and avoid multiple executions
        header("Location: ../login_project.php?user=".$_POST['usrname']);

      } catch (PDOException $e){
        $e->getMessage();
        echo $e;
      }
    }
    else $error = "Passwords don't match!";
}

?>
<html>
<head>
  <title>Login</title>
  <link rel="stylesheet" href="../css/project.css">
  <script src="../js/project.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
  <div class="header">Task Manager - New User</div>
  <form method="post" action="">
    <div class="imgsignin">
      <img src="../img/newuser.png">
    </div>

    <div class="signin">
      <lable for="usrname"><b>Username:</b></lable>
      <input class="signin" type="text" placeholder="Enter Username" name="usrname" required>
      <br />

      <lable for="usrpwd"><b>Password:</b></lable>
      <input class="signin" type="password" placeholder="Enter Password" name="usrpwd" required>

      <lable for="usrpwd1"><b>Confirm Password:</b></lable>
      <input class="signin" type="password" placeholder="Confirm Password" name="usrpwd1" required>

      <lable for="newuser"><span style="color:red"><?php echo $error?></span></lable>
      <button class="loginbtn" type="submit" name="newuser">Create User</button>
      <a class="loginbtn" href="../login_project.php">Return to Login</a>
    </div>
  </form>
</body>
</html>
