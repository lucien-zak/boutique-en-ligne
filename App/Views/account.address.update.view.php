<!DOCTYPE html>
<?php
dump($params);
?>
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
                <h3>MODIFIER VOTRE ADRESSE</h3>
                <form action="/account/adress/update/<?=$params['data']->type?>" method="POST"> 
                    <div class="entry-container">
                        <div class="box">
                            <div class="left"></div>
                            <input type="text" name="type" value= <?=$params['data']->type?> >
                            <div class="right"></div>
                        </div>
                        <div class="box">
                            <div class="left"></div>
                            <input type="text" name="full_name" value= <?=$params['data']->full_name?>>
                            <div class="right"></div>
                        </div>
                        <div class="box">
                            <div class="left"></div>
                            <input type="text" name="adress" value="<?=$params['data']->adress?>">
                            <div class="right"></div>
                        </div>
                        <div class="box">
                            <div class="left"></div>
                            <input type="text" name="additional_adress" value= <?=$params['data']->additional_adress?>>
                            <div class="right"></div>
                        </div>
                        <div class="box">
                            <div class="left"></div>
                            <input type="number" name="postal_code" value= <?=$params['data']->postal_code?>>
                            <div class="right"></div>
                        </div>
                        <div class="box">
                            <div class="left"></div>
                            <input type="text" name="city" value= <?=$params['data']->city?>>
                            <div class="right"></div>
                        </div>
                    </div>
                    <div class="buttons-container">
                        <button class="button" name="submit" type="submit">Modifier l'adresse</button>
                    </div>
                </form>
            </div>
        </section>
    </main>
</body>
</html>