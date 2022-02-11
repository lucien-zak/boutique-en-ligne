<!-- function pour Check si y a une adresse -->
<!-- function pour Add une adresse  -->
<!-- function pour Edit une adresse -->
<!-- function pour Delete une adresse -->

<?php

use App\Controllers\AdressController;

$control = new AdressController;
$UserAdresses = $control->AllUserAdresses();
foreach($UserAdresses as $adress)
{
    echo "$adress[type] <br>";
    echo "$adress[full_name] <br>";
    echo "$adress[adress] <br>";
    echo "$adress[postal_code] <br>";
    echo "$adress[city] <br>";

}
?>