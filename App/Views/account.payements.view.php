
<?= isset($params['message'])?$params['message']:''; ?>

<?php
use App\Controllers\CardsController;

?>
<!-- <form action="/account/profil" method="POST">
    <input type="text" name="firstname" >
    <input type="text" name="name" >
    <input type="text" name="email" >
    <input type="password" name="password" >  
    <input type="password" name="passwordRep" >    
    <input type="text" name="adress" >
    <input type="submit">
</form>
<a href="/logout">deco</a> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $params['titre'] ?> - Vinyl Génération</title>
    <link rel="stylesheet" href="../assets/style/account.view.css">
    <link rel="stylesheet" href="../assets/style/header.style.css">
    <link rel="stylesheet" href="../assets/style/normalize.css">
    <script src="https://kit.fontawesome.com/225d5fd287.js" crossorigin="anonymous"></script>
</head>
<body>
    <main>
        <section class="home">
            <!-- <div class="container"> -->
                <!-- Faire une condition pour savoir si une carte à déjà été ajouté. -->
                <!-- <a class="box-add" href="/account/payements/add"> -->
                    <!-- <span class="box-icon fa-stack"> -->
                        <!-- <i class="icon far fa-circle fa-stack-2x"></i> -->
                        <!-- <i class="icon fas fa-plus fa-stack-1x"></i> -->
                    <!-- </span> -->
                    <!-- <h3>AJOUTER UNE CARTE BANCAIRE</h3> -->
                <!-- </a> -->
            <!-- </div> -->
        <?php  
        $control = new CardsController;
        $UserCards = $control->AllUserCards();
        foreach($UserCards as $card)
        {
            echo "$card[full_name] <br>";
            echo "$card[card_number] <br>";
            echo "$card[expiration_date] <br>";
        }
        ?>
            <div class="container-top">
                <div class="box-top">
                    <h3>VOS CARTES BANCAIRES</h3>
                    <a>
                        <i class="icon fas fa-plus"></i>
                    </a>
                </div>
            </div>
        </section>
    </main>
</body>
</html>
<?php


