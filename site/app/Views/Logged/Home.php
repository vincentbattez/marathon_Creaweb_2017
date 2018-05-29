
<!--...................................................................HEADER-->

<header>

        <div class="content">
            <h1>Ecrivez votre histoire</h1>
            <div class="separator"></div>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est ipsam vero totam soluta, rerum error ratione maxime iusto esse quasi enim deleniti dolor exercitationem consequuntur, tenetur. Maiores delectus earum consequatur?</p>
            <div class='btn-header'>
                <a href='http://localhost:8080/pageAjout'><button class='btn'>écrire</button></a>
            </div>
        </div>
        <div class="overlay">
            <div class="background background-home"></div>
        </div>
</header>

<!--...................................................................TAGS-->

<div id="tags">
    <div class="wrapper">
        <div class="slide">
            <div class="content">
                <div class="item"><a href=""><span class="blue">#</span>Comique</a></div>
                <div class="item"><a href=""><span class="blue">#</span>Réel</a></div>
                <div class="item"><a href=""><span class="blue">#</span>Police</a></div>
                <div class="item"><a href=""><span class="blue">#</span>Enfance</a></div>
                <div class="item"><a href=""><span class="blue">#</span>Geek</a></div>
                <div class="item"><a href=""><span class="blue">#</span>Santé</a></div>
                <div class="item"><a href=""><span class="blue">#</span>Boulot</a></div>
                <div class="item"><a href=""><span class="blue">#</span>Voyage</a></div>
                <div class="item"><a href=""><span class="blue">#</span>FanFiction</a></div>
                <div class="item"><a href=""><span class="blue">#</span>Fantastique</a></div>
                <div class="item"><a href=""><span class="blue">#</span>WTF</a></div>
                <div class="item"><a href=""><span class="blue">#</span>Amour</a></div>
                <div class="item"><a href=""><span class="blue">#</span>Argent</a></div>
                <div class="item"><a href=""><span class="blue">#</span>Malchance</a></div>
                <div class="item"><a href=""><span class="blue">#</span>Lorem</a></div>
                <div class="item"><a href=""><span class="blue">#</span>Ipsum</a></div>
                <div class="item"><a href=""><span class="blue">#</span>Didier</a></div>
            </div>
        </div>
    </div>
</div>


<!--...................................................................LAST STORY-->

<div id="last-stories">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Nos meilleures histoires</h2></div>
            <div class="col-md-12">
                <a href="">
                    <article class="col-md-3">
                        <div class="wrapper">
                            <div class="info">
                                <div class="titre">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vitae, sunt.</div>
                            </div>
                            <div class="author"><small>écrit par </small>Patryk Mierzala</div>
                            <div class="bg" style="background:url(img/header-bg.jpg);background-size: cover;"></div>
                            <div class="overlay"></div>
                        </div>

                    </article>
                </a>
                <a href="">
                    <article class="col-md-3">
                        <div class="wrapper">
                            <div class="info">
                                <div class="titre">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vitae, sunt.</div>
                            </div>
                            <div class="author"><small>écrit par </small>Patryk Mierzala</div>
                            <div class="bg" style="background:url(img/header-bg.jpg);background-size: cover;"></div>
                            <div class="overlay"></div>
                        </div>

                    </article>
                </a>
                <a href="">
                    <article class="col-md-3">
                        <div class="wrapper">
                            <div class="info">
                                <div class="titre">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vitae, sunt.</div>
                            </div>
                            <div class="author"><small>écrit par </small>Patryk Mierzala</div>
                            <div class="bg" style="background:url(img/header-bg.jpg);background-size: cover;"></div>
                            <div class="overlay"></div>
                        </div>

                    </article>
                </a>
                <a href="">
                    <article class="col-md-3">
                        <div class="wrapper">
                            <div class="info">
                                <div class="titre">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vitae, sunt.</div>
                            </div>
                            <div class="author"><small>écrit par </small>Patryk Mierzala</div>
                            <div class="bg" style="background:url(img/header-bg.jpg);background-size: cover;"></div>
                            <div class="overlay"></div>
                        </div>

                    </article>
                </a>
            </div>
        </div>
    </div>
</div>

<!--...................................................................HISTOIRE-->



<section class='container' id='histoire'>";
<?php
    foreach ($histoires as $h){
    $aut = $h->auteur;

    echo "<article>";
    echo "<a href='afficheStory/$h->id' class='col-xs-6 col-sm-6 col-md-6 col-lg-6 histoire-background' style='background-image: url(".PATH.'assets/images/uploads/histoires/h'.$h->id.'/1.jpg'.");'>";
    echo "<div class='overlay'></div>";
    echo "</a>";
    echo "<div class='col-xs-6 col-sm-6 col-md-6 col-lg-6 description'>";
    echo "<h2 class='histoire-title'>$h->titre";

    echo "<h4>écrit par <a class='auteur' href='user/$aut->id'>$aut->realname</a></h4>";
    echo "</h2>";
    echo "<div class='separator'></div>";
    echo "<p class='histoire-description'>
                $h->texte
            </p>";?>
    <a href="<?php echo 'afficheStory/'.$h->id ?>" class='histoire-btn'>
        <?php
    echo "<span class='histoire-description hidden-xs hidden-sm'>$h->texte</span>";
    echo "<a href='afficheStory/$h->id' class='histoire-btn'>";
    echo "<button class='btn btn-primary'>Lire l'histoire</button>";
    echo "</a>";
    echo "</div>";
    echo "</article>";
}
echo "</section>";

?>
