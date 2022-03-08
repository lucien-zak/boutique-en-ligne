</head>
<body>
    <form action="/products" method="post">
        <input type="search" name="search" id="search" placeholder="Your Search">
        <a id="filter" href=""><i class="fas fa-filter"></i></a>
    </form>
    <div class="product-container">
    <?php
        for ($i = 0; count($params['products']) > $i; $i++) {?>
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
                        <button class="button" href="/account/login">Ajouter au panier</button>
                    </div>
                </div>
                <div class="left"></div>
            </a>
        <?php } ?>
    </div>
</body>
</html>

