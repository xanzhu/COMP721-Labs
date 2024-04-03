<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Web Development - Lab05</title>
</head>

<body>
    <h1>Web Development - Lab05</h1>
    <div class="content">
        <?php
        require_once('../../files/settings.php');

        $conn = @mysqli_connect(
            $host,
            $user,
            $pswd,
            $dbnm
        );

        if (!$conn) {
            echo "<p>Database connection failure</p>";
        } else {
            $query = "select car_id, make, model, price from cars2";

            $result = mysqli_query($conn, $query);

            if (!$result) {
                echo "<p>Something is wrong with ",    $query, "</p>";
            } else {
                echo "<table border=\"1\">";
                echo "<tr>\n"
                    . "<th scope=\"col\">ID</th>\n"
                    . "<th scope=\"col\">Make</th>\n"
                    . "<th scope=\"col\">Model</th>\n"
                    . "<th scope=\"col\">Price</th>\n"
                    . "</tr>\n";

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>", $row["car_id"], "</td>";
                    echo "<td>", $row["make"], "</td>";
                    echo "<td>", $row["model"], "</td>";
                    echo "<td>", $row["price"], "</td>";
                    echo "</tr>";
                }
                echo "</table>";
                mysqli_free_result($result);
            }
            mysqli_close($conn);
        }

        ?>
    </div>
</body>

</html>