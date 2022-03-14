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
                    <input id="quantity" value="1" type="number" name="quantity" min="1" max="<?= $params['product']->stock ?>">
                    <div class="right"></div>
                </div>
                <input type="text" value="<?= $params['product']->price ?>" name="price" hidden>
                <input type="text" value="<?= $params['product']->artist ?>" name="artist" hidden>
                <input type="text" value="<?= $params['product']->name ?>" name="name" hidden>
                <input type="text" value="<?= $params['product']->slug ?>" name="slug" hidden>
                <input type="text" value="<?= $params['product']->id ?>" name="id" hidden>
                <div class="buttons-container">
                    <button class="button" type="submit">Ajouter le produit au panier</button>
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
            <button class="button" type="submit">Soumettre</button>
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
                        <h5 id="btn" onclick="popupReply()">Répondre à cette avis</h5>
                        <h5 id="btn" onclick="popupAdminReview()">Signaler</h5>
                    </div>
                </div>
                <div id="reply-popup">
                    <div class="ctn">
                        <h2>Réponse à un avis</h2>
                        <h2 id="close-btn" onclick="closeBtn('reply-popup')">X</h2>
                    </div>
                    <form method="post" action='/product/sub_reviewadd/<?= $review->id ?>'>
                        <div class="input-container">
                            <div class="left"></div>
                            <textarea id="input" rows="5" name="sub_comment" placeholder="Décrivez la réponse de l'avis du produit"></textarea>
                            <div class="right"></div>
                        </div>
                        <div class="buttons-container">
                            <button class="button" type="submit">Soumettre la réponse</button>
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
                        <h4><?= $sub_review->sub_comment ?>'</h4>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>
    </div>
    <?php } ?>
</body>

<script src="../assets/script/script.js"></script>
<script>
    $(function () {
        $(".rateyo").rateYo({
            ratedFill: "#FC7E1F",
            starWidth: "25px",
            starSvg: '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--! Font Awesome Pro 6.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M381.2 150.3L524.9 171.5C536.8 173.2 546.8 181.6 550.6 193.1C554.4 204.7 551.3 217.3 542.7 225.9L438.5 328.1L463.1 474.7C465.1 486.7 460.2 498.9 450.2 506C440.3 513.1 427.2 514 416.5 508.3L288.1 439.8L159.8 508.3C149 514 135.9 513.1 126 506C116.1 498.9 111.1 486.7 113.2 474.7L137.8 328.1L33.58 225.9C24.97 217.3 21.91 204.7 25.69 193.1C29.46 181.6 39.43 173.2 51.42 171.5L195 150.3L259.4 17.97C264.7 6.954 275.9-.0391 288.1-.0391C300.4-.0391 311.6 6.954 316.9 17.97L381.2 150.3z"/></svg>',
            fullStar: true,
            }).on("rateyo.change", function (e, data) {
            var rating = data.rating;
            $(this).parent().find('.score').text('score :'+ $(this).attr('data-rateyo-score'));
            $(this).parent().find('.result').text('note :'+ rating);
            $(this).parent().find('input[name=rating]').val(rating); //add rating value to input field
        });
        $(".rateyo2").rateYo({
            ratedFill: "#FC7E1F",
            readOnly: true,
            starWidth: "25px",
            starSvg: '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--! Font Awesome Pro 6.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M381.2 150.3L524.9 171.5C536.8 173.2 546.8 181.6 550.6 193.1C554.4 204.7 551.3 217.3 542.7 225.9L438.5 328.1L463.1 474.7C465.1 486.7 460.2 498.9 450.2 506C440.3 513.1 427.2 514 416.5 508.3L288.1 439.8L159.8 508.3C149 514 135.9 513.1 126 506C116.1 498.9 111.1 486.7 113.2 474.7L137.8 328.1L33.58 225.9C24.97 217.3 21.91 204.7 25.69 193.1C29.46 181.6 39.43 173.2 51.42 171.5L195 150.3L259.4 17.97C264.7 6.954 275.9-.0391 288.1-.0391C300.4-.0391 311.6 6.954 316.9 17.97L381.2 150.3z"/></svg>',
        })
        $(".rateyo3").rateYo({
            ratedFill: "#FC7E1F",
            readOnly: true,
            starWidth: "17px",
            starSvg: '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--! Font Awesome Pro 6.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M381.2 150.3L524.9 171.5C536.8 173.2 546.8 181.6 550.6 193.1C554.4 204.7 551.3 217.3 542.7 225.9L438.5 328.1L463.1 474.7C465.1 486.7 460.2 498.9 450.2 506C440.3 513.1 427.2 514 416.5 508.3L288.1 439.8L159.8 508.3C149 514 135.9 513.1 126 506C116.1 498.9 111.1 486.7 113.2 474.7L137.8 328.1L33.58 225.9C24.97 217.3 21.91 204.7 25.69 193.1C29.46 181.6 39.43 173.2 51.42 171.5L195 150.3L259.4 17.97C264.7 6.954 275.9-.0391 288.1-.0391C300.4-.0391 311.6 6.954 316.9 17.97L381.2 150.3z"/></svg>',
        }) 
    });
</script>
