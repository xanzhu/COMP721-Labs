<!DOCTYPE html>
<html lang="en">

<head>
    <title>Lab 2 - Task 2.2</title>
</head>

<body>
    <h2>Number Checker!</h2>
    <form action="" method="get">
        <label for="value">Enter value:</label>
        <input type="text" name="number" id="value">
        <input type="submit" value="submit">
    </form>
    <?php
    if (isset($_GET["number"])) {
        $num = $_GET["number"];
        $status = ($num % 2 == 0) ? "even" : "odd";

        echo "The value $num is $status.";
    }
    ?>
</body>

</html>