<?php
if (isset($_SESSION['cart'][$params['product']->slug . '-' . $params['product']->id]['quantity'])) {
    $stock = $params['product']->stock - $_SESSION['cart'][$params['product']->slug . '-' . $params['product']->id]['quantity'];
} else {
    $stock = $params['product']->stock;
}
$reviews = $params['reviews'];
$sub_reviews = $params['sub_reviews'];
?>
<div class="container">
    <div class="left"></div>
    <div class="box">
        <img src="../assets/img/products/<?= $params['product']->slug . "-" . $params["product"]->id ?>.png"></img>
        <div class="informations">
            <h2><?= $params['product']->name ?></h2>
            <h4><?= $params['product']->artist ?></h4>
            <p>Il reste <?= $stock ?> produits en stock</p>
            <div class="content">
                <?php
                if ($params['favorites'] === 0) {
                    echo "<form action='/product/favorite_add/" . $params['product']->id . "' method='POST'>
                            <input type='submit' id='fav-add' value=''>
                        </form>";
                } elseif ($params['favorites'] === 1) {
                    echo "<form action='/product/favorite_del/" . $params['product']->id . "' method='POST'>
                            <input type='submit' id='fav-del' value=''>
                        </form>";
                }
                ?>
                <div class="rateyo2" id="rating" data-rateyo-rating="<?= $params['rating']['stars'] ?>" data-rateyo-num-stars="5" data-rateyo-score="3">
                </div>
            </div>
            <?php if ($stock > 0) { ?>
                <form action="/cart/add/<?= $params['product']->slug . '-' . $params['product']->id ?>" method="post">
                    <input id="quantity" value="1" type="number" name="quantity" min="0" max="<?= $stock ?>">
                    <input type="text" value="<?= $params['product']->price ?>" name="price" hidden>
                    <input type="text" value="<?= $params['product']->artist ?>" name="artist" hidden>
                    <input type="text" value="<?= $params['product']->name ?>" name="name" hidden>
                    <input type="text" value="<?= $params['product']->slug ?>" name="slug" hidden>
                    <input type="text" value="<?= $params['product']->id ?>" name="id" hidden>
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
        <form action="/cart/add/<?= $params['product']->slug . '-' . $params['product']->id ?>" method="post">
            <input type="text" value="<?= $params['product']->price ?>" name="price" hidden>
            <input type="text" value="<?= $params['product']->artist ?>" name="artist" hidden>
            <input type="text" value="<?= $params['product']->name ?>" name="name" hidden>
            <input type="text" value="<?= $params['product']->slug ?>" name="slug" hidden>
            <input type="text" value="<?= $params['product']->id ?>" name="id" hidden>
        </form>
    </div>
    <div class="right"></div>
</div>

<div class="container desc">
    <div class="left"></div>
    <div class="box">
        <div class="informations">
            <h2>Description</h2>
            <p>Lorem ipsum dolor sit amet. Et distinctio mollitia ut voluptates perferendis in dolor dolor. Ea officia sint aut odio repudiandae et aperiam nobis et rerum odit ex vitae deserunt.
                Hic dignissimos rerum ab inventore dolores qui nihil debitis. Et modi eius non ipsam harum qui impedit voluptatem eum molestiae laborum aut blanditiis cupiditate. Sed dolorum inventore aut unde possimus sit libero voluptatem et minima mollitia hic doloribus internos non cupiditate nisi! Nam tempora illum qui tempora mollitia et quia esse in quibusdam cupiditate id enim culpa ab iste iste.
                Ut consequatur cupiditate quo natus aliquid aut nostrum exercitationem et cumque cupiditate in impedit illo et enim fugit. Est suscipit sunt At omnis reiciendis est praesentium reprehenderit et dolorum iusto.</p>
        </div>
    </div>
    <div class="right"></div>
</div>

<div class="reviews">
    <form action="/product/reviewadd/<?= $params['product']->id ?>" method="POST">
        <h2>Soumettre son avis</h2>

        <div class="input-container">
            <div class="left"></div>
            <textarea id="input" rows="5" name="comment" placeholder="Décrivez votre avis sur le produit"></textarea>
            <div class="right"></div>
        </div>
        <div class="rateyo" id="rating" data-rateyo-rating="3" data-rateyo-num-stars="5" data-rateyo-score="3">
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
    <?php
    if (isset($reviews)) {
        foreach ($reviews as $review) { ?>
            <div class="box-review">
                <div class="review">
                    <div class="username">
                        <img src="../assets/img/icons/users/<?= $review->profil_img ?>" alt="">
                        <h3><?= $review->firstname ?> - <?= $review->id ?></h3>
                        <div class="rateyo3" id="rating" data-rateyo-rating="<?= $review->mark ?>" data-rateyo-num-stars="5" data-rateyo-score="3">
                            <h2></h2>
                        </div>
                    </div>
                    <h4><?= $review->comment ?></h4>
                    <div class="ctn">
                        <h5 class="response-btn" id_util="<?= $review->id ?>" name_util="<?= $review->firstname ?>">Répondre à cette avis</h5>
                    </div>
                </div>
                <div id="popup">
                    <form id="form-popup" method="POST">
                        <div class="container box">
                            <div class="left"></div>
                            <div class="top">
                                <h3 id="popup-title"></h3>
                                <h2 id="response-close">X</h2>
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
                foreach ($sub_reviews[$review->id] as $sub_review) { ?>
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