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
    echo '<td><a href="/admin/product/delete/'.$product->slug.'-'.$product->id.'">Supprimer le produit</a></td>';
    echo '</tr>';
}
echo '</table>';
echo '<h1>Ajouter un produits</h1>';
echo '<form action="/admin/product/add" method="post">';
echo '<h3>Nom du produit : </h3><input type="text" value="" name="name" id="">';
echo '<h3>Description du produit : </h3><textarea name="description" id="" cols="30" rows="10"></textarea>';
echo '<h3>Prix du produit : </h3><input type="float" value="" name="price" id="">';
echo '<h3>Date de sortie du produit : </h3><input type="date" value="" name="released" id="">';
echo '<h3>Stock du produit : </h3><input type="number" min="0" value="" name="stock" id="">';
echo '<h3>Selectionner l\'artiste : </h3><select name="artist" id="">';
foreach($params['artists'] as $key => $artist)
{
    echo $artist['id'];
    echo '<option value="'.$artist['id'].'">'.$artist['artist'].'</option>';

}
echo '</select>';
echo '<h3>Selectionner la catégorie/sous-catégorie : </h3><select name="catgory" id="">';
foreach($params['allcategory'] as $category)
{
    
    echo '<option value="'.$category->categoriesid.'/'.$category->sub_categorieid.'">'.$category->categorie.' - '.$category->sub_categorie.'</option>';

}
echo '</select>';
echo '<br><input type="submit" value="Prévisualiser">';
echo '</form>';
?>


