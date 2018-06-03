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

function existingUsername($user){
  $dbq = "SELECT username FROM public.user";
  $query = $db->prepare($dbq3);
  $query->execute();
  $users = $query->fetchAll(PDO::FETCH_ASSOC);
  for($i = 0; $i < count($users); $i++){
    if ($user == $users[$i]['username'])
      return true;
  }
  return false;
}

if(isset($_POST['login'])){
  // if(!isset($db)) alert("DB IS NOT SET");
  // else alert("db is set");
  if($dbtest){
    $dbq1 = "SELECT password FROM public.user WHERE username=?";
    $dbq2 = "SELECT crypt(?,?)";

    $pwquery1 = $db->prepare($dbq1);
    $pwquery1->execute([$_POST['usrname']]);
    $pw1 = $pwquery1->fetch();

    $pwquery2 = $db->prepare($dbq2);
    $pwquery2->execute([$_POST['usrpwd'],$pw1[0]]);
    $pw2 = $pwquery2->fetch();


    print_r($users);
    if($pw2[0] == $pw1[0] && existingUsername($_POST['usrname'])){
      $_SESSION['user'] = $_POST['usrname'];
      // header("Location: https://ancient-scrubland-36003.herokuapp.com/project/tasklist.php"."?user=".$_POST['usrname']);
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
      <a class="loginbtn" href="project/newuser.php">Create User</a>

    </div>
  </form>
</body>
</html>
