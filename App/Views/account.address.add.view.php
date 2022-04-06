
<?= isset($params['message'])?$params['message']:''; ?>

<!-- <form action="/account/profil" method="POST">
    <input type="text" name="firstname" >
    <input type="text" name="name" >
    <input type="text" name="email" >
    <input type="password" name="password" >  
    <input type="password" name="passwordRep" >    
    <input type="text" name="adress" >
    <input type="submit">
</form>
<a href="/logout">deco</a> -->

    <main>
        <section class="home">
            <div class="container">
                <h3>AJOUT D'UNE ADRESSE</h3>
                <form action="/account/addresses/add" method="POST">
                    <div class="entry-container">
                        <div class="box">
                            <div class="left"></div>
                            <input type="text" name="type" placeholder="Nom de l'adresse">
                            <div class="right"></div>
                        </div>
                        <div class="box">
                            <div class="left"></div>
                            <input type="text" name="full_name" placeholder="Nom Complet">
                            <div class="right"></div>
                        </div>
                        <div class="box">
                            <div class="left"></div>
                            <input type="text" name="adress" placeholder="Votre adresse">
                            <div class="right"></div>
                        </div>
                        <div class="box">
                            <div class="left"></div>
                            <input type="text" name="additional_adress" placeholder="Complément d'adresse">
                            <div class="right"></div>
                        </div>
                        <div class="box">
                            <div class="left"></div>
                            <input type="number" name="postal_code" placeholder="Code postal">
                            <div class="right"></div>
                        </div>
                        <div class="box">
                            <div class="left"></div>
                            <input type="text" name="city" placeholder="Ville">
                            <div class="right"></div>
                        </div>
                    </div>
                    <div class="buttons-container">
                        <button class="button" name="submit" type="submit">Ajouter l'adresse</button>
                    </div>
                </form>
            </div>
        </section>
    </main>
</body>
</html>