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


## Ajout d'une pizza
- Créer la page pizza_add.php (Permettra d'ajouter une pizza côté administrateur)
- Ne pas oublier le header et le footer
- Ajouter un titre "Ajouter une pizza"
- Ajouter un formulaire avec les champs suivants :
    - Nom : saisie libre
    - Prix : entre 5 et 19.99
    - Image : saisie libre
    - Description : saisie libre
    - Catégorie : select
- Faire le traitement du formulaire (vérifier les données)
- Modifier la base de données pour ajouter le champ description (TEXT) et catégorie (VARCHAR ou ENUM) dans la table pizza
- Ajouter la pizza dans la base avec une requête quand on clique sur le bouton submit du formulaire