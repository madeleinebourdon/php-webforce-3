<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Les formulaires</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Arimo|Asap:700" rel="stylesheet">
    <link rel="stylesheet" href="css.css"> 
</head>
<body>
<div class="content">
<h1>Fonctions</h1>
<h2>1. Acronyme : Créer une fonction qui prend en argument une chaîne (World of Warcraft) et qui retourne les initiales de chaque mot en majuscule (WOW).</h2>

<?php
function acronym($sentence) {
    $new = explode (" ", $sentence);

    foreach ($new as $word) {
        echo strtoupper($word[0]);
    }
}
echo "<p>L'acronyme de \"World of Warcraft\" est <strong>";
acronym("World of Warcraft");
echo "</strong>.</p>";


echo "<h2>2. Conjugaison : Créer une fonction qui permet de conjuguer un verbe (chercher par exemple). Cela doit renvoyer toutes les conjugaisons au présent.</h2>";

function conjugate($verb) {
    $pronouns = ["je", "j'", "tu", "il", "elle", "on", "nous", "vous", "ils", "elles"];
    $vowels = ["a", "e", "i", "o", "u", "y", "é", "è", "ê", "à"];

     // pour le j'
    if(in_array ($verb[0], $vowels) ) { // si ça commence par une voyelle
        
        unset($pronouns["je"]);

    } elseif (!in_array ($verb[0], $vowels)) { // si ça commence par une consonne
        unset($pronouns["j'"]);
    }

    // mais ça ne fonctionne pas, alors que c'est la méthode vue en cours
   

    if (substr($verb, -2) == "er") {    // 1er groupe
        $end1 = ["e", "e", "es", "e", "e", "e", "ons", "ez", "ent", "ent"];

        echo "<h3>Premier groupe</h3>";
        echo "<h4>Verbe ". $verb . "</h4>";

        // 1. On vire le er
        $base =  substr($verb, 0, -2);

        for ($i=0; $i< count($pronouns); $i++) {
            echo $pronouns[$i] . " " . $base . " " . $end1[$i] . "<br>";
        }
        

        // 2. On met les bonnes terminaisons
        
    }
    
    

    
}
conjugate("abîmer");


?>

</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>