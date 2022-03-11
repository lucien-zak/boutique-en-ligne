
<?= isset($params['message'])?$params['message']:''; ?>

<script>
    document.getElementById("uploadBtn").onchange = function () {
        document.getElementById("uploadFile").value = this.value;
    };
</script>
<body>
    <main>
        <div class="container profil">
            <h3>MODIFICATION DE VOTRE COMPTE</h3>
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
                    <div class="fileBtn box">
                        <div class="left"></div>
                        <div class="fileUpload">
                            <span>Choisir sa photo de profil</span>
                            <input id="uploadBtn" type="file" name="picture" class="upload" accept=".png, .jpeg, .jpg">
                        </div>
                        <div class="right"></div>
                    </div>
                </div>
                <div class="buttons-container">
                    <button class="btn btn-primary" type="submit"">
                        <div class="left"></div>
                        Sauvegarder
                        <div class="right"></div>
                    </button>
                </div>
            </form>
        </div>
    </main>
</body>
</html>