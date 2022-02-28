<?php
// dump($_SESSION);
// dump($params);

// for ($i = 0; count($params['products']) > $i; $i++) {
//     echo '<div class="product">';
//     echo '<h1>Nom du produit : ' . $params['products'][$i]->name . '</h1>';
//     echo '<h3>Prix du produit : ' . $params['products'][$i]->price . ' $</h3>';
//     echo '<h4>Date de sortie du produit : ' . $params['products'][$i]->date . '</h4>';
//     echo "<h5>Nom de l'artiste du produit : " . $params['products'][$i]->artist . '</h5>';
//     echo '<h6>Lien vers le produit : <a href="/product/' . $params["products"][$i]->slug . '-' . $params["products"][$i]->id . '">ICI</a></h6>';
//     echo '</div>';
//     echo '<form action="/cart/modify/' . $params['products'][$i]->slug . '-' . $params['products'][$i]->id . '" method="post">
//     <input type="number" name="quantity" value=' . $_SESSION['cart'][$params['products'][$i]->slug . '-' . $params['products'][$i]->id]['quantity'] . ' min="0" max="' . $params['products'][$i]->stock . '">
//     <input type="submit" value="Modifier">
//     </form>';
//     echo '<form action="/cart/modify/' . $params['products'][$i]->slug . '-' . $params['products'][$i]->id . '" method="post">
//     <input type="number" name="quantity" value=' . 0 . ' hidden>
//     <input type="submit" value="X">
//     </form>';
//     echo 'Total du produit :  ' . $params['products'][$i]->price * $_SESSION['cart'][$params['products'][$i]->slug . '-' . $params['products'][$i]->id]['quantity'] . '$';
// }

// echo '<H2>Total du panier : ' . App\Controllers\CartController::total_product_cart() . ' $ </H2>';

?>




<body>
    <div>
        <form action="/products" method="post">
            <input type="search" name="search" id="search" placeholder="Your Search">
        </form>
        <form action="/order/delivrery" method="post">
            <input type="submit" id="delivery" value="Choose your delivery">
        </form>

        <?php
        for ($i = 0; count($params['products']) > $i; $i++) { ?>
        <div class="container">
                <div class="right"></div>
                <div class="content">
                    <img src="../assets/img/products/<?= $params['products'][$i]->slug . "-" . $params["products"][$i]->id ?>.png"></img>
                    <div class="info">
                        <div class="box">
                            <h3><?= $params['products'][$i]->artist ?></h3>
                            <h2><?= $params['products'][$i]->name ?></h2>
                            <?php
                            if($params["products"][$i]->stock > 0) {
                                echo '<h3 id="green">En stock</h3>';
                            } else {
                                echo '<h3 id="red">Plus en stock</h3>';
                            }
                            ?>
                            <h5><?= $params['products'][$i]->price ?>€</h5>
                        </div>
                        <form action="/cart/modify/<?= $params['products'][$i]->slug . '-' . $params['products'][$i]->id ?>" method="post">
                            <div class="quantity-box">
                                <div class="left"></div>
                                <input class="number" type="number" name="quantity" value='<?= $_SESSION["cart"][$params["products"][$i]->slug . '-' . $params["products"][$i]->id]["quantity"]?>' min="0" max="<?= $params["products"][$i]->stock ?>">
                                <div class="right"></div>
                            </div>
                            <button class="button">Modifier</button>
                        </form>
                    </div>
                </div>
                <div class="left"></div>
        </div>
        <?php } ?>
        <div class="container result">
            <?php if($_SESSION['cart']) { ?>
            <h3>Montant total : <?= App\Controllers\CartController::total_product_cart() ?>€</h3>
            <div class="button">
                <a class="button">Passer la commande</a>
            </div>
            <?php } else { ?>
            <h4>Vous n'avez pas d'article dans votre panier.</h4>
            <?php } ?>
        </div>
    </div>
</body>