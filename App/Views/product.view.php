<?php
if (isset($_SESSION['cart'][$params['product']->slug.'-'.$params['product']->id]['quantity'])){
    $stock = $params['product']->stock - $_SESSION['cart'][$params['product']->slug.'-'.$params['product']->id]['quantity'];
}
else {
    $stock = $params['product']->stock;
}

$reviews = $params['reviews'];
$sub_reviews = $params['sub_reviews'];
?>


<body>
    <div class="container">
        <div class="left"></div>
        <div class="box">
            <img src="../assets/img/products/<?= $params['product']->slug . "-" . $params["product"]->id ?>.png"></img>
            <h2><?=  $params['product']->name ?></h2>
            <h4><?= $params['product']->artist ?></h4>
            <div class="content">
                <?php
                if($params['favorites'] === 0) {
                    echo "<form action='/product/favorite_add/".$params['product']->id."' method='POST'>
                        <input type='submit' id='fav-add' value=''>
                    </form>";
                } elseif($params['favorites'] === 1) {
                    echo "<form action='/product/favorite_del/".$params['product']->id."' method='POST'>
                        <input type='submit' id='fav-del' value=''>
                    </form>";
                }
                ?>
                <div class="rateyo2" id= "rating"
                data-rateyo-rating="<?= $params['rating']['stars'] ?>"
                data-rateyo-num-stars="5"
                data-rateyo-score="3">
                </div>
            </div>
            <form action="/cart/add/<?= $params['product']->slug.'-'.$params['product']->id ?>" method="post">
                <div class="input-container">
                    <div class="left"></div>
                    <?= $stock == 0 ? '' : '<input id="quantity" value="1" type="number" name="quantity" min="0" max="'.$stock.'">'?>
                    <div class="right"></div>
                </div>
                <input type="text" value="<?= $params['product']->price ?>" name="price" hidden>
                <input type="text" value="<?= $params['product']->artist ?>" name="artist" hidden>
                <input type="text" value="<?= $params['product']->name ?>" name="name" hidden>
                <input type="text" value="<?= $params['product']->slug ?>" name="slug" hidden>
                <input type="text" value="<?= $params['product']->id ?>" name="id" hidden>
                <div class="buttons-container">
                    <p>Il reste <?= $stock ?> en stock</p>
                    <?= $stock == 0 ? '<p>Vous ne pouvez pas commander</p>' : '<button class="button" type="submit">Ajouter le produit au panier</button>'?>
                </div>
            </form>
        </div>
        <div class="right"></div>
    </div>

    <form action="/product/reviewadd/<?=$params['product']->id?>" method="POST">
        <h2>Soumettre son avis</h2>
        
        <div class="input-container">
            <div class="left"></div>
            <textarea id="input" rows="5" name="comment" placeholder="Décrivez votre avis sur le produit"></textarea>
            <div class="right"></div>
        </div>
        <div class="rateyo" id= "rating"
            data-rateyo-rating="3"
            data-rateyo-num-stars="5"
            data-rateyo-score="3">
        </div>

        <input type="hidden" name="rating">
        <div class="buttons-container">
            <button class="btn btn-primary" type="submit">
                <div class="left"></div>
                Soumettre
                <div class="right"></div>
            </button>
        </div>
    </form>

    <div class="reviews">
    <?php
    if(isset($reviews)) {
        foreach($reviews as $review)
        { ?>
            <div class="box-review">
                <div class="review">
                    <div class="username">
                        <img src="../assets/img/icons/users/<?= $review->profil_img ?>" alt="">
                        <h3><?= $review->firstname ?></h3>
                        <div class="rateyo3" id= "rating"
                        data-rateyo-rating="<?= $review->mark ?>"
                        data-rateyo-num-stars="5"
                        data-rateyo-score="3">
                        <h2></h2></div>
                    </div>
                    <h4><?= $review->comment ?></h4>
                    <div class="ctn">
                        <h5 id="btn" onclick="popupFrame('popup')">Répondre à cette avis</h5>
                        <h5 id="btn" onclick="popupAdminReview()">Signaler</h5>
                    </div>
                </div>
                <div id="popup">
                    <form action="/product/sub_reviewadd/<?=$review->id?>" method="POST">
                        <div class="container box">
                            <div class="left"></div>
                            <div class="top">
                                <h3>Répondre à l'avis de <?= $review->firstname ?></h3>
                                <h2 id="closeBtn" onclick="closeBtn('popup')">X</h2>
                            </div>
                            <div class="content">
                                <div class="input-container">
                                    <div class="left"></div>
                                    <textarea id="input" rows="5" name="sub_comment" placeholder="Décrivez votre avis sur le produit"></textarea>
                                    <div class="right"></div>
                                </div>
                                <div class="buttons-container">
                                    <button class="btn btn-primary" type="submit">
                                        <div class="left"></div>
                                        Répondre à l'avis
                                        <div class="right"></div>
                                    </button>
                                </div>
                            </div>
                            <div class="right"></div>
                        </div>
                    </form>
                </div>
                <?php
                foreach($sub_reviews[$review->id] as $sub_review)
                { ?>
                    <div class="sub-review">
                        <div class="username"> 
                            <img src="../assets/img/icons/users/<?= $sub_review->profil_img ?>" alt="">
                            <h3><?= $sub_review->firstname ?></h3>
                        </div>
                        <h4><?= $sub_review->sub_comment ?></h4>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>
    </div>
    <?php } ?>
</body>
