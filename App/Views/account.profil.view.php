
<?= isset($params['message'])?$params['message']:''; ?>

<script>
    document.getElementById("uploadBtn").onchange = function () {
        document.getElementById("uploadFile").value = this.value;
    };
</script>
<body>
    <main>
        <section class="home">
            <div class="container profil">
                <h3>MODIFICATION DE VOTRE COMPTE</h3><br><br>
                <img class="avatar-profil" src="../assets/img/icons/users/<?= isset($_SESSION['user']['profil_img']) ? $_SESSION['user']['profil_img'] : 'user-default.png' ?>" alt="">
                <form action="/account/profil" enctype="multipart/form-data" method="POST">
                    <div class="entry-container">
                        <div class="box">
                            <div class="left"></div>
                            <input type="text" name="firstname" placeholder="Prénom" value="<?= $_SESSION['user']["firstname"] ?>">
                            <div class="right"></div>
                        </div>
                        <div class="box">
                            <div class="left"></div>
                            <input type="text" name="name" placeholder="Nom" value="<?= $_SESSION['user']["name"] ?>">
                            <div class="right"></div>
                        </div>
                        <div class="box">
                            <div class="left"></div>
                            <input type="email" name="email" placeholder="Email" value="<?= $_SESSION['user']["email"] ?>">
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