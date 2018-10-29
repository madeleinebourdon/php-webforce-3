<?php 
$currentPageTitle = 'Ajouter une pizza';
require_once(__DIR__ . '/partials/header.php'); ?>

<div class="container">
    <h1>Ajouter une pizza</h1>

<?php if (isset($success) && $success) { ?>
        <div class="alert alert-success alert-dismissible fade show">
            La pizza <strong><?php echo $name; ?></strong> a bien été ajouté avec l'id <strong><?php echo $db->lastInsertId(); ?></strong> !
            <button type="button" class="close" data-dismiss="alert">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
<?php } ?>

    <form method="POST" enctype="multipart/form-data"  class="col-10 mx-auto">
    
        <div class="input-group mb-3"> <!-- pizza name -->
            <div class="input-group-prepend">
                <span class="input-group-text" id="pizza-name">Nom</span>
            </div>
            <input type="text" class="form-control" placeholder="Le nom de votre pizza" aria-label="Votre pizza" aria-describedby="pizza-name" name="name">
        </div>
        <div class="input-group mb-3"> <!-- price -->
            <div class="input-group-prepend">
                <span class="input-group-text" id="pizza-price">Prix</span>
            </div>
            <input type="text" class="form-control" placeholder="Son prix" aria-label="Son prix" aria-describedby="pizza-price" name="price">
        </div>
        <div class="input-group mb-3"> <!-- description -->
            <div class="input-group-prepend">
                <span class="input-group-text">Description</span>
            </div>
            <textarea class="form-control" placeholder="Sa description" aria-label="La description de votre pizza"  name="description"></textarea>
        </div>
        
        <div class="input-group mb-3"> <!-- category -->
            <div class="input-group-prepend">
                <label class="input-group-text" for="inputGroupSelect01">Catégorie</label>
            </div>
            <select class="custom-select" name="category">
                <option value="choose" selected>Choisissez votre base</option>
                <option value="tomato">Base tomate</option>
                <option value="cream">Base crème</option>
            </select>
        </div>
        
        <div class="input-group mb-3"> <!-- image -->
        <div class="input-group-prepend">
                <label class="input-group-text" for="inputGroupSelect01">Image</label>
            </div>
            <input class="form-control" type="file" enctype="multipart/form-data" id="fileToUpload" name="image"><br>
        </div>

        <input type="submit" value="Ajouter la pizza" class="btn btn-success">

        
    </div>
        
    </form>
</div>
<?php

function validation($pizzaName, $pizzaPrice, $pizzaDescription, $pizzaCategory, $pizzaImage) {
    global $db;
    $errors = [];

    if (!empty($_POST)) {
        $pizzaImage = $_FILES['image'];


        // PIZZA NAME
        if (empty($pizzaName)) { // si le nom de la pizza est vide
            $errors[] = "Votre pizza n'a pas de nom.<br>";
        } else {
            $pizzaName = ucfirst($pizzaName);
        }

        if (strlen($pizzaPrice) > 0){ // si le prix de la pizza n'est pas vide
            if (!is_numeric($pizzaPrice) || $pizzaPrice < 5 || $pizzaPrice > 19.99) { 
                $errors[] = "Votre pizza a un prix invalide.<br>";
            } else { // si le prix de la pizza est numérique
                // remplacer les virgules par des points dans l'envoi du formulaire
            }
           
        } else {
            $errors[] = "Votre pizza n'a pas de prix.<br>";
        }

        if(empty($pizzaDescription)) { // si le message fait plus de 15 caractères
            //mail($mail, $title, $message);
            $errors[] = "Vous n'avez pas définie de description.<br>";
        }

        if(!empty($pizzaCategory) || in_array($pizzaCategory, ['Base tomate', 'Base crème'])) { // si la catégorie est toujours celle de base (à revoir)
        } else {
            $errors[] = "La catégorie n'est pas valide.<br>";
        }

        if($pizzaImage['error'] === 4) { // erreur qui correspond à aucune image uploadée
            //mail($mail, $title, $message);
            $errors[] = "Vous n'avez pas envoyé d'image de pizza.<br>";
        }else {
            // $pizzaImage = "img/pizzas/" . $pizzaImage;
        }
        
        // ENVOI DE L'IMAGE
        var_dump($pizzaImage);
        $file = $pizzaImage['tmp_name']; // emplacement du fichier temporaire uploadé
        $fileName = '/img/pizzas/' .$pizzaImage['name']; // variable pour la base de données


        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mimeType = finfo_file($finfo, $file);
        $allowedExtensions = ['image/jpg', 'image/jpeg', 'image/gif', 'image/png'];
        // si l'extension n'est pas autorisée
        if (!in_array($mimeType, $allowedExtensions)) {
            $errors['image'] = 'Ce type de fichier n\'est pas autorisé';
        }

        // Vérifier la taille du fichier
        if ($pizzaImage['size'] > 2097152) { // si c'est plus gros que 2MB
            $errors['image'] = 'L\'image est trop lourde !';
            // echo "Attention ! Votre image est plus grosse que 2MB !";
        }

        if (!isset($errors['image'])) {
            move_uploaded_file($file, __DIR__. '/assets/img/pizzas/'. $pizzaImage['name']); // on déplace le fichier uploadé là où on veut
        }
        
        // fin de l'image


        if($errors == []) {
            $query = $db->prepare('
                INSERT INTO pizza (`name`, `price`, `description`, `category`, `image`) VALUES (:name, :price, :description, :category, :image)
            ');
            $query->bindValue(':name', $pizzaName, PDO::PARAM_STR);
            $query->bindValue(':price', $pizzaPrice, PDO::PARAM_STR);
            $query->bindValue(':description', $pizzaDescription, PDO::PARAM_STR);
            $query->bindValue(':category', $pizzaCategory, PDO::PARAM_STR);
            $query->bindValue(':image', $fileName, PDO::PARAM_STR);

            



            if ($query->execute()) { // On insère la pizza dans la BDD
                $success = true;
                // Envoyer un mail ?
                // Logger la création de la pizza
            }
            echo "Votre pizza a bien été ajoutée.";

        } else {
            echo '<div class="error"><strong>Erreur :</strong><ul>';
            foreach ($errors as $error) {
                echo "<li>" . $error . "</li>";
            }
            echo "</ul>
            Votre pizza n'a pas pu être ajoutée.</div>";
        }
    } else {
        echo "truc est empty";
    } 
}

if (isset($_POST['name'], $_POST['price'], $_POST['description'], $_POST['category'], $_FILES['image'])) {
    echo "<div class='result container'><div class='col-10  mx-auto'>";
    validation($_POST['name'], $_POST['price'], $_POST['description'], $_POST['category'], $_FILES['image']);
    echo "</div></div>";
}
?>
</div>
<?php
require_once(__DIR__ . '/partials/footer.php'); ?>