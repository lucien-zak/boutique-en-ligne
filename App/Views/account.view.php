<body>
    <?php if (!isset($_SESSION['user'])) { ?>
        <main>
            <section class="home">
                <div class="container">
                    <img src="./assets/img/icons/logo-enterprise-1.png" alt="">
                    <div class="buttons-container">
                        <button class="btn btn-primary" onclick="window.location.href='/account/login'">
                            <div class="left"></div>
                            Se connecter
                            <div class="right"></div>
                        </button>
                        <button class="btn btn-primary" onclick="window.location.href='/account/register'">
                            <div class="left"></div>
                            Inscription
                            <div class="right"></div>
                        </button>
                    </div>
                </div>
            </section>
        </main>
    <?php } else { ?>
        <main>
            <div class="container profil">
                <img class="avatar-profil" src="../assets/img/icons/users/<?= isset($_SESSION['user']['profil_img']) ? $_SESSION['user']['profil_img'] : 'user-default.png' ?>" alt="">
                    <div class="buttons-container">
                        <button class="btn btn-primary" onclick="window.location.href='/account/profil'">
                            <div class="left"></div>
                            Mes Informations
                            <div class="right"></div>
                        </button>
                        <button class="btn btn-primary" onclick="window.location.href='/account/addresses'">
                            <div class="left"></div>
                                Mes Adresses
                            <div class="right"></div>
                        </button>
                        <hr id="line">
                        <button class="btn btn-primary" onclick="window.location.href='/account'">
                            <div class="left"></div>
                                Mes Commandes
                            <div class="right"></div>
                        </button>
                        <button class="btn btn-primary" onclick="window.location.href='/account'">
                            <div class="left"></div>
                                Mes Favoris
                            <div class="right"></div>
                        </button>
                        <hr id="line">
                        <button class="btn btn-primary" onclick="window.location.href='/logout'">
                            <div class="left"></div>
                                Se déconnecter
                            <div class="right"></div>
                        </button>
                    </div>
            </div>
        </main>
    <?php } ?>
</body>

</html>