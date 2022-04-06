</head>

    <form action="/products" method="post">
        <input type="search" name="search" id="search" placeholder="Your Search">
        <button id="filter"><i class="fas fa-filter"></i></button>
    </form>
    <div class="product-container">
        <?php
        for ($i = 0; count($params['products']) > $i; $i++) { ?>
            <a class="product" href="/product/<?= $params["products"][$i]->slug . "-" . $params["products"][$i]->id ?>">
                <div class="right"></div>
                <div class="content">
                    <img src="../assets/img/products/<?= $params['products'][$i]->slug . "-" . $params["products"][$i]->id ?>.png"></img>
                    <div class="info">
                        <div class="box">
                            <h3><?= $params['products'][$i]->artist ?></h3>
                            <h2><?= $params['products'][$i]->name ?></h2>
                            <h3>Sortie le <?= $params['products'][$i]->date ?></h3>
                            <h5><?= $params['products'][$i]->price ?>€</h5>
                        </div>
                        <?php 
                            if (isset($_SESSION['cart'][$params['products'][$i]->slug.'-'.$params['products'][$i]->id]['quantity'])){
                                $stocka = $params['products'][$i]->stock;
                                $stock = $stocka - $_SESSION['cart'][$params['products'][$i]->slug.'-'.$params['products'][$i]->id]['quantity'];
                            }
                            else {
                                $stock = $params['products'][$i]->stock;
                            }
                            if ($stock > 0) { ?>
                            <form action="/cart/add/<?= $params['products'][$i]->slug . '-' . $params['products'][$i]->id ?>" method="post">
                                <input type="text" value="1" name="quantity" hidden>
                                <input type="text" value="<?= $params['products'][$i]->price ?>" name="price" hidden>
                                <input type="text" value="<?= $params['products'][$i]->price ?>" name="price" hidden>
                                <input type="text" value="<?= $params['products'][$i]->artist ?>" name="artist" hidden>
                                <input type="text" value="<?= $params['products'][$i]->name ?>" name="name" hidden>
                                <input type="text" value="<?= $params['products'][$i]->slug ?>" name="slug" hidden>
                                <input type="text" value="<?= $params['products'][$i]->id ?>" name="id" hidden>
                                <div class="buttons-container">
                                    <button class="btn btn-primary" type="submit">
                                        <div class="left"></div>
                                        Ajouter au panier
                                        <div class="right"></div>
                                    </button>
                                </div>
                            </form>
                        <?php } else { ?>
                            <h4 id="red">Plus de stock disponible.</h4>
                        <?php } ?>
                    </div>
                </div>
                <div class="left"></div>
            </a>
        <?php } ?>
    </div>