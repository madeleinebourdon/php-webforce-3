<?php

// On crée une connexion à la BDD
try { // on essaie d'exécuter
    $db = new PDO('mysql:host=localhost;dbname=pizzastore; charset=utf8', 'root', '', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, // Active les erreurs SQL
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // 
    ]);
} catch(Exception $e) { // si ça marche pas on catch
    echo $e->getMessage();
    // redirection en PHP
    header('Location: https://www.google.fr/search?q=' . $e->getMessage());
}

// 1. Écrire la requête qui permet de récupérer la pizza avec l'ID 3
echo "<h1>Écrire la requête qui permet de récupérer la pizza avec l'ID</h1>";
$query = $db->query('SELECT * FROM pizza WHERE id = 3');
while ($pizza = $query -> fetch()) {
    echo $pizza['name'];
}
echo "</ul>";


// 2. Récupérer l'ID dynamiquement à partir de l'URL
echo "<h1>Récupérer l'ID dynamiquement à partir de l'URL</h1>";
$id = 1;
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

if ($id < 1){
    $id = 1;
}


$query = $db->query('SELECT * FROM pizza WHERE id = ' . $id);
$pizza = $query -> fetch();

if ($pizza) {
    echo "Pizza n˚" . $id . " : " . $pizza['name'];
} else {
    echo "La pizza n'existe pas.";
}