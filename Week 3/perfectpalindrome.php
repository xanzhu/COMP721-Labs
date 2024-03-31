<html lang="en">

<head>
    <title>Perfect Palindrome</title>
    <meta charset="UTF-8" />
</head>

<body>
    <h1>Lab03 Task 2 - Perfect Palindrome</h1>
    <?php
    if (isset($_POST["textField"])) {
        $str = $_POST["textField"];

        // Convert to lowercase
        $strLower = strtolower($str);

        // Reverse string
        $strReverse = strrev($strLower);

        // Compare Strings
        if (strcmp($strLower, $strReverse) == 0) {
            echo "<p>The text you entered: <strong>'$strReverse'</strong> is a perfect palindrome!";
        } else {
            echo "<p>The text you entered: <strong>'$strLower'</strong> is not a perfect palindrome!";
        }
        echo "<br><br><a href='perfectpalindromeform.html'>Return</a>";
    } else {
        echo "<p>Please enter a string, example: <strong>anna</strong></p><br>";
        echo "<a href='perfectpalindromeform.html'>Try again</a>";
    }
    ?>
</body>

</html>