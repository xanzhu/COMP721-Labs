<html lang="en">

<head>
    <title>Combined Standard Palindrome!</title>
    <meta charset="UTF-8" />
</head>

<body>
    <h1>Combined Standard Palindrome</h1>
    <form method="POST">
        <label for="textField">String: </label>
        <input type="text" name="textField" id="textField">
        <input type="submit" value="Check for Standard Palindrome">
    </form>
    <?php
    if (isset($_POST["textField"])) {
        // Set String to Lowercase
        $str = strtolower($_POST["textField"]);

        // Replace non-alphanumeric characters
        $strPattern = preg_replace('/[^A-Za-z0-9]/', '', $str);
        // Reverse string
        $strReverse = strrev($strPattern);

        // Compare strings
        if (strcmp($strPattern, $strReverse) == 0) {
            echo "<p>The text you entered: <strong>'$strPattern'</strong> is a standard palindrome!";
        } else {
            echo "<p>The text you entered: <strong>'$str'</strong> is not a standard palindrome!";
        }
    } else {
        echo "<p>Please enter a string, example: <strong>hello</strong></p><br>";
    }
    ?>
</body>

</html>