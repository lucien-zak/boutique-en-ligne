<?php
dump($params);
echo '<form action="" method="post">';
echo '<h3>Nom du produit : </h3><input type="text" value="'.$params['product']->name.'" name="" id="">';
echo '<h3>Description du produit : </h3><textarea name="" id="" cols="30" rows="10">'.$params['product']->description.'</textarea>';
echo '<h3>Prix du produit : </h3><input type="number" value="'.$params['product']->price.'" name="" id="">';
echo '<h3>Date de sortie du produit : </h3><input type="date" value="'.$params['product']->date.'" name="" id="">';
echo '<h3>Stock du produit : </h3><input type="number" min="0" value="'.$params['product']->stock.'" name="" id="">';
echo '<h3>Selectionner l\'artiste : </h3><select name="" id="">';
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
// echo '</select>';
// echo '<h3>Selectionner la catégorie et sous-catégorie associée : </h3><select name="" id="">';
// foreach ($params['category'] as $key => $categorie){
//     if (is_array($categorie)){
//         foreach ($categorie as $attr){
//             echo '<option value="'.$artist['id'].'">'.$artist['artist'].'</option>';
//         }
//     }
//     else {
//         echo $key.' - '.$categorie;
//     }
// }
echo '</form>'
?>



