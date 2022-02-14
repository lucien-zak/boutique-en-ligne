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
        <?php if($params['nb'] < 1) { ?>
            <div class="container">
                <a class="box-add" href="/account/payements/add">
                    <span class="box-icon fa-stack">
                        <i class="icon far fa-circle fa-stack-2x"></i>
                        <i class="icon fas fa-plus fa-stack-1x"></i>
                    </span>
                    <h3>AJOUTER UNE CARTE BANCAIRE</h3>
                </a>
            </div>
        <?php } else { ?>
            <div class="container customer">
            <div class="container-top">
                <div class="box-top">
                    <h3>VOS CARTES BANCAIRE</h3>
                    <?php if($params['nb'] < 2) { ?>
                    <a href="/account/addresses/add">
                        <i class="icon fas fa-plus"></i>
                    </a>
                    <?php } ?>
                </div>
                <form action="/account/profil" enctype="multipart/form-data" method="POST">
                    <div class="entry-container">
                         <?php
                            foreach($params['data'] as $card)
                            {
                                echo '
                                <div class="box profil">
                                    <div class="left"></div>';
                                echo "<h3>$card[full_name]</h3>";  
                                echo "<p>$card[card_number]</p>";
                                echo "<p>$card[expiration_date]</p>";
                                echo '
                                <div class="buttons-container">
                                    <button class="button edit" type="submit">Supprimer</button>
                                </div>
                                    <div class="right"></div>
                                </div>';
                            }
                        ?> 
                    </div>
                </form>
            </div>
        <?php } ?>
        </section>
    </main>
</body>
</html>
<?php


