<?php
// Récupérer l'id de la pizza dans l'url
$id = isset($_GET['id'])? $_GET['id'] : 0;

// Inclut la base de données
require_once(__DIR__.'/config/database.php'); 

// Récupérer les informations de la pizza
$query = $db->prepare('SELECT * FROM pizza WHERE id = :id'); // :id est un paramètre
$query->bindValue(':id', $id, PDO::PARAM_INT);
$query->execute(); // éxécute la requête
$pizza = $query->fetch();

if ($pizza === false) {
    http_response_code(404);
    $currentPageTitle = 'Error 404';
    require_once(__DIR__.'/partials/header.php'); ?>
    <h1 class='text-center'>Erreur 404</h1>
    <h3 class='text-center'>L'URL que vous avez demandée n'existe pas.</h3>
    <p class='text-center'>Vous allez être redirigé dans 5 secondes...</p>
    <script>
        setTimeout(function() {
            window.location = 'pizza_list.php';
        }, 5000);
    </script>
    <?php
    require_once(__DIR__.'/partials/footer.php');
    die();
    
}




require_once(__DIR__.'/partials/header.php');

$currentPageTitle = $pizza['name'];
require_once(__DIR__.'/partials/header.php'); ?>



<main class="container bg-light">
    <div class="main">
        <div class="page-title">
            <h1><?php echo $pizza['name']; ?></h1>
        </div>
        <div class="row">
            <div class="col-md-6 pizza-single-img">
                <img src="assets/<?php echo $pizza['image']; ?>" alt="pizza">
            </div>
            <div class="col-md-6">
                <div class="row">
                <span class="col-6 price">À partir de <?php formatPrice($pizza['price']); ?> €</span>
                <span class="col-6 text-right"><button class="btn btn-success">Commander</button></span>
            </div>
            <p class=""><?php echo $pizza['description']; ?></p>
        </div>
    </div>
    </div>
    

    <div class="other">
        <h2>Nos autres pizzas</h2>
        <div class="row">
            <?php 
            $query = $db -> query('SELECT * FROM pizza');
            $pizzas = $query->fetchAll();
            foreach ($pizzas as $pizza) {?>    
        <div class="col-md-2">
                <div class="card">
                    <div class="card-img">
                        <?php echo "<a href='pizza_single.php?id=" . $pizza['id'] . "'><img src='assets/" . $pizza['image'] . "' class='card-img-top'></a>"; ?>
                        <span class="img-price">
                            <?php echo formatPrice($pizza['price']); ?>
                        €</span>
                    </div>
                    <div class="card-body">
                        <h3><?php echo $pizza['name']; ?></h3>
                        
                    </div>
                </div>
            </div>
            <?php } ?>
    </div>
</main>


<?php require_once(__DIR__.'/partials/footer.php'); ?>