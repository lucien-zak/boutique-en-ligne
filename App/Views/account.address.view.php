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
                <a class="box-add" href="/account/addresses/add">
                    <span class="box-icon fa-stack">
                        <i class="icon far fa-circle fa-stack-2x"></i>
                        <i class="icon fas fa-plus fa-stack-1x"></i>
                    </span>
                    <h3>AJOUTER UNE ADRESSE</h3>
                </a>
            </div>
        <?php } else { ?>
            <div class="container customer">
            <div class="container-top">
                <div class="box-top">
                    <h3>VOS ADRESSES</h3>
                    <?php if($params['nb'] < 2) { ?>
                    <a href="/account/addresses/add">
                        <i class="icon fas fa-plus"></i>
                    </a>
                    <?php } ?>
                </div>
                <form action="/account/" enctype="multipart/form-data" method="POST">
                    <div class="entry-container">
                         <?php
                            foreach($params['data'] as $adress)
                            {
                                echo '
                                <div class="box profil">
                                    <div class="left"></div>';
                                echo "<h3>$adress[type]</h3>";  
                                echo "<p>$adress[full_name]</p>";
                                echo "<p>$adress[adress]</p>";
                                if(isset($adress['additional_adress'])) {
                                    echo "<p>$adress[additional_adress]</p>";
                                }
                                echo "<p>$adress[postal_code] $adress[city]</p>";
                                echo '
                                <div class="buttons-container">
                                    <button class="button edit" type="submit">Modifier</button>
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