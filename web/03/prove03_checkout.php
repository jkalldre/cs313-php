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
          echo "<tr><td>$key</td><td>$value</td><td>" . number_format($_SESSION['prices'][$key],2,'.',',') . "</td>
          <td>". number_format($value*$_SESSION['prices'][$key],2,'.',',')."</td></tr>";
          $_SESSION['sum'] += $value*$_SESSION['prices'][$key];
        }
        echo "<tr><td>Total</td><td>". number_format($_SESSION['sum'],2,'.',',')."</td></tr>";
        echo "</table>";
    ?>
    <a class='out' href='prove03_cart.php'/>Return to Cart</a>

    <h3>Shipping Info:</h3>
    <form method='post' action='prove03_confirm.php'>
    <table>
      <tr><td>Street</td><td colspan='3'><input style='width:100%;'name='street' type='text'/></td></tr>
      <tr><td>City</td><td><input name='city' type='text'/></td>
      <td>State</td><td><input name='state' type='text'/></td></tr>
      <tr><td>Zip</td><td colspan='3'><input name='zip' type='text'/></td></tr>
    </table>
    <input class='out' type='submit' name='purchase' value='Purchase'/>
  </form>
  </body>
</html>
