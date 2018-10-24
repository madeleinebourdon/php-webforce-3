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
<h1>Contact</h1>
<form method="POST">
    <label for="email">Email</label><input type="email" placeholder="Votre email" name="email" id="email"> <br>
    <label for="title">Sujet</label><input type="text" placeholder="Le sujet de votre message" name="title" id="title"> <br>
    <label for="message">Message</label><textarea id="message" placeholder="Votre message" name="message"></textarea> <br>
    <input type="submit" value="Envoyer" class="button">
</form>

<?php

function validation($mail, $title, $message) {
    $errors = [];


    if (!empty($_POST)) {

        // EMAIL
        if (empty($mail)) { // si l'email est vide
            $errors[] = "<span class='error'>Erreur : l'email est vide.</span><br>";
            echo "<span class='error'>Erreur : l'email est vide.</span><br>";
            
        }
        if (filter_var($mail, FILTER_VALIDATE_EMAIL)) { // si le mail est valide
            
        } else {
            $errors[] = "<span class='error'>Erreur : votre email n'est pas valide.</span><br>";
            echo "<span class='error'>Erreur : votre email n'est pas valide.</span><br>";
        }

        if (strlen($title) > 0){ // si sujet a bien été rempli
           
        } else {
            $errors[] = "<span class='error'>Erreur : votre sujet ne doit pas être vide.</span><br>";
            echo "<span class='error'>Erreur : votre sujet ne doit pas être vide.</span><br>";
        }

        if(strlen($message) >= 15) { // si le message fait plus de 15 caractères
            mail($mail, $title, $message);
            echo "Merci, votre message a bien été envoyé. Il sera traité dans les meilleurs délais.";
        } else {
            $errors[] = "<span class='error'>Erreur : votre message doit faire au moins 15 caractères.</span><br>";
            echo "<span class='error'>Erreur : votre message doit faire au moins 15 caractères.</span><br>";
        }
    } 
}

if (isset($_POST['email'], $_POST['title'], $_POST['message'])) {
    echo "<div class='result'>";
    validation($_POST['email'], $_POST['title'], $_POST['message']);
    echo "</div>";
}

?>


</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>