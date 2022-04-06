
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
                <h3>AJOUT D'UNE CARTE BANCAIRE</h3>
                <form action="/account/payements/add" method="POST">
                    <div class="entry-container">
                        <div class="box">
                            <div class="left"></div>
                            <input type="text" name="fullname" placeholder="Nom complet">
                            <div class="right"></div>
                        </div>
                        <div class="box">
                            <div class="left"></div>
                            <input type="text" name="number" placeholder="Numéro de carte">
                            <div class="right"></div>
                        </div>
                        <div class="container">
                            <div class="box">
                                <div class="left"></div>
                                <select name="expiration_month" >
                                <?php
                                for($i=1; $i<=12; $i++)
                                {
                                    if($i<10){
                                        echo "<option value='$i'>0$i</option>";
                                    }
                                    else{
                                        echo "<option value='$i'>$i</option>";
                                    }
                                }
                                ?>
                                </select>
                                <div class="right"></div>
                            </div>
                            <div class="box">
                                <div class="left"></div>
                                <select name="expiration_year" >
                                    <?php
                                    $currentmonth = date("Y");
                                    for($i=$currentmonth; $i<$currentmonth+10; $i++)
                                    {
                                        echo "<option value='$i'>$i</option>";
                                    }
                                    ?>
                                </select>
                                <div class="right"></div>
                            </div>
                        </div>
                        <div class="box">
                            <div class="left"></div>
                            <input type="number" name="cvv" placeholder="CVV">
                            <div class="right"></div>
                        </div>
                    </div>
                    <div class="buttons-container">
                        <button class="button" name="submit" type="submit">Ajouter la carte</button>
                    </div>
                </form>
            </div>
        </section>
    </main>