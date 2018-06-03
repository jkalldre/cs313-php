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
    $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
  }
  catch (PDOException $ex)
  {
    echo 'Error!: ' . $ex->getMessage();
    die();
  }
}
if(isset($_POST['newuser'])){
  // if(!isset($db)) alert("DB IS NOT SET");
  // else alert("db is set");
  if($dbtest){
    $pass1 = $_POST['usrpwd'];
    $pass2 = $_POST['usrpwd1'];
    if($pass1 == $pass2){
    // $dbq1 = "SELECT password FROM public.user WHERE username=?";
    // $dbq2 = "SELECT crypt(?,?)";
    //
    // $pwquery1 = $db->prepare($dbq1);
    // $pwquery1->execute([$_POST['usrname']]);
    // $pw1 = $pwquery1->fetch();
    // // alert("Executed q1");
    //
    // $pwquery2 = $db->prepare($dbq2);
    // $pwquery2->execute([$_POST['usrpwd'],$pw1[0]]);
    // $pw2 = $pwquery2->fetch();
    // alert("Executed q2");

      $_SESSION['user'] = $_POST['usrname'];
      header("Location: https://ancient-scrubland-36003.herokuapp.com/project/tasklist.php"."?user=".$_POST['usrname']);
    }
    else $error = "Passwords don't match!";
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
      <a href="../login_project.php"><button class="loginbtn logout" type="push" name="login">Login</button></a>
    </div>
  </form>
</body>
</html>