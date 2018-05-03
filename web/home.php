<!doctype php>
<html>
  <head>
    <title>Home</title>
    <link rel="stylesheet" href="css/home.css">
    <script src="js/home.js"></script>
  </head>
  <body>
    <div class="nav">
      <ul class="nav">
        <li class="active_a"><a href="home.html">Home</a></li>
        <li class="nav"><a href="home_assigns.html">Assignments</a></li>
        <li class="nav"><a href="https://www.w3schools.com/">W3Schools</a></li>
        <li class="nav"><a href="https://byui.brightspace.com/d2l/home/414715">Class Home</a></li>
        <li class="nav"><?php echo date("h:i:sa") ?></li>
    </ul>
    </div>
    <?php echo "Hello, World!"; ?>
    <image class="img" src="img/me.jpg"/>
    <div class="bio">
    <p class="bio"> Hello, my name is Jacob Alldredge! I am a senior studying
    Computer Science at Brigham Young University-Idaho.</p>
    <p class="bio"> I have been married for
    a little over one year and eight months. We do not have any kids yet, but we
    have a little kitten named Archie who is just over a year old. </p>
    <p class="bio">My favorite
    hobbies all involve the outdoors, things like kayaking, fishing, and camping.
    However, I am also a big fan of staying in and playing some videogame with friends
    and family. This website will serve as my homepage for CS 313.</p>
    <p class="bio">I served a two year mission in Recife, Brazil where I became
    fluent in Portuguese. I absolutely fell in love with the food, culture, music,
    and the people. I would give just about anything to spend another sunny day in that
    costal city.</p>
  </div>


    <ul class="scheme">
      <li class="clrs" id="c1">Electric</li>
      <li class="clrs" id="c2">Forest</li>
      <li class="clrs" id="c3">Light</li>
      <li class="clrs" id="c4">Tin</li>
    </ul>
  </body>
</html>
