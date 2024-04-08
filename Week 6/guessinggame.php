<?php
session_start();
if (!isset($_SESSION["ranNum"])) {
    $_SESSION["ranNum"] = rand(1, 100);
}

if (!isset($_SESSION["numGuess"])) {
    $_SESSION["numGuess"] = 0;
}

$random = $_SESSION["ranNum"];
$guess = $_SESSION["numGuess"];
?>

<html lang="en">
<head><title>Guessing Game - Lab 06</title></head>
<body>
<h1>Guessing Game</h1>
<p>Enter a number between 1 and 100 <br> then press the Guess button.</p>

<form method="POST">
    <label for="field">Number: </label>
    <input type="text" id="field" name="textField" pattern="[1-9][0-9]?$|^100$" title="Enter a number between 1 and 100!" required>
    <input type="submit" value="Guess">
</form>

<?php
if (isset($_POST["textField"])) {
    $num = $_POST["textField"];

    if ($num == $random) {
        echo "<p style='color: green;'>Congratulations! You guessed the hidden number.</p>";
    } elseif ($num < $random) {
        echo "Your guess is too low<br>";
    } else {
        echo "Your guess is too high<br>";
    }

    $_SESSION["numGuess"]++;
    $guess = $_SESSION["numGuess"];
}
?>

<div>
    <?php echo "<p>Number of Guesses: " . $guess . ".</p>"; ?>
</div>

<!--DEBUG: Display Hidden Number -->
<p style="color: blue">The Hidden Number is: <?php echo "$random"; ?></p>

<a href="giveup.php">GIVE UP</a>
<br>
<br>
<a href="startover.php">START OVER</a>
</body>
</html>