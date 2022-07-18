    <main>
        <section class="home">
        <?php if($params['nb'] < 1) { ?>
            <div class="container">
                <a class="box-add" href="/account/addresses/add">
                    <span class="box-icon fa-stack">
                        <i class="icon far fa-circle fa-stack-2x"></i>
                        <i class="icon fas fa-plus fa-stack-1x"></i>
                    </span>
                    <h3>AJOUTER UNE ADRESSE</h3>
                </a>
            </div>
        <?php } else { ?>
            <div class="container customer">
            <div class="container-top">
                <div class="box-top">
                    <h3>VOS ADRESSES</h3>
                    <?php if($params['nb'] < 2) { ?>
                    <a href="/account/addresses/add">
                        <i class="icon fas fa-plus"></i>
                    </a>
                    <?php } ?>
                </div>
                    <div class="entry-container entry-container-address">
                         <?php
                            foreach($params['data'] as $adress)
                            {
                            ?>
                            <form action="/account/adress/<?= $adress['type']?>" enctype="multipart/form-data" class="adress" method="POST">
                            <?php
                                echo '
                                <div class="box profil">
                                    <div class="left"></div>';
                                echo "<h3>$adress[type]</h3>";  
                                echo "<p>$adress[full_name]</p>";
                                echo "<p>$adress[adress]</p>";
                                if(isset($adress['additional_adress'])) {
                                    echo "<p>$adress[additional_adress]</p>";
                                }
                                echo "<p>$adress[postal_code] $adress[city]</p>";
                                echo '
                                <div class="buttons-container">
                                    <button class="button edit" type="submit">Modifier</button>
                                </div>
                                    <div class="right"></div>
                                </div>
                            </form>';
                            }
                        ?> 
                    </div>
            </div>
        <?php } ?>
        </section>
    </main>