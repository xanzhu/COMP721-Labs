<?php
  session_start();
  if(!isset ($_SESSION["number"])){
      $_SESSION["number"] = 0;
  }
  $num = $_SESSION["number"];
  ?>
<html lang="en">
<head><title>Managing Session</title></head>
<body>
<h1>Web Development - Lab 06</h1>
<?php
echo "<p>The number is $num</p>";
?>
<p><a href="numberup.php">UP</a></p>
<p><a href="numberdown.php">DOWN</a></p>
<p><a href="numberreset.php">RESET</a></p>
</body>
</html>
