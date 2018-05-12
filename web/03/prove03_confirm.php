<?php
 session_start();
 ?>
<!doctype html>
<html>
  <head>
    <title>Checkout</title>
    <link rel="stylesheet" href="../css/prove03.css">
    <script src="../js/prove03.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  </head>
  <body>
    <h1>Checkout</h1>
    <?php
        $_SESSION['sum'] = 0;
        echo "<table>";
        echo "<tr><th>Item</th><th>Quantity</th><th>Price</th><th>Total</th></tr>";
        foreach($_SESSION['cart'] as $key => $value){
          echo "<tr><td>$key</td><td>$value</td><td>" .
          number_format($_SESSION['prices'][$key],2,'.',',') . "</td>
          <td>". number_format($value*$_SESSION['prices'][$key],2,'.',',')."</td></tr>";
          $_SESSION['sum'] += $value*$_SESSION['prices'][$key];
        }
        echo "<tr><td>Total</td><td>". number_format($_SESSION['sum'],2,'.',',')."</td></tr>";
        echo "</table>";
    ?>
<?php
    echo "<h2>Thank You!</h2>";
    echo "<h3>Your items have been sent to the following address:</h3>";
    echo "<p>". htmlspecialchars($_POST['street'])."<br/>" .
         htmlspecialchars($_POST['city']) . ", ". htmlspecialchars($_POST['state']).
         " ". htmlspecialchars($_POST['zip'])."</p>";
?>

  </body>
</html>
