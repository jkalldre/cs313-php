<?php
session_start();
$dbtest = true;
if($dbtest /*&& !isset($_POST['login'])*/) {
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
    if(isset($db))alert("DB Synced");
  }
  catch (PDOException $ex)
  {
    echo 'Error!: ' . $ex->getMessage();
    die();
  }
  alert("made it past dbconnect!");
}
// include('./php/dbconnect.php');
$pwd = 'supergoodpassword';
function alert($msg) {
  echo "<script type='text/javascript'>alert('$msg');</script>";
}
if(isset($_POST['login'])){
  // alert($_POST['usrpwd'] == $pwd);
  // alert($_POST['usrpwd']);
  if(!isset($db)) alert("DB IS NOT SET");
  else alert("db is set");
  alert("Running Query");
  if($dbtest){
    $dbq = "SELECT password FROM public.user WHERE username=?";
    alert($dbq);
    $pwquery = $db->prepare($dbq);
    alert("Executing");
    $pwquery->execute($_POST['usrname']);
    alert("Executed");
    $pw = $pwquery->fetchAll(PDO::FETCH_ASSOC);
    alert($pw[0]);
  }
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
