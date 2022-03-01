<?php

// dump($params);

echo '<h1>Modifier vos produits</h1>';
echo '<table><thead><tr><th>Designation du produit</th><th>Nom du produit</th><th>Descritpion du produit</th><th>En stock</th><th>Catégorie du produit</th><th>Sous-catégorie du produit</th></thead>';
echo '<tbody>';
foreach ($params['products'] as $product) 
{   
    echo '<tr>';
    echo '<td>'.$product->slug.'-'.$product->id.'</td>';
    echo '<td>'.$product->name.'</td>';
    echo '<td>'.$product->description.'</td>';
    echo '<td>'.$product->stock.'</td>';
    echo '<td>'.$product->categorie.'</td>';
    echo '<td>'.$product->sub_categorie.'</td>';
    echo '<td><a href="/admin/product/modify/'.$product->slug.'-'.$product->id.'">Modifier le produit</a></td>';
    echo '<td><a href="/">Supprimer le produit</a></td>';
    echo '</tr>';
}

?>


