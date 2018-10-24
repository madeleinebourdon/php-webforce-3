<?php
echo '<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Tables de multiplication</title>

    <link rel="stylesheet" type="text/css" media="screen" href="multiplications.css" />
</head>';

echo "<body>";
echo "<h1>Tables de multiplications</h1>";

echo "<table>";
$max = 11;
$big = $max + 1;

// show header row
echo "<thead>";
for ($a=-1; $a<$max; $a++) {
        if ($a <= -1) {
            echo "<th> x </th>";
        } else {
            echo "<th>" ."$a" . "</th>";
        }
}
echo " </thead>";

echo "<tbody>";

// show table numbers
for ($x=0; $x <$max; $x++) {
    echo "<tr>";

    for ($y=-1; $y <$max; $y++) {
        if ($y <= -1) {
            echo "<th>" ." $x" . "</th>";
        } else {
            echo "<td>" . $y * $x . "</td>";
        }
        
    }

    echo "</tr>\n";
}
echo "</tbody>";
echo "</table>";
echo "</body>";
echo "</html>";
?>