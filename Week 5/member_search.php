<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Web Development - Lab05</title>
</head>

<body>
    <h1>Web Development - Lab05</h1>
    <div class="content">
        <form method="GET">
            <label for="lname">Search Last Name:</label>
            <input type="text" name="search_lname" id="lname" pattern="[A-Za-z ]+" title="Please enter values using A-Z only!">
            <br>
            <input type="submit" value="Submit">
        </form>
        <?php

        require_once('../../files/settings.php');

        $conn = @mysqli_connect(
            $host,
            $user,
            $pswd,
            $dbnm
        );


        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['search_lname'])) {
            $search = $_GET["search_lname"];

            if ($search) {
                $sql = "SELECT * FROM vipmember WHERE lname LIKE ?";

                $db = $conn->prepare($sql);
                $search = '%' . $search . '%';
                $db->bind_param("s", $search);
                $db->execute();
                $result = $db->get_result();

                if ($result->num_rows > 0) {

                    echo "<h1>Search Member Page</h1>";

                    echo "<table border=\"1\">";
                    echo "<tr>\n"
                        . "<th scope=\"col\">Membership ID</th>\n"
                        . "<th scope=\"col\">First Name</th>\n"
                        . "<th scope=\"col\">Last Name</th>\n"
                        . "<th scope=\"col\">Email</th>\n"
                        . "</tr>\n";

                    while ($row = $result->fetch_assoc()) {

                        echo "<tr>";
                        echo "<td>", $row["member_id"], "</td>";
                        echo "<td>", $row["fname"], "</td>";
                        echo "<td>", $row["lname"], "</td>";
                        echo "<td>", $row["email"], "</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                } else {
                    echo "<p>No member found with that lastname!</p>";
                }

                $db->close();
            }
        }
        ?>
    </div>
</body>

</html>