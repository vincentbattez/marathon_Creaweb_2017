<!---_____________________- HEADER -_____________________-->
<header>
    <div class="content">
        <h1>Votre histoire</h1>
        <div class="separator"></div>
        <p>Partager votre histoire avec nous</p>
    </div>
    <div class="overlay">
        <div class="background" style="background-image: url('img/creer/header-bg.jpg');"></div>
    </div>
</header>


<!---_____________________- CREER -_____________________-->
<section class="container" id="creer">
    <!---_______- ajoutHistoire -_______-->
    <article class="ajout ajoutHistoire">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <h2>Votre histoire</h2>


                <form action="<?=PATH?>histoireRegister" method="post" enctype="multipart/form-data">

                    <input type="text" id="titreHistoire" placeholder="Titre de l'histoire" name="titreHistoire">
                    <textarea type="text" id="descriptionHistoire" placeholder="Description de votre histoire" name="descriptionHistoire"></textarea>
                    <div class="divAdd">
                        <div class="divAddBtn"><span class="txtVariable">Ajouter une image</span><button class="btn btn-principal addImg">+</button>
                            <span class="nbImg">0</span>/12
                        </div>
                        <div class="envoyerHistoire">
                            <input type="submit" class="btn envoyerHistoire" value="Envoyer histoire"></input>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </article>
    <!---_______- ajoutIMG -_______-->
    <!-- ... -->
</section>