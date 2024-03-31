<?php
// Lab 2 - Task 1
[$days = array(
    "Monday",
    "Tuesday",
    "Wednesday",
    "Thursday",
    "Friday",
    "Saturday",
    "Sunday"
)];

echo "<p>The Days of the week in English are: </p>";
echo "<p>", implode(", ", $days), ".</p>";

$days[0] = "Lundi";
$days[1] = "Mardi";
$days[2] = "Mercredi";
$days[3] = "Jeudi";
$days[4] = "Vendredi";
$days[5] = "Samedi";
$days[6] = "Dimache";

echo "<p>The Days of the week in French are: </p>";
echo "<p>", implode(", ", $days), ".</p>";
