<?php 
$currentPageTitle = 'Ajouter une pizza';
require_once(__DIR__ . '/partials/header.php'); ?>

<div class="container">
    <h1>Ajouter une pizza</h1>
    <form method="POST" class="col-10 mx-auto">
    
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
        
        <div class="mb-3"> <!-- image -->
            <label for="fileToUpload">Image :</label> <input type="file" id="fileToUpload" name="image"><br>
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

        // PIZZA NAME
        if (empty($pizzaName)) { // si le nom de la pizza est vide
            $errors[] = "Votre pizza n'a pas de nom.<br>";
        } else {
            $pizzaName = ucfirst($pizzaName);
        }

        if (strlen($pizzaPrice) > 0){ // si le prix de la pizza n'est pas vide
            if (is_numeric ($pizzaPrice)) { // si le prix de la pizza est numérique
                // remplacer les virgules par des points dans l'envoi du formulaire

            } else {
                $errors[] = "Votre pizza a un prix invalide.<br>";
            }
           
        } else {
            $errors[] = "Votre pizza n'a pas de prix.<br>";
        }

        if(empty($pizzaDescription)) { // si le message fait plus de 15 caractères
            //mail($mail, $title, $message);
            $errors[] = "Vous n'avez pas définie de description.<br>";
        }

        if($pizzaCategory === "choose") { // si la catégorie est toujours celle de base
            $errors[] = "Vous n'avez pas choisi de catégorie.<br>";
        }

        if(empty($pizzaImage)) { // si la pizza n'a pas d'image
            //mail($mail, $title, $message);
            $errors[] = "Vous n'avez pas choisi d'image pour votre pizza.<br>";
        }

        if($errors == []) {
            $query = $db->prepare('
                INSERT INTO pizza (`name`, `price`, `description`, `category`) VALUES (:name, :price, :description, :category)
            ');
            $query->bindValue(':name', $pizzaName, PDO::PARAM_STR);
            $query->bindValue(':price', $pizzaPrice, PDO::PARAM_STR);
            $query->bindValue(':description', $pizzaDescription, PDO::PARAM_STR);
            $query->bindValue(':category', $pizzaCategory, PDO::PARAM_STR);
            //$query->bindValue(':image', $image, PDO::PARAM_STR);

            if ($query->execute()) { // On insère la pizza dans la BDD
                $success = true;
                // Envoyer un mail ?
                // Logger la création de la pizza
            }

        } else {
            echo '<div class="error"><strong>Erreur :</strong><ul>';
            foreach ($errors as $error) {
                echo "<li>" . $error . "</li>";
            }
            echo "</ul>
            Votre pizza n'a pu être ajoutée.</div>";
        }
    } 
}

if (isset($_POST['name'], $_POST['price'], $_POST['description'], $_POST['category'], $_POST['image'])) {
    echo "<div class='result container'><div class='col-10  mx-auto'>";
    validation($_POST['name'], $_POST['price'], $_POST['description'], $_POST['category'], $_POST['image']);
    echo "</div></div>";
}
?>
</div>
<?php
require_once(__DIR__ . '/partials/footer.php'); ?>