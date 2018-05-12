<?php
session_start();
?>

<!doctype html>
<html>
<head>
  <title>Online Shopping</title>
  <link rel="stylesheet" href="css/prove03.css">
  <script src="js/prove03.js"></script>
  <!-- <script src="php/prove03.php"></script> -->
  <script src="https://ajax.googleapis.com/ajax/tdbs/jquery/3.3.1/jquery.min.js"></script>
</head>
<?php
if(!isset($_SESSION['tmpcart'])){
  $_SESSION['tmpcart'] = array('Citrus' => 0, 'Eucalyptus' => 0
  ,'Lavender' => 0, 'Vanilla' => 0);}
$_SESSION['prices'] = array('Citrus' => .50, 'Eucalyptus' => .75
  ,'Lavender' => .80, 'Vanilla' => .25);

  if(isset($_POST['Citrus'])){
    if($_POST['Citrus'] == '+') $_SESSION['tmpcart']['Citrus']++;
    else {if($_SESSION['tmpcart']['Citrus'] != 0) $_SESSION['tmpcart']['Citrus']--;}
  }
  if(isset($_POST['Eucalyptus'])){
    if($_POST['Eucalyptus'] == '+') $_SESSION['tmpcart']['Eucalyptus']++;
    else {if($_SESSION['tmpcart']['Eucalyptus'] != 0) $_SESSION['tmpcart']['Eucalyptus']--;}
  }
  if(isset($_POST['Lavender'])){
    if($_POST['Lavender'] == '+') $_SESSION['tmpcart']['Lavender']++;
    else {if($_SESSION['tmpcart']['Lavender'] != 0) $_SESSION['tmpcart']['Lavender']--;}
  }
  if(isset($_POST['Vanilla'])){
    if($_POST['Vanilla'] == '+') $_SESSION['tmpcart']['Vanilla']++;
    else {if($_SESSION['tmpcart']['Vanilla'] != 0) $_SESSION['tmpcart']['Vanilla']--;}
  }

  if(isset($_POST['addtocart'])){
    foreach($_SESSION['tmpcart'] as $key => $value){
      $_SESSION['cart']   [$key] += $value;
      $_SESSION['tmpcart'][$key]  = 0;
    }
  }
  // header("LOCATION: index.php?");
  // die;
    // die;
    // echo "<ul>";
    // foreach($_SESSION['prices'] as $key => $value){
    //   echo "<li>$key, $value</li>";
    // }
    // echo "</ul>";

  ?>
  <body>
    <form method="POST" action="">
      <h1>Bath Bombs</h1>
      Types:<br />
      <table>
        <tr><th>Item</th><th>Quantity</th><th>Inc</th><th>Dec</th></tr>
        <tr><td>Citrus </td>
          <td name='index'><?php echo $_SESSION['tmpcart']['Citrus']; ?></td>
          <td><input class='' name="Citrus" type=submit value="+"></td>
          <td><input class='' name="Citrus" type=submit value="-"></td></tr>
          <tr><td>Eucalyptus</td>
            <td><?php echo $_SESSION['tmpcart']['Eucalyptus']; ?></td>
            <td><input class='' name="Eucalyptus" type=submit value="+"></td>
            <td><input class='' name="Eucalyptus" type=submit value="-"></td></tr>
            <tr><td>Lavender</td>
              <td><?php echo $_SESSION['tmpcart']['Lavender']; ?></td>
              <td><input class='' name="Lavender" type=submit value="+"></td>
              <td><input class='' name="Lavender" type=submit value="-"></td></tr>
              <tr><td>Vanilla</td>
                <td><?php echo $_SESSION['tmpcart']['Vanilla']; ?></td>
                <td><input class='' name="Vanilla" type=submit value="+"></td>
                <td><input class='' name="Vanilla" type=submit value="-"></td></tr>
              </table>
              <input name='addtocart' type="submit" value="Add to Cart">
              <a class='out' href='03/prove03_cart.php'>Shopping Cart</a><br /><br />
            </form>
          </body>
          </html>
