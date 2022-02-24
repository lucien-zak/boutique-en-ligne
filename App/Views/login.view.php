<?php !empty($session)?dump($_SESSION):'';

dump($_SERVER);
?>



<?= isset($params['message'])?$params['message']:''; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Vinyl Génération</title>
    <link rel="stylesheet" href="../assets/style/account.view.css">
    <link rel="stylesheet" href="../assets/style/header.style.css">
    <link rel="stylesheet" href="../assets/style/normalize.css">
<script src="https://kit.fontawesome.com/225d5fd287.js" crossorigin="anonymous"></script>
</head>
<body>
    <main>
        <section class="home">
            <div class="container">
                <h3 class="title">CONNEXION À VOTRE COMPTE</h3>
                <form action="/account/login" method="POST">
                    <div class="entry-container">
                        <div class="box">
                            <div class="left"></div>
                            <input type="email" name="email" placeholder="Email">
                            <div class="right"></div>
                        </div>
                        <div class="box">
                            <div class="left"></div>
                            <input type="password" name="password" placeholder="Mot de passe">
                            <div class="right"></div>
                        </div>
                    </div>
                    
                    <div class="buttons-container">
                        <button class="button" type="submit">Se connecter</button>
                        <div class="button">
                            <a href="/account/register" class="">
                               Inscription
                            </a>
                        </div>
                        <a href="">Vous avez oublié votre mot de passe ?</a>
                    </div>
                </form>
            </div>
        </section>
    </main>
</body>
</html>

