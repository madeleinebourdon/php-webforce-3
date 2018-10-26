<?php
try {
    $db = new PDO('mysql:host=localhost;dbname=pizzastore; charset=utf8', 'root', '', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, // Active les erreurs SQL
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // 
    ]);
} catch(Exception $e) {
    echo $e->getMessage();
    echo '<img src="assets/img/ghost-sad.gif" alt="error">';
    die('Stop');
}
?>