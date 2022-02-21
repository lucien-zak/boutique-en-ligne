<?php 
if (isset($_SESSION['cart'][$params['product']->id]['quantity'])){
    $stock = $params['product']->stock - $_SESSION['cart'][$params['product']->id]['quantity'];
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
echo '<h6>Retour à la liste des produits : <a href="/products">ICI</a></h6>';
echo '<h6>Il reste '.$params['product']->stock.' articles en stock';
echo '<h6>

<form action="" method="post">
<input type="number" name="quantity" min="0" max="'.$stock.'">
<input type="text" value="'.$params['product']->id.'" name="id" id="" hidden>
<input type="text" value="'.$params['product']->price.'" name="price" id="" hidden>
<input type="submit" value="Ajouter le produit au panier">
</form>


</h6> ';
echo '<h6>Catégorie : <a href="/products/category/'.$params['product']->categorie.'">'.$params['product']->categorie.'</a></h6>';
echo '</div>';
echo $stock;
?>
