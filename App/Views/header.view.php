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
    <script src="https://kit.fontawesome.com/225d5fd287.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
</head>
<body>
<header>
    <nav>
        <a <?= $params['titre'] == "Accueil" ? "class='color-orange'" : "";?> href="/"><i class="fas fa-home"></i></a>
        <a <?= $params['titre'] == "Produits" or "Produit" ? "class='color-orange'" : "";?> href="/products"><i class="color fas fa-record-vinyl"></i></a>
        <a <?= $params['titre'] == "Votre Panier" ? "class='color-orange'" : "";?> href="/account/cart">
            <i class="fas fa-shopping-cart"></i>
            <h5><?= App\Controllers\CartController::count_product_cart() ?></h5>
        </a>
        <a <?= $params['titre'] == "Account" or "Profil" || "Vos Adresses" || "Vos Paiements" ? "class='color-orange'" : "";?> href="/account"><i class="color fas fa-user"></i></a>
    </nav>
</header>