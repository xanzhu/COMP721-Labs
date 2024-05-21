<!--file data.php -->
<?php

require_once('../../files/config.php');

// Create Connection
$conn = @mysqli_connect($sql_host, $sql_user, $sql_pass, $sql_db);

if(!$conn) {
    echo "<p>Connection Failed</p>";
}

// Form Data from POST
$name = $_POST['name'];
$pwd = $_POST['pwd'];

$createTable = "CREATE TABLE IF NOT EXISTS `userData`(
                `name` VARCHAR(30) NOT NULL,
                `pass` VARCHAR(30) NOT NULL,
                `email` VARCHAR(30) NOT NULL,
                PRIMARY KEY(`name`)
)";
$conn ->query($createTable);

// Insert some sample use cases
$sql_insert = "INSERT INTO `userData` (`name`, `pass`, `email`) VALUES ('Bobby', 'Password123', 'bobby@gmail.com'), ('Orion', 'S3cret', 'orion@gmail.com'), ('Hello', 'World', 'hello@world.com')";
$conn ->query($sql_insert);

// Find users email based on name + pass
$sql_search = "SELECT email FROM userData WHERE name = '$name' AND pass = '$pwd'";
$result = $conn->query($sql_search);

if($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $email = $row["email"];
    echo "<p style='color: deepskyblue;font-weight:bold'>Email: $email</p>";
} else {

    $sql_search = "SELECT name FROM userData WHERE name = '$name'";
    $result = $conn->query($sql_search);

    if($result->num_rows > 0){
        // Display error if pass wrong.
        echo "<p style='color: red;font-weight: bold'>(!) Incorrect Password.</p>";
    } else {
        // Display error if name not found.
        echo "<p style='color: red;font-weight: bold'>(!) Account not found.</p>";
    }
}






