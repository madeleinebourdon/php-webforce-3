<?php

include_once("a.php");
include "a.php"; // éxécute le contenu du fichier a
include("a.php"); // affiche le contenu du fichier a une deuxième fois
include_once("a.php"); // affiche le contenu du fichier a uniquement s'il n'a pas encore été affiché

// require "b.php"; // si b n'existe pas, le reste du code ne se lance pas.
// require __DIR__ . "b.php"; // pareil, mais on est sûr de bien inclure le fichier b.php

echo "Reste du site"

?>