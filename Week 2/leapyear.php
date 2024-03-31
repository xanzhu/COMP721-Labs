<?php

function is_leapyear($year)
{
    return ($year % 4 == 0 && $year % 100 != 0) || $year % 400 == 0;
}

echo "<h1>Lab 2 - Task 4 - Leap Year</h1>";

if (isset($_GET['year'])) {
    $year = $_GET['year'];
    $numCheck = is_numeric($year);

    if ($numCheck) {
        if (is_leapyear($year)) {
            echo "<p>The year you entered $year is a leap year!</p>";
        } else {
            echo "<p>The year you entered $year is a standard year.</p>";
        }
    } else {
        echo "<p>Please enter a year!</p>";
    }
} else {
    echo "<p>Missing form data!</p>";
}
