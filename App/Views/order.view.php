<?php
dump($params);
dump($_REQUEST);

?>

<fieldset>
    <legend>Choissisez votre livraison</legend>
    <form action="/order/verification" method="post">
<?php
if (!empty($params['adress'])) {
    for ($i = 0; isset($params['adress'][$i]); $i++) {
        echo '<input type="radio" name="typedelivery" value="Home" id="dom">';
        echo '<label for="dom">'.$params['adress'][$i]['type'].'(+3,99$)</label>';
    } ?>
        <input checked type="radio" name="typedelivery" value="Mondial Relay" id="mond">
        <label for="mond">Mondial Relay(Gratuit)</label>
        <a href="/account/addresses"> Ajouter une adresse </a>
        <input type="submit" value="Passer au paiement">
</fieldset>
</form>
<?php
}
else {
    echo '<p>Vous devez au moins enregister une adresse pour la facturation</p>';
    echo '<a href="/account/addresses"> Ajouter une adresse </a>';
}
?>

