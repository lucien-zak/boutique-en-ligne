
<body>
        <form method="post">
            <div id="errors"></div><!--Contiendra les messages d'erreur de paiement-->
            <input type="text" id="cardholder-name" placeholder="Titulaire de la carte">
            <div id="card-elements"></div><!--Contiendra le formulaire de saisie des informations de carte-->
            <div id="card-errors" role="alert"></div><!--Contiendra les erreurs relatives à la carte-->
            <button id="card-button" type="button" data-secret="<?= $params['data']['client_secret'] ?>">Procéder au paiement</button>
        </form>

        <script src="https://js.stripe.com/v3/"></script>
        <script src="./assets/script/stripe.js"></script>
    </body>
