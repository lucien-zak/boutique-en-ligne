<?php
dump($params);
echo '<form action="/admin/product/update/'.$params['product']->slug.'-'.$params['product']->id.'" method="post">';
echo '<h3>Nom du produit : </h3><input type="text" value="'.$params['product']->name.'" name="name" id="">';
echo '<h3>Description du produit : </h3><textarea name="description" id="" cols="30" rows="10">'.$params['product']->description.'</textarea>';
echo '<h3>Prix du produit : </h3><input type="float" value="'.$params['product']->price.'" name="price" id="">';
echo '<h3>Date de sortie du produit : </h3><input type="date" value="'.$params['product']->date.'" name="released" id="">';
echo '<h3>Stock du produit : </h3><input type="number" min="0" value="'.$params['product']->stock.'" name="stock" id="">';
echo '<h3>Selectionner l\'artiste : </h3><select name="artist" id="">';
foreach($params['artists'] as $key => $artist)
{
    echo $artist['id'];
    if($params['product']->artist == $artist['artist'] )
    {
        echo '<option value="'.$artist['id'].'" selected>'.$artist['artist'].'</option>';

    }
    else 
    {
        echo '<option value="'.$artist['id'].'">'.$artist['artist'].'</option>';

    }
}
echo '</select>';
echo '<h3>Selectionner la catégorie/sous-catégorie : </h3><select name="catgory" id="">';
foreach($params['allcategory'] as $category)
{
    if ($category->sub_categorieid == $params['product']->id_sub_categorie) {
        echo '<option selected value="'.$category->categoriesid.'/'.$category->sub_categorieid.'">'.$category->categorie.' - '.$category->sub_categorie.'</option>';
    }
    else 
    {
        echo '<option value="'.$category->categoriesid.'/'.$category->sub_categorieid.'">'.$category->categorie.' - '.$category->sub_categorie.'</option>';

    }
}
echo '</select>';
echo '<input hidden type="text" name="id" value="'.$params['product']->id.'">';
echo '<input hidden type="text" name="slug" value="'.$params['product']->slug.'">';
echo '<h3>Validez pour modifier</h3>';
echo '<input type="submit" value="Modifier">';
echo '</form>';
?>



