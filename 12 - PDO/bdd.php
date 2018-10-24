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

// // Permet de vérifier que la connexion à la base fonctionne
// var_dump($db);

// On crée une requête pour récupérer les pizzas
$query = $db -> query('SELECT * FROM pizza');
// var_dump($query);

// Pour récupérer une seule pizza
//$pizza = $query -> fetch();
// var_dump($pizza);
// var_dump($query -> fetch());

// // Pour récupérer toutes les pizzas
$pizzas = $query->fetchAll();
// var_dump($pizzas);

// Parcourir toutes les pizzas avec le fetchAll (Nom affiché dans un h1)
// for ($i=0; $i < count($pizzas) ; $i++) { 
//     print_r("<h1>" . $pizzas[$i]['name'] . "</h1>");
// }

echo "<h1>Utilisation de fetchAll</h1><ul>";

foreach ($pizzas as $pizza) {
    echo '<li>' . $pizza['name'] . '</li>';
}

echo "</ul><hr><h1>Utilisation de fetch</h1><ul>";

$query = $db->query('SELECT * FROM pizza');
// Parcourir toutes les pizzas avec le fetch (Nom affiché dans un h1)
while ($pizza = $query -> fetch()) {
    echo '<li>' . $pizza['name'] . '</li>';
}
echo "</ul>";
?>