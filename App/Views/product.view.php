<head>
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css" integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
</head>
<?php 
if (isset($_SESSION['cart'][$params['product']->slug.'-'.$params['product']->id]['quantity'])){
    $stock = $params['product']->stock - $_SESSION['cart'][$params['product']->slug.'-'.$params['product']->id]['quantity'];
}
else {
    $stock = $params['product']->stock;
}

echo '<div>';
echo '<h1>Nom du produit : '.$params['product']->name.'</h1>';
echo '<h2>Description du produit : '.$params['product']->description.'</h2>';
echo '<h3>Prix du produit : '.$params['product']->price.' $</h3>';
echo '<h4>Date de sortie du produit : '.$params['product']->date.'</h4>';
echo "<h5>Nom de l'artiste du produit : ".$params['product']->artist.'</h5>';
?>
<div class="rateyo2" id= "rating"
data-rateyo-rating="<?=$params['rating']['AVG(`mark`)']?>"
data-rateyo-num-stars="5"
data-rateyo-score="3">
</div>
<h6>une note moyenne de <?=round($params['rating']['AVG(`mark`)'], 1)?></h6>
<?php
echo '<h6>Retour à la liste des produits : <a href="/products">ICI</a></h6>';
echo '<h6>Il reste '.$stock.' articles en stock';
echo '<h6>

<form action="/cart/add/'.$params['product']->slug.'-'.$params['product']->id.'" method="post">
<input type="number" name="quantity" min="0" max="'.$stock.'">
<input type="text" value="'.$params['product']->price.'" name="price" id="" hidden>
<input type="text" value="'.$params['product']->artist.'" name="artist" id="" hidden>
<input type="text" value="'.$params['product']->name.'" name="name" id="" hidden>
<input type="text" value="'.$params['product']->slug.'" name="slug" id="" hidden>
<input type="text" value="'.$params['product']->id.'" name="id" id="" hidden>
<input type="submit" value="Ajouter le produit au panier">
</form>


</h6> ';

echo '<h6>Catégorie : <a href="/products/category/'.$params['product']->categorie.'">'.$params['product']->categorie.'</a></h6>';
echo '</div>';

if($params['favorites']===false)
{
    ?>
    <form action='/product/favorite_add/<?=$params['product']->id?>' method='POST'>
    <input type='submit' value='favoris'>
    </form>
    <?php
}
else{
    ?>
    <form action='/product/favorite_del/<?=$params['product']->id?>' method='POST'>
    <input type='submit' value='del'>
    </form>
    <?php
}

?>


<h3>Soummetre un commentaire</h3>

<form action="/product/reviewadd/<?=$params['product']->id?>" method="POST">

      <div class="rateyo" id= "rating"
         data-rateyo-rating="4"
         data-rateyo-num-stars="5"
         data-rateyo-score="3">
      </div>

      <input type="text" name="comment">
      <input type="hidden" name="rating">
      <div><input type="submit"> </div>
</form>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
 
<script>
 
 
    $(function () {
        $(".rateyo").rateYo({
            ratedFill: "#FC7E1F",
            starWidth: "25px",
            starSvg: '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--! Font Awesome Pro 6.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M381.2 150.3L524.9 171.5C536.8 173.2 546.8 181.6 550.6 193.1C554.4 204.7 551.3 217.3 542.7 225.9L438.5 328.1L463.1 474.7C465.1 486.7 460.2 498.9 450.2 506C440.3 513.1 427.2 514 416.5 508.3L288.1 439.8L159.8 508.3C149 514 135.9 513.1 126 506C116.1 498.9 111.1 486.7 113.2 474.7L137.8 328.1L33.58 225.9C24.97 217.3 21.91 204.7 25.69 193.1C29.46 181.6 39.43 173.2 51.42 171.5L195 150.3L259.4 17.97C264.7 6.954 275.9-.0391 288.1-.0391C300.4-.0391 311.6 6.954 316.9 17.97L381.2 150.3z"/></svg>',
            fullStar: true 
            }).on("rateyo.change", function (e, data) {
            var rating = data.rating;
            $(this).parent().find('.score').text('score :'+ $(this).attr('data-rateyo-score'));
            $(this).parent().find('.result').text('note :'+ rating);
            $(this).parent().find('input[name=rating]').val(rating); //add rating value to input field
        });
        $(".rateyo2").rateYo({
            ratedFill: "#00BFFF",
            readOnly: true,
            starWidth: "25px",
            starSvg: '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--! Font Awesome Pro 6.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M381.2 150.3L524.9 171.5C536.8 173.2 546.8 181.6 550.6 193.1C554.4 204.7 551.3 217.3 542.7 225.9L438.5 328.1L463.1 474.7C465.1 486.7 460.2 498.9 450.2 506C440.3 513.1 427.2 514 416.5 508.3L288.1 439.8L159.8 508.3C149 514 135.9 513.1 126 506C116.1 498.9 111.1 486.7 113.2 474.7L137.8 328.1L33.58 225.9C24.97 217.3 21.91 204.7 25.69 193.1C29.46 181.6 39.43 173.2 51.42 171.5L195 150.3L259.4 17.97C264.7 6.954 275.9-.0391 288.1-.0391C300.4-.0391 311.6 6.954 316.9 17.97L381.2 150.3z"/></svg>',
            })

        $(".rateyo3").rateYo({
            ratedFill: "#0000FF",
            readOnly: true,
            starWidth: "17px",
            starSvg: '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--! Font Awesome Pro 6.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M381.2 150.3L524.9 171.5C536.8 173.2 546.8 181.6 550.6 193.1C554.4 204.7 551.3 217.3 542.7 225.9L438.5 328.1L463.1 474.7C465.1 486.7 460.2 498.9 450.2 506C440.3 513.1 427.2 514 416.5 508.3L288.1 439.8L159.8 508.3C149 514 135.9 513.1 126 506C116.1 498.9 111.1 486.7 113.2 474.7L137.8 328.1L33.58 225.9C24.97 217.3 21.91 204.7 25.69 193.1C29.46 181.6 39.43 173.2 51.42 171.5L195 150.3L259.4 17.97C264.7 6.954 275.9-.0391 288.1-.0391C300.4-.0391 311.6 6.954 316.9 17.97L381.2 150.3z"/></svg>',
        })
        
    });
     

</script>

<?php

$reviews = $params['reviews'];
$sub_reviews = $params['sub_reviews'];


foreach($reviews as $review)
{
    ?>

    <div class="rateyo3" id= "rating"
    data-rateyo-rating="<?=$review->mark?>"
    data-rateyo-num-stars="5"
    data-rateyo-score="3">
    </div>

    <?php
    echo $review->comment .'<br>';
    ?>

    <form method="post" action='/product/sub_reviewadd/<?=$review->id?>'>
        <input type="text" name="sub_comment">
        <input type="submit">
    </form>

<?php

    foreach($sub_reviews[$review->id] as $sub_review)
    {
        echo $sub_review->sub_comment. '<br>';
    }
    
}
