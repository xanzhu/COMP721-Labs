<?php
session_start();
$randomNumber = $_SESSION["ranNum"];
?>

<html lang="en">
<head><title>Give up - PHP</title></head>
<body>
<h1>Guessing Game</h1>
<div>
    <?php echo "<p style='color: blue;'>The hidden number was: $randomNumber </p>"; ?>
    <a href="startover.php">START OVER</a>
</div>
</body>
</html>
