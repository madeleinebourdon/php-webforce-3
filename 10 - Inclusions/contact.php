<?php 
include_once(__DIR__."/partials/header.php");
?>

<div class="container mt-5">
<h1>Contact</h1>
<form method="POST">
    <!-- email -->
    <div class="input-group mb-3">
    <div class="input-group-prepend">
        <span class="input-group-text" id="email">Email</span>
    </div>
    <input type="text" class="form-control" placeholder="Votre email" name="email" aria-label="Votre email" aria-describedby="email" required>
    </div>

    <!-- <label for="email">Email</label><br>
    <input type="email" placeholder="Votre email" name="email" id="email"><br> -->

    <!-- title -->
    <div class="input-group mb-3">
    <div class="input-group-prepend">
        <span class="input-group-text" id="title">Sujet</span>
    </div>
    <input type="text" class="form-control" placeholder="Le sujet de votre message" name="title" aria-label="Le sujet de votre message" aria-describedby="title" required>
    </div>

    <!-- <label for="title">Sujet</label><br>
    <input type="text" placeholder="Le sujet de votre message" name="title" id="title"> <br> -->

    <div class="input-group">
    <div class="input-group-prepend">
        <span class="input-group-text">Message</span>
    </div>
    <textarea class="form-control" placeholder="Votre message" aria-label="Votre message" name="message" required></textarea>
    </div>


    <!-- <label for="message">Message</label><br>
    <textarea id="message" placeholder="Votre message" name="message"></textarea> <br> -->
    
    <input type="submit" value="Envoyer" class="button btn btn-success mt-3">
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
<?php
include_once(__DIR__."/partials/footer.php");
?>

