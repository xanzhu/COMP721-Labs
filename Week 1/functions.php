<!DOCTYPE html>
<html lang="en">
<head>
    <title>PHP Functions</title>
    <meta charset="utf-8">
</head>
<body>
<h1>Use of PHP built-in functions</h1>
<?php
/*
 * abs() = Absolute Power
 * pow() = Power of
 */
echo "<p>Absolute value of -9 is: ", abs(-9),".</p>";
echo "<p>2 to the power of 5 is: ", pow(2,5), ".</p>";
?>
<?php
/*
 * bindec() = binary to decimal
 * decbin() = decimal to binary
 */
echo "<p>Decimal equivalent of 1101 is: ", bindec(1101), ".</p>";
echo "<p>Binary equivalent of 14 is: ", decbin(14), ".</p>";
?>
</body>
</html>