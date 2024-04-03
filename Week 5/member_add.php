<?php
require_once('../../files/settings.php');

$conn = @mysqli_connect($host, $user, $pswd, $dbnm);

if (!$conn) {
    echo "<p>Database connection failure</p>";
} else {
    $query = "CREATE TABLE IF NOT EXISTS vipmember (
            member_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            fname VARCHAR(40),
            lname VARCHAR(40),
            gender VARCHAR(1),
            email VARCHAR(40),
            phone VARCHAR(20)
        )";

    $result = mysqli_query($conn, $query);

    if (!$result) {
        echo "<p>Error creating table: ", mysqli_error($conn), "</p>";
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // Form Data
        $name = $_POST["fname"];
        $lastname = $_POST["lname"];
        $gender = $_POST["gender"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];

        $insert = "INSERT INTO vipmember (fname, lname, gender, email, phone) VALUES (?, ?, ?, ?, ?)";

        $db = $conn->prepare($insert);
        if ($db) {
            $db->bind_param("sssss", $name, $lastname, $gender, $email, $phone);
            if ($db->execute()) {
                echo "DEBUG | Data inserted successfully!";
            } else {
                echo "DEBUG | Error inserting data: " . $db->error;
            }
            $db->close();
        } else {
            echo "DEBUG | Error preparing statement: " . $conn->error;
        }

        mysqli_close($conn);
    }
}
