<?php
  session_start();
  include('./php/dbconnect.php');
  alert("made it past dbconnect!");
  $pwd = 'supergoodpassword';
  function alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
  }
  // alert("wrong answer");
  if(isset($_POST['login'])){
    // alert($_POST['usrpwd'] == $pwd);
    // alert($_POST['usrpwd']);
    $pwquery = $db->query("SELECT password from public.user WHERE username='{$_POST['usrname']}';");
    $pwquery->execute();
    alert($pwquery);
  }
  ?>
<!-- <!doctype html> -->
<html>
<head>
  <title>Task Manager</title>
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

  <button class="loginbtn" type="submit" name="login">Login</button>
</div>
</form>
</body>
</html>
