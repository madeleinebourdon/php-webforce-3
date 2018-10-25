<?php 

function formatPrice($price) {
    $explodedPrice = explode('.', $price);
    echo $explodedPrice[0].',<span class="img-price-cents">'. $explodedPrice[1] . '</span>';
}

function pizzaName() {
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
        echo $pizza['name'];
    } else {
        echo "La pizza n'existe pas.";
    }
}

function pizza($column) {
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

    $id = 1;

    if (isset($_GET['$column'])) {
        $id = $_GET['$column'];
    }
    if ($id < 1){
        $id = 1;
    }
    

    $query = $db->query('SELECT * FROM pizza WHERE id = ' . $id);
    $pizza = $query -> fetch();

    if ($pizza) {
        echo $pizza['name'];
    } else {
        echo "La pizza n'existe pas.";
    }
}


?>