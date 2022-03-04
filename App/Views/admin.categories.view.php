<?php

// dump($params);

echo '<h1>Modifier vos Catégories</h1>';
echo '<table><thead><tr><th>Catégories</th><th>Actions</th></thead>';
echo '<tbody>';
foreach ($params['allcategory'] as $category) {
    echo '<tr>';
    echo '<td>' . $category['categorie'] . '</td>';
    echo '<td><a href="/admin/category/'.$category['id'].'">Voir la catégorie</a></td>';
    // echo '<td>'.$product->description.'</td>';
    // echo '<td>'.$product->stock.'</td>';
    // echo '<td>'.$product->categorie.'</td>';
    // echo '<td>'.$product->sub_categorie.'</td>';
    // echo '<td><a href="/admin/product/modify/'.$product->slug.'-'.$product->id.'">Modifier le produit</a></td>';
    // echo '<td><a href="/admin/product/delete/'.$product->slug.'-'.$product->id.'">Supprimer le produit</a></td>';
    echo '</tr>';
}
