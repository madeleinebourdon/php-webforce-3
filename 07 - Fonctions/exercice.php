<?php

/*
1. Créer une boucle qui affiche 10 étoiles
2. Imbriquer la boucle dans un
*/

echo "<h1>1. Carré d'étoiles</h1>";
for ($i = 10; $i > 0; $i--) {
    for ($j = 10; $j > 0; $j--){
        echo "⭐";
    }
    echo "<br>";
}


echo "<h1>2. Triangle de sapins</h1>";

$fullStar = 1; // nombre d'étoiles pleines
$indexStar = 5; // Position

for ($x = 0; $x < 6; $x++) {
    for ($y = 0; $y < 11; $y++) {
        if($y == $indexStar) {
            for ($z = 0; $z < $fullStar; $z++) {
                echo "🌲";
            }
            $y += 3;
        } else {
            echo "🔥";
        }
    }
    $indexStar--;
    $fullStar += 2;
    echo "<br>";
}

?>