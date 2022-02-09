
<?= isset($params['message'])?$params['message']:''; ?>

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
    <link rel="stylesheet" href="/../assets/style/account.view.css">
    <link rel="stylesheet" href="/../assets/style/header.style.css">
    <link rel="stylesheet" href="/../assets/style/normalize.css">
<script src="https://kit.fontawesome.com/225d5fd287.js" crossorigin="anonymous"></script>
</head>
<body>
    <main>
        <section class="home">
            <div class="container">
                <h3>MODIFICATION D'UNE CARTE BANCAIRE</h3>
                <form action="/account/profil" method="POST">
                    <div class="entry-container">
                        <div class="box">
                            <div class="left"></div>
                            <input type="text" name="firstname" placeholder="Prénom">
                            <div class="right"></div>
                        </div>
                        <div class="box">
                            <div class="left"></div>
                            <input type="text" name="name" placeholder="Nom">
                            <div class="right"></div>
                        </div>
                        <div class="box">
                            <div class="left"></div>
                            <input type="number" name="number" placeholder="Numéro de carte">
                            <div class="right"></div>
                        </div>
                        <div class="box">
                            <div class="left"></div>
                            <input type="number" name="password" placeholder="Mois">
                            <input type="number" name="password" placeholder="Année">
                            <div class="right"></div>
                        </div>
                        <div class="box">
                            <div class="left"></div>
                            <input type="number" name="cvv" placeholder="CVV">
                            <div class="right"></div>
                        </div>
                    </div>
                    <div class="buttons-container">
                        <div class="button">
                            <a href="/account/login" class="">
                                Sauvegarder
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </main>
</body>
</html>