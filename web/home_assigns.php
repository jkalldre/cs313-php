<!doctype html>
<html>
  <head>
    <title>Home</title>
    <link rel="stylesheet" href="css/home.css">
    <script src="js/home.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  </head>
  <body>
    <div class="nav">
      <ul class="nav">
        <li class="nav"><a href="home.php">Home</a></li>
        <li class="active_a"><a href="">Assignments</a></li>
        <li class="nav"><a href="https://www.w3schools.com/">W3Schools</a></li>
        <li class="nav"><a href="https://byui.brightspace.com/d2l/home/414715">Class Home</a></li>
        <li class="nav"><a id='timestamp'></a></li>
    </ul>
    </div>
    <script>
      $(document).ready(function() {
        setInterval(timestamp, 1000);
      });

      function timestamp() {
        $.ajax({
          url: 'php/timestamp.php',
          success: function(data) {
              $('#timestamp').html(data);
            },
          });
        }
    </script>

    <ul class="scheme">
      <li class="clrs" id="c1">Electric</li>
      <li class="clrs" id="c2">Forest</li>
      <li class="clrs" id="c3">Light</li>
      <li class="clrs" id="c4">Tin</li>
    </ul>
  </body>
</html>
