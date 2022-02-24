<body>
    <?php if( !$_SESSION ) { ?>
	<main>
        <section class="home">
            <div class="container">
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
			</div>
        </section>
	</main>
    <?php } else { ?>
	<main class="resize">
		<section class="home">
            <div class="container">
                <img class="avatar-profil" src="../assets/img/icons/users/<?= isset($_SESSION['profil_img']) ? $_SESSION['profil_img'] : 'user-default.png' ?>" alt="">
                <div class="buttons-container">
                    <form action="/account/profil" method="POST">
                        <div class="buttons-container">
                        <div class="button">
                                <a href="/account/profil" class="">
                                    Mes Informations
                                </a>
                            </div>
                            <div class="button">
                                <a href="/account/addresses" class="">
                                    Mes Adresses
                                </a>
                            </div>
                            <div class="button">
                                <a href="/account/payements" class="">
                                    Moyen de paiements
                                </a>
                            </div>
                            <div class="button">
                                <a href="/account/orders" class="">
                                    Mes Commandes
                                </a>
                            </div>
                            <div class="button">
                                <a href="/logout" class="">
                                    Se déconnecter
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
			</div>
        </section>
    </main>
	<?php } ?>
</body>

</html>