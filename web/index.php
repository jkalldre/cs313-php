<?php
session_start();
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
    // if(isset($db))alert("DB Synced");
  }
  catch (PDOException $ex)
  {
    echo 'Error!: ' . $ex->getMessage();
    die();
  }
  // alert("made it past dbconnect!");
}
// include('./php/dbconnect.php');
$pwd = 'supergoodpassword';
if(isset($_POST['login'])){
  if(!isset($_SESSION['db'])) alert("DB IS NOT SET");
  else alert("db is set");
  if($dbtest){
    $dbq1 = "SELECT password FROM public.user WHERE username=?";
    $dbq2 = "SELECT crypt(?,?)";

    $pwquery1 = $_SESSION['db']->prepare($dbq1);
    $pwquery1->execute([$_POST['usrname']]);
    $pw1 = $pwquery1->fetch();
    alert("Executed q1");

    $pwquery2 = $_SESSION['db']->prepare($dbq2);
    $pwquery2->execute([$_POST['usrpwd'],$pw1[0]]);
    $pw2 = $pwquery2->fetch();
    alert("Executed q2");

    if($pw2[0] == $pw1[0]){
      header("Location: https://ancient-scrubland-36003.herokuapp.com/project/tasklist.php");
      die();
    }
    else $error = "Invalid Username or Password";
  }
}

function alert($msg) {
  echo "<script type='text/javascript'>alert('$msg');</script>";
}
?>
<!-- <!doctype html> -->
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
    </div>
  </form>
</body>
</html>
