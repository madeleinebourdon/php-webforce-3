<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Les formulaires</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Arimo|Asap:700" rel="stylesheet">
    <link rel="stylesheet" href="css.css"> 
</head>
<body>
<div class="content">
<h1>Calculatrice</h1>
<form method="GET">
    <label for="nombre1">Nombre 1 : </label><input type="number" step="0.0000000001" value="<?php echo $_GET['nombre1'] ?>" id="nombre1" name="nombre1"><br>
    <label for="nombre2">Nombre 2 : </label><input type="number" step="0.0000000001" value="<?php echo $_GET['nombre2'] ?>" id="nombre2" name="nombre2"><br>
    <input type="radio" name="operation" value="add" id="add"> <label for="add">Addition</label>
    <input type="radio" name="operation" value="subtract" id="subtract"> <label for="subtract">Soustraction</label>
    <input type="radio" name="operation" value="divide" id="divide"> <label for="divide">Division</label>
    <input type="radio" name="operation" value="multiply" id="multiply"> <label for="multiply">Multiplication</label><br>
    <input type="submit" value="Calculer" class="button">
</form>

<?php

function calcul($num1, $num2, $op) {
    if (is_numeric($num1) && is_numeric($num2)) { // si num1 et num2 sont des nombres
        if ($op == "add") {
            echo $num1 + $num2;
    
        } elseif ($op == "subtract") {
            echo $num1 - $num2;
            
        } elseif ($op == "divide") {
            if ($num2 == 0) {
                echo "<span class='error'>Erreur : impossible de diviser par zéro.</span>";            
            } else {
                echo $num1 / $num2;
            }

        } elseif ($op == "multiply") {
            echo $num1 * $num2;

        } elseif ($op == "undefined") {
            echo "<span class='error'>Erreur : aucune opération n'est sélectionnée.</span>";

        }

    } elseif (!is_numeric($num1) && is_numeric($num2)) {
        echo "<span class='error'>Erreur : le champ \"Nombre 1\" ne contient pas de nombre.</span>";
    } elseif (is_numeric($num1) && !is_numeric($num2)) {
        echo "<span class='error'>Erreur : le champ \"Nombre 2\" ne contient pas de nombre.</span>";
    } elseif (!is_numeric($num1) && !is_numeric($num2)) {
        echo "<span class='error'>Erreur : les champs \"Nombre 1\" et \"Nombre 2\" ne contiennent pas de nombre.</span>";
    }
    
}

if (isset($_GET['nombre1'], $_GET['nombre2'], $_GET['operation'])) {
    echo "<div class='result'>";
    calcul($_GET['nombre1'], $_GET['nombre2'], $_GET['operation']);
    echo "</div>";
}
?>

</div>
</body>
</html>