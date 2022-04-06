<body>
    <div>
        <form action="/products" method="post">
            <input type="search" name="search" id="search" placeholder="Your Search">
        </form>
        <form action="/order/delivrery" method="post">
            <input type="submit" id="delivery" value="Choose your delivery">
        </form>

        <?php if ($_SESSION['cart']) { ?>
            <div class="ctn-products">
                <div class="products-list">
                    <?php
                    for ($i = 0; count($params['products']) > $i; $i++) { ?>
                        <div class="container product">
                            <div class="right"></div>
                            <div class="content">
                                <img src="../assets/img/products/<?= $params['products'][$i]->slug . "-" . $params["products"][$i]->id ?>.png"></img>
                                <div class="info">
                                    <div class="box">
                                        <h3><?= $params['products'][$i]->artist ?></h3>
                                        <h2><?= $params['products'][$i]->name ?></h2>
                                        <?php
                                        if ($params["products"][$i]->stock > 0) {
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
                                            <input class="number" type="number" name="quantity" value='<?= $_SESSION["cart"][$params["products"][$i]->slug . '-' . $params["products"][$i]->id]["quantity"] ?>' min="0" max="<?= $params["products"][$i]->stock ?>">
                                            <div class="right"></div>
                                        </div>
                                        <div class="buttons-container">
                                            <button class="btn btn-primary" onclick="window.location.href='/'">
                                                <div class="left"></div>
                                                Modifier
                                                <div class="right"></div>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="left"></div>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="recap-list">
                        <div class="container result">
                            <div class="left"></div>
                            <div class="list">
                                <h2>Récapitulatif</h2>
                                <hr>
                                <?php for ($i = 0; count($params['products']) > $i; $i++) { ?>
                                    <h3><?= '[' .  $_SESSION["cart"][$params["products"][$i]->slug . '-' . $params["products"][$i]->id]["quantity"]  . '] ' .  $params['products'][$i]->name . ' - ' . $params['products'][$i]->artist . ' - ' . $params['products'][$i]->price . '€' ?></h3>
                                    <hr>
                                <?php } ?>
                            </div>
                            <h3>Montant total : <?= App\Controllers\CartController::total_product_cart() ?>€</h3>
                            <div class="buttons-container">
                                <button class="btn btn-primary" onclick="window.location.href='/account/cart'">
                                    <div class="left"></div>
                                    Passer la commande
                                    <div class="right"></div>
                                </button>
                            </div>
                            <div class="right"></div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } else { ?>
            <div class="no-cart">
                <div class="container">
                    <div class="left"></div>
                    <h4>Vous n'avez pas d'article dans votre panier.</h4>
                    <div class="right"></div>
                </div>
            </div>
        <?php } ?>
    </div>
    </div>
</body>