<?php
dump($params);
dump($_REQUEST);

?>
 <form action="/order/verification" method="post">
    <fieldset>
    <legend>Livraison a domicile</legend>
    <?php
    if (!empty($params['adress'])) {
        for ($i = 0; isset($params['adress'][$i]); $i++) {
            echo '<input type="radio" name="typedelivery" value='.$params['adress'][$i]['type'].' id="dom">';
            echo '<label name='.$params['adress'][$i]['type'].' for="dom">'.$params['adress'][$i]['type'].'(+3,99$)</label>';
        } ?>
            
            <a href="/account/addresses"> Ajouter une adresse </a>
            <input type="submit" value="Passer au paiement">
    </fieldset>
    <fieldset>
        <legend>Point relais</legend>
        <input checked type="radio" name="typedelivery" value="Mondial Relay" id="mond">
        <label for="mond">Mondial Relay(Gratuit)</label>
    </fieldset>
</form>
<?php
}
else {
    echo '<p>Vous devez au moins enregister une adresse pour la facturation</p>';
    echo '<a href="/account/addresses"> Ajouter une adresse </a>';
}
?>

