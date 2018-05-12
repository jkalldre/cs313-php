<?php
session_start();
?>
<!doctype html>
<html>
  <head>
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="../css/prove03.css">
    <script src="../js/prove03.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  </head>
  <?php
  if(isset($_POST['Citrus'])){
    if($_POST['Citrus'] == '-'){ if($_SESSION['cart']['Citrus'] != 0)$_SESSION['cart']['Citrus']--;}
    if($_POST['Citrus'] == 'Clear')$_SESSION['cart']['Citrus'] = 0;
  }
  if(isset($_POST['Eucalyptus'])){
    if($_POST['Eucalyptus'] == '-'){ if($_SESSION['cart']['Eucalyptus'] != 0)$_SESSION['cart']['Eucalyptus']--;}
    if($_POST['Eucalyptus'] == 'Clear')$_SESSION['cart']['Eucalyptus'] = 0;
  }
  if(isset($_POST['Lavender'])){
    if($_POST['Lavender'] == '-'){ if($_SESSION['cart']['Lavender'] != 0)$_SESSION['cart']['Lavender']--;}
    if($_POST['Lavender'] == 'Clear')$_SESSION['cart']['Lavender'] = 0;
  }
  if(isset($_POST['Vanilla'])){
    if($_POST['Vanilla'] == '-'){ if($_SESSION['cart']['Vanilla'] != 0)$_SESSION['cart']['Vanilla']--;}
    if($_POST['Vanilla'] == 'Clear')$_SESSION['cart']['Vanilla'] = 0;
  }
   ?>
  <body>
    <form method="post">
    <?php
    // echo "<ul>";
    // foreach($_SESSION['prices'] as $key => $value){
    //   echo "<li>$key, $value</li>";
    // }
    // echo "</ul>";
    ?>
    <h1>Shopping Cart</h1>
<?php
    $_SESSION['sum'] = 0;
    echo "<table>";
    echo "<tr><th>Item</th><th>Quantity</th><th>Price</th><th>Total</th></tr>";
    foreach($_SESSION['cart'] as $key => $value){
      echo "<tr><td>$key</td><td>$value</td><td>" . number_format($_SESSION['prices'][$key],2,'.',',') . "</td>
      <td>". number_format($value*$_SESSION['prices'][$key],2,'.',',')."</td><td><input type='submit' name=$key value='-'></td>
      <td><input type='submit' name=$key value='Clear'></td></tr>";
      $_SESSION['sum'] += $value*$_SESSION['prices'][$key];
    }
    echo "<tr><td>Total</td><td>". number_format($_SESSION['sum'],2,'.',',')."</td></tr>";
    echo "</table>";
?>
<a class='out' href="../index.php">Return to Browsing</a>
<a class='out' href='prove03_checkout.php'/>Checkout</a>
</form>
  </body>
</html>
