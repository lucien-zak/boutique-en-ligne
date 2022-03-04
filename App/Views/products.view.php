 <?php
echo '<fieldset>';
echo '<legend>Filtres</legend>';
echo '<form action="/products" method="post">';
foreach ($params['category'] as $key => $value) {
    echo '<input type="checkbox" id="' . $key . '" name="' . $key . '"'?><?=array_key_exists(str_replace(' ', '_', $key), $_REQUEST) ? 'checked' : ''?> <?php echo '>';
    echo '<label for="' . $key . '">' . $key . '</label>';
    if (!is_array($value)) {
        echo '<input type="checkbox" id="' . $value . '" name="' . $value . '"'?><?=array_key_exists(str_replace(' ', '_', $value), $_REQUEST) ? 'checked' : ''?> <?php echo '>';
        echo '<label for="' . $value . '">' . $value . '</label>';
    } else {
        foreach ($value as $value2) {
            echo '<input type="checkbox" id="' . $value2 . '" name="' . $value2 . '"'?><?=array_key_exists(str_replace(' ', '_', $value2), $_REQUEST) ? 'checked' : ''?> <?php echo '>';
            echo '<label for="' . $value2 . '">' . $value2 . '</label>';
        }
    }

}
echo '<input type="submit" value="Filtrez">';
echo '</form>';
echo '</fieldset>';
?> 

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

