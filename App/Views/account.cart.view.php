<?php
dump($_SESSION);
dump($params);
for ($i = 0; count($params['products']) > $i; $i++) {
    echo '<div class="product">';
    echo '<h1>Nom du produit : ' . $params['products'][$i]->name . '</h1>';
    echo '<h3>Prix du produit : ' . $params['products'][$i]->price . ' $</h3>';
    echo '<h4>Date de sortie du produit : ' . $params['products'][$i]->date . '</h4>';
    echo "<h5>Nom de l'artiste du produit : " . $params['products'][$i]->artist . '</h5>';
    echo '<h6>Lien vers le produit : <a href="/product/' . $params["products"][$i]->slug . '-' . $params["products"][$i]->id . '">ICI</a></h6>';
    echo '</div>';
    echo '<form action="/cart/modify/'. $params['products'][$i]->slug.'-'. $params['products'][$i]->id.'" method="post">
    <input type="number" name="quantity" value='.$_SESSION['cart'][$params['products'][$i]->slug.'-'. $params['products'][$i]->id]['quantity'].' min="0" max="'.$params['products'][$i]->stock.'">
    <input type="submit" value="Modifier">
    </form>';
    echo '<form action="/cart/modify/'. $params['products'][$i]->slug.'-'. $params['products'][$i]->id.'" method="post">
    <input type="number" name="quantity" value='. 0 .' hidden>
    <input type="submit" value="X">
    </form>';
    echo 'Total du produit :  '.$params['products'][$i]->price * $_SESSION['cart'][$params['products'][$i]->slug.'-'. $params['products'][$i]->id]['quantity'].'$';
    }

    echo '<H2>Total du panier : '.App\Controllers\CartController::total_product_cart().' $ </H2>';




