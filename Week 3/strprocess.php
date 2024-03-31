<html lang="en">

<head>
    <title>Using string functions</title>
    <meta charset="UTF-8" />
</head>

<body>
    <h1>Web Development - Lab 3</h1>
    <?php
    if (isset($_POST["textField"])) {
        $str = $_POST["textField"];

        if (ctype_space($str)) {
            echo "<p>Please enter some letters!</p>";
        } else {
            $pattern = "/^[A-Za-z ]+$/";
            // Match Pattern with String!
            if (preg_match($pattern, $str)) {
                $ans = "";
                // Length of String
                $len = strlen($str);
                for ($i = 0; $i < $len; $i++) {
                    $letter = substr($str, $i, 1);
                    if (!is_numeric(strpos(("AEIOUaeiou"), $letter))) {
                        $ans = $ans . $letter;
                    }
                }
                echo "<p> The word with no vowels is: ", $ans, "</p>";
            } else {
                echo "<p>Please enter a string containing only letters or spaces.</p>";
            }
        }
    } else {
        echo "<p>Please enter string from the input form.</p>";
    }
    ?>
</body>

</html>