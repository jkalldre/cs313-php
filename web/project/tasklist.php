<?php
  session_start();
 ?>

<html>
  <head>
    <title>Task Manager</title>
    <link rel="stylesheet" href="../css/project.css">
    <script src="../js/project.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  </head>
  <body>
    <div class="header">Task Manager</div>
    <div class="row">
      <div class= "column left">
        <h2>Column 1</h2>
        <ul>
          <li>stuff</li>
          <li>stuff</li>
          <li>stuff</li>
          <li>stuff</li>
          <li>stuff</li>
          <li><?php echo $_SESSION['user'];?></li>
        </ul>
      </div>
      <div class="column right">
        <h2>Column 2</h2>
        <ul>
          <li>stuff</li>
          <li>stuff</li>
          <li>stuff</li>
          <li>stuff</li>
          <li>stuff</li>
        </ul>
      </div>
    </div>

  </body>
</html>
