<?php
require_once(__DIR__.'/../config/config.php');
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="assets/ico/favicon.ico">

    <title>Pizza Store</title>

    <link href="https://getbootstrap.com/docs/4.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/4.1/examples/starter-template/starter-template.css" rel="stylesheet">
  </head>

  <body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
      <a class="navbar-brand" href="#">Pizza Store</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>



      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item <?=($currentPageUrl === 'index') ? 'active' : ''; ?>">
            <a class="nav-link" href="index.php">Accueil</a>
          </li>
          <li class="nav-item <?=($currentPageUrl === 'pizza_list') ? 'active' : ''; ?>">
            <a class="nav-link" href="pizza_list.php">Liste des pizzas</a>
          </li>
        </ul>
      </div>
    </nav>