
<?= isset($params['message'])?$params['message']:''; ?>

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

    <script>
        document.getElementById("uploadBtn").onchange = function () {
            document.getElementById("uploadFile").value = this.value;
        };
    </script>
</head>
<body>
    <main>
        <section class="home">
            <div class="container profil">
                <h3>MODIFICATION DE VOTRE COMPTE</h3><br><br>
                <img class="avatar" src="../assets/img/icons/users/<?= isset($_SESSION['profil_img']) ? $_SESSION['profil_img'] : 'user-default.png' ?>" alt="">
                <form action="/account/profil" enctype="multipart/form-data" method="POST">
                    <div class="entry-container">
                        <div class="box">
                            <div class="left"></div>
                            <input type="text" name="firstname" placeholder="Prénom" value="<?= $_SESSION["firstname"] ?>">
                            <div class="right"></div>
                        </div>
                        <div class="box">
                            <div class="left"></div>
                            <input type="text" name="name" placeholder="Nom" value="<?= $_SESSION["name"] ?>">
                            <div class="right"></div>
                        </div>
                        <div class="box">
                            <div class="left"></div>
                            <input type="email" name="email" placeholder="Email" value="<?= $_SESSION["email"] ?>">
                            <div class="right"></div>
                        </div>
                        <div class="box">
                            <div class="left"></div>
                            <input type="password" name="password" placeholder="Mot de passe">
                            <div class="right"></div>
                        </div>
                        <div class="box">
                            <div class="left"></div>
                            <input type="password" name="passwordRep" placeholder="Confirmez le mot de passe">
                            <div class="right"></div>
                        </div>
                        <div class="box profil">
                            <div class="left"></div>
                            <div class="fileUpload btn btn-primary">
                                <span>Choisir sa photo de profil</span>
                                <input id="uploadBtn" type="file" name="picture" class="upload" accept=".png, .jpeg, .jpg">
                            </div>
                            <div class="right"></div>
                        </div>
                    </div>
                    <div class="buttons-container">
                        <button class="button" type="submit">Sauvegarder</button>
                    </div>
                </form>
            </div>
        </section>
    </main>
</body>
</html>