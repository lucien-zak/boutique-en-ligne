    <main>
        <section id="home" class="home">
            <div class="container">
                <div class="brand-infos">
                    <div class="sub-title">Bienvenue sur</div>
                    <div class="title">
                        Vinyl <span>Génération</span>
                    </div>
                    <p>Vinyl Génération est spécialisé dans le domaine de la vente de Vinyl en tout genres, et pour tout les goûts musicaux.</p>
                    <div class="buttons-container">
                        <button class="btn btn-primary" id="about-btn">
                            <div class="left"></div>
                            En savoir plus
                            <div class="right"></div>
                        </button>
                        <button class="btn btn-primary" id="products-btn">
                            <div class="left"></div>
                            Voir nos produits
                            <div class="right"></div>
                        </button>
                    </div>
                </div>
                <div class="home-illustration">
                    <img class="brand-logo" src="./assets/img/icons/logo-enterprise-0.png" alt="">
                    <img class="brand-sub-logo" src="./assets/img/icons/vinyl-rotation.png" alt="">
                </div>
            </div>
        </section>

        <section id="about" class="about container">
            <img class="wave" src="../assets/img/utils/wave-3.svg" id="partners">
            <div class="section-category">
                <div class="section-title">
                    Qui sommes <span>nous ?</span>
                </div>
                <div class="content">
                    <div class="left">
                        <iframe width="512" height="315" style="border: none;"
                        src="https://www.youtube.com/embed/k4jkKOubYuQ">
                        </iframe>
                    </div>
                    <div class="right">
                        <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Tristique senectus et netus et malesuada. Sed egestas egestas fringilla phasellus faucibus scelerisque eleifend. <br><br>Aliquam ultrices sagittis orci a scelerisque purus. Aliquam malesuada bibendum arcu vitae elementum. A cras semper auctor neque vitae tempus. Neque gravida in fermentum et. Ultricies integer quis auctor elit sed vulputate mi sit amet.
                        </p>
                        <div class="buttons-container">
                            <button id="more-btn" class="btn btn-primary">
                                <div class="left"></div>
                                En savoir plus
                                <div class="right"></div>
                            </button>
                            <button id="contact-btn" class="btn btn-primary">
                                <div class="left"></div>
                                Nous contacter
                                <div class="right"></div>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content"></div>
            <img style="transform: translateY(5px)" class="wave" src="../assets/img/utils/wave-4.svg" id="partners">
        </section>
        <section class="topSeller vitrine">
            <div class="section-category">
                <div class="section-title">
                    Nos meilleurs <span>ventes</span>
                </div>
            </div>
            <div class="content">
                <?php foreach($params['moreSold'] as $product)
                { ?>
         
                <div class="product">
                    <div class="left"></div>
                    <div class="ctn">
                        <div class="top">
                            <img src="../assets/img/products/<?= $product->slug."-".$product->id ?>.png" alt="Image product">
                        </div>
                        <div class="middle">
                            <h2><?=$product->name?></h2>
                            <h3><?=$product->artist?></h3>
                            <div class="box">
                                <div class="rateyo2" id= "rating"
                                data-rateyo-rating="<?=$product->avg['stars']?>"
                                data-rateyo-num-stars="5"
                                data-rateyo-score="3">
                                </div>
                            </div>
                        </div>
                        <div class="bottom">
                        <div class="buttons-container">
                                <button class="btn btn-primary" onclick="window.location.href='/product/<?= $product->slug .'-'. $product->id ?>'">
                                    <div class="left"></div>
                                    Voir le produit
                                    <div class="right"></div>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="right"></div>
                </div>
                <?php } ?>
            </div> 
        </section>
        <section class="topNewness container vitrine">
            <img class="wave" src="../assets/img/utils/wave-3.svg" id="partners">
            <div class="section-category">
                <div class="section-title">
                    Les nouveaux <span>arrivages</span>
                </div>
            </div>
            <div class="content">
                <?php foreach($params['news'] as $new){?>
            
                <div class="product">
                    <div class="left"></div>
                    <div class="ctn">
                        <div class="top">
                            <img src="../assets/img/products/<?= $new->slug."-".$new->id ?>" alt="Image product">
                        </div>
                        <div class="middle">
                            <h2><?=$new->name?></h2>
                            <h3><?=$new->artist?></h3>  
                            <div class="box">
                                <div class="rateyo2" id= "rating"
                                data-rateyo-rating="<?=$new->avg['stars']?>"
                                data-rateyo-num-stars="5"
                                data-rateyo-score="3">
                                </div>
                            </div>
                        </div>
                        <div class="bottom">
                            <div class="buttons-container">
                                <button class="btn btn-primary products-btn">
                                    <div class="left"></div>
                                    Voir le produit
                                    <div class="right"></div>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="right"></div>
                </div>
                <?php } ?>
            </div>
        </section>
    </main>

<script>
    $(function () {
        $(".rateyo").rateYo({
            ratedFill: "#FC7E1F",
            starWidth: "25px",
            starSvg: '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--! Font Awesome Pro 6.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M381.2 150.3L524.9 171.5C536.8 173.2 546.8 181.6 550.6 193.1C554.4 204.7 551.3 217.3 542.7 225.9L438.5 328.1L463.1 474.7C465.1 486.7 460.2 498.9 450.2 506C440.3 513.1 427.2 514 416.5 508.3L288.1 439.8L159.8 508.3C149 514 135.9 513.1 126 506C116.1 498.9 111.1 486.7 113.2 474.7L137.8 328.1L33.58 225.9C24.97 217.3 21.91 204.7 25.69 193.1C29.46 181.6 39.43 173.2 51.42 171.5L195 150.3L259.4 17.97C264.7 6.954 275.9-.0391 288.1-.0391C300.4-.0391 311.6 6.954 316.9 17.97L381.2 150.3z"/></svg>',
            fullStar: true,
            }).on("rateyo.change", function (e, data) {
            var rating = data.rating;
            $(this).parent().find('.score').text('score :'+ $(this).attr('data-rateyo-score'));
            $(this).parent().find('.result').text('note :'+ rating);
            $(this).parent().find('input[name=rating]').val(rating); //add rating value to input field
        });
        $(".rateyo2").rateYo({
            ratedFill: "#FC7E1F",
            readOnly: true,
            starWidth: "25px",
            starSvg: '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--! Font Awesome Pro 6.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M381.2 150.3L524.9 171.5C536.8 173.2 546.8 181.6 550.6 193.1C554.4 204.7 551.3 217.3 542.7 225.9L438.5 328.1L463.1 474.7C465.1 486.7 460.2 498.9 450.2 506C440.3 513.1 427.2 514 416.5 508.3L288.1 439.8L159.8 508.3C149 514 135.9 513.1 126 506C116.1 498.9 111.1 486.7 113.2 474.7L137.8 328.1L33.58 225.9C24.97 217.3 21.91 204.7 25.69 193.1C29.46 181.6 39.43 173.2 51.42 171.5L195 150.3L259.4 17.97C264.7 6.954 275.9-.0391 288.1-.0391C300.4-.0391 311.6 6.954 316.9 17.97L381.2 150.3z"/></svg>',
        })
        $(".rateyo3").rateYo({
            ratedFill: "#FC7E1F",
            readOnly: true,
            starWidth: "17px",
            starSvg: '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--! Font Awesome Pro 6.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M381.2 150.3L524.9 171.5C536.8 173.2 546.8 181.6 550.6 193.1C554.4 204.7 551.3 217.3 542.7 225.9L438.5 328.1L463.1 474.7C465.1 486.7 460.2 498.9 450.2 506C440.3 513.1 427.2 514 416.5 508.3L288.1 439.8L159.8 508.3C149 514 135.9 513.1 126 506C116.1 498.9 111.1 486.7 113.2 474.7L137.8 328.1L33.58 225.9C24.97 217.3 21.91 204.7 25.69 193.1C29.46 181.6 39.43 173.2 51.42 171.5L195 150.3L259.4 17.97C264.7 6.954 275.9-.0391 288.1-.0391C300.4-.0391 311.6 6.954 316.9 17.97L381.2 150.3z"/></svg>',
        }) 
    });
</script>