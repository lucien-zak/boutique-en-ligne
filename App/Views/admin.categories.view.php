<?php
echo '<h1>Modifier vos Catégories</h1>';
echo '<table><thead><tr><th>Catégories</th><th>Actions</th></thead>';
echo '<tbody>';
foreach ($params['allcategory'] as $category) {
    echo '<tr>';
    echo '<td>' . $category['categorie'] . '</td>';
    echo '<td><a href="/admin/category/'.$category['id'].'">Voir la catégorie</a></td>';
    echo '<td><a href="/admin/category/delete/'.$category['id'].'">Supprimer la catégorie et les sous-catégorie</a></td>';
    //admin/category/delete/[i:id]';
    // echo '<td>'.$product->description.'</td>';
    // echo '<td>'.$product->stock.'</td>';
    // echo '<td>'.$product->categorie.'</td>';
    // echo '<td>'.$product->sub_categorie.'</td>';
    // echo '<td><a href="/admin/product/modify/'.$product->slug.'-'.$product->id.'">Modifier le produit</a></td>';
    // echo '<td><a href="/admin/product/delete/'.$product->slug.'-'.$product->id.'">Supprimer le produit</a></td>';
    echo '</tr>';

}
echo '</table>';

?>

<h1>Ajouter une catégorie</h1>
<form action="/admin/category/add" method="post">
    <input type="text" name="category" id="">
    <input type="submit" value="Ajouter">
</form>