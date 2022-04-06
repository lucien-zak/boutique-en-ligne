    <main>
        <section class="home">
            <div class="container">
                <h3>MODIFIER VOTRE ADRESSE</h3>
                <form action="/account/adress/update/<?=$params['data']->type?>" method="POST"> 
                    <div class="entry-container">
                        <div class="box">
                            <div class="left"></div>
                            <input type="text" name="type" value= <?=$params['data']->type?> >
                            <div class="right"></div>
                        </div>
                        <div class="box">
                            <div class="left"></div>
                            <input type="text" name="full_name" value= <?=$params['data']->full_name?>>
                            <div class="right"></div>
                        </div>
                        <div class="box">
                            <div class="left"></div>
                            <input type="text" name="adress" value="<?=$params['data']->adress?>">
                            <div class="right"></div>
                        </div>
                        <div class="box">
                            <div class="left"></div>
                            <input type="text" name="additional_adress" value= <?=$params['data']->additional_adress?>>
                            <div class="right"></div>
                        </div>
                        <div class="box">
                            <div class="left"></div>
                            <input type="number" name="postal_code" value= <?=$params['data']->postal_code?>>
                            <div class="right"></div>
                        </div>
                        <div class="box">
                            <div class="left"></div>
                            <input type="text" name="city" value= <?=$params['data']->city?>>
                            <div class="right"></div>
                        </div>
                    </div>
                    <div class="buttons-container">
                        <button class="button" name="submit" type="submit">Modifier l'adresse</button>
                    </div>
                </form>
            </div>
        </section>
    </main>
</body>
</html>