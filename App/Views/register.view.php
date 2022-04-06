<?php !empty($session) ? dump($_SESSION) : '' ?>
<main>
    <section class="home">
        <div class="container">
            <h3 class="title">CRÉATION DE VOTRE COMPTE</h3>
            <form action="/account/register" id="register" method="POST">
                <div class="entry-container">
                    <div class="box">
                        <div class="left"></div>
                        <input type="text" name="firstname" id="firstname" placeholder="Prénom">
                        <div class="right"></div>
                    </div>
                    <div class="box">
                        <div class="left"></div>
                        <input type="text" name="name" id="name" placeholder="Nom">
                        <div class="right"></div>
                    </div>
                    <div class="box">
                        <div class="left"></div>
                        <input type="email" name="email" id="email" placeholder="Email">
                        <div class="right"></div>
                    </div>
                    <div class="box">
                        <div class="left"></div>
                        <input type="password" name="password" id="password" placeholder="Mot de passe">
                        <div class="right"></div>
                    </div>
                    <div class="box">
                        <div class="left"></div>
                        <input type="password" name="passwordRep" id="passwordRep" placeholder="Confirmez le mot de passe">
                        <div class="right"></div>
                    </div>
                </div>
                <div class="buttons-container">
                    <button class="btn btn-primary" type="submit">
                        <div class="left"></div>
                        Inscription
                        <div class="right"></div>
                    </button>
                    <button class="btn btn-primary" onclick="window.location.href='/account/login'">
                        <div class="left"></div>
                        Déjà un compte?
                        <div class="right"></div>
                    </button>
                </div>
            </form>
        </div>
    </section>
</main>