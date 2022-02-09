<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $params['titre'] ?> - Vinyl Génération</title>
    <link rel="stylesheet" href="./assets/style/account.view.css">
    <link rel="stylesheet" href="./assets/style/header.style.css">
    <link rel="stylesheet" href="./assets/style/normalize.css">
    <script src="https://kit.fontawesome.com/225d5fd287.js" crossorigin="anonymous"></script>
</head>

<body>
    <main>
        <section class="home">
            <div class="container">
                <?php if( !$_SESSION ) { ?>
                <img src="./assets/img/icons/logo-enterprise-1.png" alt="">
                <div class="buttons-container">
                    <div class="button">
                        <a href="/account/login" class="">
                            Connexion
                        </a>
                    </div>
                    <div class="button">
                        <a href="/account/register" class="">
                            Inscription
                        </a>
                    </div>
                </div>
                <?php } else { ?>
                <img class="logo-user" src="./assets/img/icons/user-default.png" alt="">
                <h2 class="user-title">Bienvenue Kilian</h2>
                <div class="buttons-container">
                    <form action="/account/profil" method="POST">
                        <div class="buttons-container">
                            <button class="button" type="submit">Mes Informations</button>
                            <button class="button" type="submit">Mes Adresses</button>
                            <button class="button" type="submit">Moyen de paiements</button>
                            <button class="button" type="submit">Mes Commandes</button>
                            <button class="button" type="submit">Se déconnecter</button>
                        </div>
                    </form>
                </div>
                <?php } ?>
            </div>
        </section>
    </main>
</body>

</html>