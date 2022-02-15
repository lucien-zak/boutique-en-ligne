<?php 
dump($params);
// print_r($params['products'][0]->name);
for ($i = 0; count($params['products']) > $i; $i++ ){
    echo '<div class="product">';
    echo '<h1>Nom du produit : '.$params['products'][$i]->name.'</h1>';
    echo '<h2>Description du produit : '.$params['products'][$i]->description.'</h2>';
    echo '<h3>Prix du produit : '.$params['products'][$i]->price.' $</h3>';
    echo '<h4>Date de sortie du produit : '.$params['products'][$i]->date.'</h4>';
    echo "<h5>Nom de l'artiste du produit : ".$params['products'][$i]->artist.'</h5>';
    echo '<h6>En savoir plus : <a href="/product/'.$params["products"][$i]->slug.'-'.$params["products"][$i]->id.'">ICI</a></h6>';
    echo '</div>';
}

echo '<form action="" method="post">';
echo '<fieldset>';
echo '<legend>Filtres</legend>';
foreach ($params['category'] as $key => $value) {
    echo '<input type="checkbox" id="'.$key.'" name="'.$key.'">';
    echo '<label for="'.$key.'">'.$key.'</label>';
    if(!is_array($value)){
        echo '<input type="checkbox" id="'.$value.'" name="'.$value.'">';
        echo '<label for="'.$value.'">'.$value.'</label>';
        }
    else {
        foreach($value as $value2){
            echo '<input type="checkbox" id="'.$value2.'" name="'.$value2.'">';
            echo '<label for="'.$value2.'">'.$value2.'</label>';
            }
    }

    }
    echo '<input type="submit" value="Filtrez">';
    echo '</form>';
?>

