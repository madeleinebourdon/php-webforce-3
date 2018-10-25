<?php 
$currentPageTitle = 'Nos pizzas';
require_once(__DIR__.'/partials/header.php'); ?>



    <main class="container">
        <div class="page-title">
        <h1>Nos pizzas</h1>
        </div>
        
        <div class="row">
        <?php 

        $query = $db -> query('SELECT * FROM pizza');
        $pizzas = $query->fetchAll(); 

        foreach ($pizzas as $pizza) { ?>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-img">
                        <?php echo "<a href='pizza_single.php?id=" . $pizza['id'] . "'><img src='assets/" . $pizza['image'] . "' class='card-img-top'></a>"; ?>
                        <span class="img-price">
                            <?php echo formatPrice($pizza['price']); ?>
                        €</span>
                    </div>
                    <div class="card-body">
                        <h2><?php echo $pizza['name']; ?></h2>
                        <p class="pizza-description"><?php echo $pizza['description']; ?></p>
                        <button class="btn btn-success" onclick="location.href='pizza_single.php?id=<?php echo $pizza['id']; ?>'">Commander</button>
                    </div>
                </div>
            </div>
        <?php } ?>
        </div>
    </main>

<?php require_once(__DIR__.'/partials/footer.php'); ?>