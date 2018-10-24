<?php
echo '<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Les fonctions</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Arimo|Asap:700" rel="stylesheet">
    <link rel="stylesheet" href="css.css"> 
</head>
<body>
<div class="content">
<h1>Les fonctions</h1>
<h2>Créer une fonction calculant le carré d\'un nombre</h2>';
function square($number) {
    return $number * $number;
}
echo "<strong>5</strong> au carré vaut <strong>" . square(5) . "</strong>.";


echo "<h2>Créer une fonction calculant l'aire d'un rectangle et une fonction pour celle d'un cercle</h2>";
function rectangleArea($width, $length) {
    return $width * $length;
}
echo "Un rectangle d'une largeur de <strong>3cm</strong> et d'une longueur de <strong>6cm</strong> aura une aire de <strong>" .rectangleArea(3,6) . "cm²</strong><br>";

function circleArea($diam) {
    return round((355/113) * square($diam), 2); // the closest fraction to pi
}
echo "Un cercle d'un rayon de <strong>5cm</strong> aura une aire de <strong>" . circleArea(5) . "cm²</strong><br>";


echo "<h2>Créer une fonction calculant le prix TTC d'un prix HT. Nous aurons besoin de 2 paramètres, le prix HT et le taux.</h2>";
function fee($price, $vat, $nature) {
    $vat = 1 + $vat / 100;

    if ($nature == 'ttc') {
        return $price * $vat;
    }
    elseif ($nature == 'ht') {
        return round($price / $vat, 2);
    }
    else {
        return "Erreur !";
    }
}
echo "Un prix HT de <strong>100€</strong> aura un prix TTC de <strong>" . fee(100, 20, "ttc") . "€</strong> avec une TVA de <strong>20%</strong>.";


echo "<h2>Ajouter un 3ème paramètre à cette fonction permettant de l'utiliser dans les 2 sens (HT vers TTC ou TTC vers HT)</h2>";
echo "Un prix TTC de <strong>100€</strong> aura un prix HT de <strong>" . fee(100, 20, "ht") . "€</strong> avec une TVA de <strong>20%</strong>.";
    
echo '</div>
</body>
</html>';
?>

