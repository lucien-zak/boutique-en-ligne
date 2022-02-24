<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $params['titre'] ?> - Vinyl Génération</title>
    <link rel="stylesheet" href="../assets/style/account.view.css">
    <link rel="stylesheet" href="../assets/style/card.view.css">
    <link rel="stylesheet" href="../assets/style/header.style.css">
    <link rel="stylesheet" href="../assets/style/normalize.css">
    <script src="https://kit.fontawesome.com/225d5fd287.js" crossorigin="anonymous"></script>
</head>

<body>
    <main>
        <section class="home">
            <?php if ($params['nb'] < 1) { ?>
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
                            <?php if ($params['nb'] < 2) { ?>
                                <a href="/account/addresses/add">
                                    <i class="icon fas fa-plus"></i>
                                </a>
                            <?php } ?>
                        </div>
                        <div class="card-container">
                            <?php foreach ($params['data'] as $card) { ?>
                                <div class="card">
                                    <div class="card__front card__part <?= $card['type'] ?>">
                                        <img class="card__front-square card__square" src="../assets/img/icons/<?= $card['type'] ?>-Logo.png">
                                        <p class="card_numer">**** **** **** <?= $card['four_last'] ?></p>
                                        <div class="card__space-75">
                                            <span class="card__label">Card holder</span>
                                            <p class="card__info"><?= $card['full_name'] ?></p>
                                        </div>
                                        <div class="card__space-25">
                                            <span class="card__label">Expires</span>
                                            <p class="card__info"><?= $card['expiration_date'] ?></p>
                                        </div>
                                    </div>

                                    <div class="card__back card__part <?= $card['type'] ?>">
                                        <div class="card__black-line"></div>
                                        <div class="card__back-content">
                                            <div class="card__secret">
                                                <p class="card__secret--last">***</p>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="buttons-container">
                                            <button class="button edit" type="submit">Supprimer</button>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    <?php } ?>
                    </div>
                </div>
            <?php } ?>
        </section>
    </main>
</body>

</html>
<?php
