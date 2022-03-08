<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $params['titre'] ?> - Vinyl Génération</title>
    <?php
    if(isset($params['css'])) {
        echo '<link rel="stylesheet" href="../assets/style/' . $params["css"] . '.view.css">';
    }
    ?>
    <link rel="stylesheet" href="../assets/style/header.style.css">
    <link rel="stylesheet" href="../assets/style/normalize.css">
    <link rel="stylesheet" href="../assets/style/footer.style.css">
    <script src="https://kit.fontawesome.com/225d5fd287.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
</head>
<body>
<header>
    <h1>Vinyl Génération</h1>
    <nav>
        <a href="/"><i class="fas fa-home"></i><h4>Accueil</h4></a>
        <a href="/products"><i class="color fas fa-record-vinyl"></i><h4>Produits</h4></a>
        <a href="/account/cart"><i class="fas fa-shopping-cart"></i><h4>Panier</h4></a>
        <a href="/account"><i class="color fas fa-user"></i><h4><?= isset($_SESSION['user']) ? 'Profil' : 'Connexion' ?></h4></a>
    </nav>
</header>

<!-- <?= App\Controllers\CartController::count_product_cart() ?> -->