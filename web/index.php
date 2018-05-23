<?php
session_start();
// unset($_POST['login']);
$dbtest = true;
if($dbtest && !isset($_POST['login'])) {
  $dbUrl = getenv('DATABASE_URL');
  $dbopts = parse_url($dbUrl);
  $dbHost = $dbopts["host"];
  $dbPort = $dbopts["port"];
  $dbUser = $dbopts["user"];
  $dbPassword = $dbopts["pass"];
  $dbName = ltrim($dbopts["path"],'/');
  alert("Synced");
  try
  {
    $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
  }
  catch (PDOException $ex)
  {
    echo 'Error!: ' . $ex->getMessage();
    die();
  }
}
alert("made it past dbconnect!");
// include('./php/dbconnect.php');
$pwd = 'supergoodpassword';
function alert($msg) {
  echo "<script type='text/javascript'>alert('$msg');</script>";
}
// alert("wrong answer");
if(isset($_POST['login'])){
  // alert($_POST['usrpwd'] == $pwd);
  // alert($_POST['usrpwd']);
  alert("Running Query");
  if($dbtest){
    $dbq = "SELECT password from public.user WHERE username=\'{$_POST['usrname']}\';";
    alert($dbq);
    alert("sample");
    $pwquery = $db->query($dbq);
    alert("Executing");
    $pwquery->execute();
    alert("Executed");
    alert($pwquery);}
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
