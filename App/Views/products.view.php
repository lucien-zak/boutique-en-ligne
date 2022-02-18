<?php
var_dump($_POST);
// print_r($params['products'][0]->name);
echo '<fieldset>';
echo '<legend>Filtres</legend>';
echo '<form action="/products" method="post">';
foreach ($params['category'] as $key => $value) {
    echo '<input type="checkbox" id="' . $key . '" name="' . $key . '"'?><?=array_key_exists(str_replace(' ', '_', $key), $_REQUEST) ? 'checked' : ''?> <?php echo '>';
    echo '<label for="' . $key . '">' . $key . '</label>';
    if (!is_array($value)) {
        echo '<input type="checkbox" id="' . $value . '" name="' . $value . '"'?><?=array_key_exists(str_replace(' ', '_', $value), $_REQUEST) ? 'checked' : ''?> <?php echo '>';
        echo '<label for="' . $value . '">' . $value . '</label>';
    } else {
        foreach ($value as $value2) {
            echo '<input type="checkbox" id="' . $value2 . '" name="' . $value2 . '"'?><?=array_key_exists(str_replace(' ', '_', $value2), $_REQUEST) ? 'checked' : ''?> <?php echo '>';
            echo '<label for="' . $value2 . '">' . $value2 . '</label>';
        }
    }

}
echo '<input type="submit" value="Filtrez">';
echo '</form>';
echo '</fieldset>';
echo '<fieldset>';
echo '<legend>Recherche</legend>';
echo '<form action="" method="post">';
echo '<input type="search" name="search" id="search">';
echo '<label for="search"></label>';
echo '<input type="submit" value="search">';
echo '</fieldset>';

for ($i = 0; count($params['products']) > $i; $i++) {
    echo '<div class="product">';
    echo '<h1>Nom du produit : ' . $params['products'][$i]->name . '</h1>';
    echo '<h2>Description du produit : ' . $params['products'][$i]->description . '</h2>';
    echo '<h3>Prix du produit : ' . $params['products'][$i]->price . ' $</h3>';
    echo '<h4>Date de sortie du produit : ' . $params['products'][$i]->date . '</h4>';
    echo "<h5>Nom de l'artiste du produit : " . $params['products'][$i]->artist . '</h5>';
    echo '<h6>En savoir plus : <a href="/product/' . $params["products"][$i]->slug . '-' . $params["products"][$i]->id . '">ICI</a></h6>';
    echo '</div>';
}

?>

