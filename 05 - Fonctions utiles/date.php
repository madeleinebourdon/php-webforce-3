<?php

// What time is it right now
$seconds = date('s');

echo "<p>";
echo date("l j F Y");
echo ", il est ";
echo date("H\hi");
echo " et ";
echo $seconds . " seconde";
echo ($seconds > 1) ? 's' : '';

echo "</p>";


// // What time will it be in 10 days (j'ai bien recopié mais il doit manquer des lignes en haut)
// echo "<p>";
// var_dump(date('d/m/Y', time()));
// var_dump(date('d/m/Y', strtotime('+ 10 days')));
// echo "</p>";



// Days until my birthday
$currentTimestamp = time();
$targetTimestamp = strtotime('18 November 2018');
$total = ($targetTimestamp - $currentTimestamp) / 60 /60 / 24;
$days = round($total);
$hours = round(($total - $days) * 24);

echo "Encore " . $days . " jours et " . $hours . " heures jusqu'à mon anniversaire.";

?>