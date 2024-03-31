<?php
include "mathfunctions.php";

$num = $_GET['number'];
$numCheck = is_numeric($num);

if ($numCheck && $num > 0) {
    echo factorial($num);
} else {
    echo "<p>Error: Incorrect input try again!</p>";
};
