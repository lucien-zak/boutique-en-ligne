<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $params['titre'] ?> - Vinyl Génération</title>
    <?php
    if (isset($params['css'])) {
        echo '<link rel="stylesheet" href="/assets/style/' . $params["css"] . '.view.css">';
    }
    ?>
    <link rel="stylesheet" href="/assets/style/header.style.css">
    <link rel="stylesheet" href="/assets/style/normalize.css">
    <link rel="stylesheet" href="/assets/style/footer.style.css">
    <script src="https://kit.fontawesome.com/225d5fd287.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
    <script src="../assets/script/script.js"></script>
</head>

<body>
    <header id="top">
        <h1>Vinyl Génération</h1>
        <nav>
            <a href="/"><i class="fas fas-hidden fa-home"></i>
                <h4>Accueil</h4>
            </a>
            <a href="/products"><i class="color fas fas-hidden fa-record-vinyl"></i>
                <h4>Produits</h4>
            </a>
            <a id="cart" href="/account/cart"><i class="fas fas-hidden fa-shopping-cart"></i>
                <h4>Panier</h4>
            </a>
            <a href="/account"><i class="color fas fas-hidden fa-user"></i>
                <h4>Compte</h4>
            </a>
        </nav>
    </header>

    <?php
    if (isset($params['alert'])) {

        $alert = explode('---', $params['alert']);
    ?>
        <div id="displayAlert" class="<?= $alert[0] ?>">
            <h3 class="textAlert"><?= $alert[1] ?></h3>
            <h3 class="closeBtn" onclick="closeBtn('displayAlert')">X</h3>
        </div>
    <?php } ?>

<<<<<<< Updated upstream
=======
    <div id="cart-recap">
        <div class="container result">
            <div class="left"></div>
            <div class="list">
                <h2>Récapitulatif</h2>
                <hr>
                <?php foreach ($_SESSION['cart'] as $value) { ?>
                    <h3><?= $value['name'].' - '.$value['artist'].' total unitaire : '. $value['quantity'] * $value['price'].' Euros'   ?></h3>
                    <hr> 
                <?php } ?>
            </div>
            <h3>Montant total : <?= App\Controllers\CartController::total_product_cart() ?>€</h3>
        </div>
    </div>

>>>>>>> Stashed changes
    