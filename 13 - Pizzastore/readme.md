# Pizzastore

## 1. Récupérer un backup de la base pizzastore
L'intérêt est de pouvoir recréer la structure de la base à tout moment.

## 2. Au niveau du PHP, on va créer quelques fichiers / dossiers :
- config/database.php → connexion à la base de données en PDO, sera inclus dans tous les fichiers PHP
- config/config.php → stocke toutes les variables globales
- partials/header.php → le header du site à inclure dans toutes les pages (Bootstrap)
- partials/footer.php → le footer du site à inclure dans toutes les pages
- index.php → la page d'accueil du site
- pizza_list.php → lister toutes les pizzas de la base de données
- pizza_single.php → la page d'une pizza seule

## 3. Au niveau du front
- assets/ → dossier qui contiendra le css, le js, les images
- assets/css/style.css
- assets/js/script.js
- assets/img/