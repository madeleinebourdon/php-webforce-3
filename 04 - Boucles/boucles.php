<?php
echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> 
    <title>Les boucles</title>
    <style>
        body {
            font-family: "Nunito", cursive;
            font-size: 18px;
        }
        h1 {
            text-align: center;
        }
        h2 {
            display: inline;
            font-size: 1.3rem;
            color: green;
            padding: 0 0.25rem;

            font-weight: 800;
        }
        p {
            padding: 0.5rem 2.5rem;
        }
    
    </style>
</head>
<body>';
    
$eleves = [
    0 => [
        'nom' => 'Matthieu',
        'notes' => [10, 8, 16, 20, 17, 16, 15, 2]
    ],
    1 => [
        'nom' => 'Thomas',
        'notes' => [4, 18, 12, 15, 13, 7]
    ],
    2 => [
        'nom' => 'Jean',
        'notes' => [17, 14, 6, 2, 16, 18, 9]
    ],
    3 => [
        'nom' => 'Enzo',
        'notes' => [1, 14, 6, 2, 1, 8, 9]
    ]
];

echo "<h1>Les boucles</h1>";
// 1/ Afficher la liste de tous les élèves avec leurs notes.
echo "<h2>1/ Afficher la liste de tous les élèves avec leurs notes.</h2><p>";
// // "for" loop
// for ($i=0; $i<count($eleves) ; $i++) {
//    echo "<strong>" . $eleves[$i]['nom'] . "</strong> a eu " . implode(", ",$eleves[$i]['notes']) . "<br>";
// }

// "foreach" loop
foreach ($eleves as $eleve) { // la variable $eleve se crée toute seule à ce moment
    echo "<strong>" . $eleve['nom'] . "</strong> a eu " . implode(", ",$eleve['notes']) . "<br>";
}
echo "</p>";


// 2/ Calculer la moyenne de Jean. On part de $eleves[2]['notes']
echo "<h2>2/ Calculer la moyenne de Jean. On part de \$eleves[2]['notes']</h2>";
echo "<p>Jean a une moyenne de <strong>" . number_format(array_sum($eleves[2]['notes']) / count($eleves[2]['notes']), 2, ",", " ") . "</strong>.</p>";


// 3/ Combien d'élèves ont la moyenne ?
echo "<h2>3/ Combien d'élèves ont la moyenne ?</h2><p>";
$moyenne = 0;
for ($i=0; $i<count($eleves) ; $i++) {
    if (array_sum($eleves[$i]['notes']) / count($eleves[$i]['notes']) >= 10) {
        echo $eleves[$i]['nom'] . " a la moyenne. <br>";
        $moyennes = ++$moyenne;
    } else {
        echo $eleves[$i]['nom'] . " n'a pas la moyenne. <br>";
    }
}
echo "Nombre d'élèves avec la moyenne : <strong>" . $moyennes . "</strong></p>";


// 4/ Quel(s) élève(s) a(ont) la meilleure note ?
echo "<h2>4/ Quel(s) élève(s) a(ont) la meilleure note ?</h2>";
echo "<p>";




// for ($i=0; $i<count($eleves) ; $i++) {
//     $coucou = array_keys($eleves[$i]['notes'], max($eleves[$i]['notes']));
//     $oui = implode(", ", $coucou);


//     if (count(max($eleves[$i]['notes'])) > 1) {
//         echo "plusieurs personnes ont eu la meilleure note";
//     }
//     elseif (count(max($eleves[$i]['notes'])) == "1") {
//         echo count(max($eleves[$i]['notes'])) . " personne a eu la meilleure note. <br>";
//         echo $coucou;
//         echo $eleves[$i]['notes'][$oui]  . "<br>";
//         echo $eleves[$i]['nom'] . " a eu la meilleure note, qui est de " . max($eleves[$i]['notes']) . ".<br><br>";
//     } 

//     // regarder quel élève a eu la meilleure note
//     // si la meilleure note est 19, qui a eu 19 ?
// }

$bestNote = 0;
foreach ($eleves as $eleve) {
    foreach ($eleve['notes'] as $note) {
        if ($note > $bestNote) {
            $bestNote = $note;
        }

    }
}
foreach ($eleves as $eleve) {
    foreach ($eleve['notes'] as $note) {
        if ($note === $bestNote) {
            echo $eleve['nom'] . " a  la meilleure note : " . $bestNote . "<br>";
            break; // pour pas renvoyer plusieurs fois la même meilleure note
        }
    }
}

echo "</p>";


// 5/ Qui a eu au moins un 20 ?
echo "<h2>5/ Qui a eu au moins un 20 ?</h2>";
echo "<p>";
foreach ($eleves as $eleve) {
    if (in_array ("20", $eleve['notes'])) {
        echo  "Quelqu'un a eu au moins un 20.";
        break;
    } else {
        echo "Personne n'a eu de 20.";
        break; 
    }
}

// for ($i=0; $i<count($eleves) ; $i++) {
//     if (in_array ("20", $eleves[$i]['notes'])) {
//         echo $eleves[$i]['nom'] . " a eu au moins un 20.";
//         break;
//     } else {
//         echo "Personne n'a eu de 20.";
//         break; 
//     }
// }
echo "</p>";


// 6/ BONUS : Tri à bulles
// Algorithme qui permet d'avoir un tableau avec des valeurs et le trier par ordre croissant ou décroissant

echo "</body>
</html>";
?>