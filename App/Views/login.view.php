<?= isset($params['message'])?$params['message']:'';
?>

<body>
    <main>
        <section class="home">
            <div class="container">
                <h3 class="title">CONNEXION À VOTRE COMPTE</h3>
                <form id="form-login" action="/account/login" method="POST">
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

                    <div class="options-ctn">
                        <div class="remember-box">
                            <input type="checkbox" name="remember">
                            <label for="remember"> Se souvenir de moi</label>
                        </div>
                        <h4 onclick="popupFrame('popup')">Mot de passe oublié ?</h4>
                    </div>
                    <div class="buttons-container">
                        <button class="btn btn-primary" type="submit">
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
                </form>
            </div>
        </section>
        <div id="popup">
            <div class="container box">
                <div class="left"></div>
                <div class="top">
                    <h3>Mot de passe oublié ?</h3>
                    <h2 id="closeBtn" onclick="closeBtn('popup')">X</h2>
                </div>
                <div class="content">
                    <div class="entry-container">
                        <div class="box">
                            <div class="left"></div>
                            <input type="email" name="email" placeholder="Email">
                            <div class="right"></div>
                        </div>
                    </div>
                    <div class="buttons-container">
                        <button class="btn btn-primary" type="submit">
                            <div class="left"></div>
                            Faire la demande
                            <div class="right"></div>
                        </button>
                    </div>
                </div>
                <div class="right"></div>
            </div>
        </div>
    </main>
</body>