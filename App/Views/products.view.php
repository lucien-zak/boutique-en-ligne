<?php 
dump($params);
// print_r($params['products'][0]->name);
for ($i = 0; count($params['products']) > $i; $i++ ){
    echo '<div>';
    echo '<h1>Nom du produit : '.$params['products'][$i]->name.'</h1>';
    echo '<h2>Description du produit : '.$params['products'][$i]->description.'</h2>';
    echo '<h3>Prix du produit : '.$params['products'][$i]->price.' $</h3>';
    echo '<h4>Date de sortie du produit : '.$params['products'][$i]->date.'</h4>';
    echo "<h5>Nom de l'artiste du produit : ".$params['products'][$i]->artist.'</h5>';
    echo '<h6>En savoir plus : <a href="/product/'.$params["products"][$i]->slug.'-'.$params["products"][$i]->id.'">ICI</a></h6>';
    echo '</div>';
}
?>
