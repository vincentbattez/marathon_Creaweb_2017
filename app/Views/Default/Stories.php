<header>
    <?php

    // EN PLUS SEULEMENT QUAND ON EST CONNECTER
    //if(\Nova\Support\Facades\Auth::check()) {
    if(\Nova\Support\Facades\Auth::check()) {

        ?>
        <p>connecté</p>
        <?php
    }
    else {
        //ON EST PAS CONNECTER
        ?>
        <div class="content">
            <h1>Ecrivez votre histoire</h1>
            <div class="separator"></div>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est ipsam vero totam soluta, rerum error ratione maxime iusto esse quasi enim deleniti dolor exercitationem consequuntur, tenetur. Maiores delectus earum consequatur?</p>
            <?php
            if(!\Nova\Support\Facades\Auth::check()){
                echo"<div class='btn-header'>
                        <a href='".PATH."/register'><button class='btn'>S'inscrire</button></a>
                    </div>";}
            ?>
        </div>
        <div class="overlay">
            <div class="background"></div>
        </div>

        <?php
    }
    ?>
</header>

<?php

echo "<section class='container' id='histoire'>";
    foreach ($histoires as $h){
    $aut = $h->auteur;
    echo "<article>";
        echo "<a href='afficheStory/$h->id' class='col-xs-6 col-sm-6 col-md-6 col-lg-6 histoire-background' style='background-image: url(".PATH.'assets/images/uploads/histoires/h'.$h->id.'/1.jpg'.");;'>";
            echo "<div class='overlay'></div>";
        echo "</a>";
        echo "<div class='col-xs-6 col-sm-6 col-md-6 col-lg-6 description'>";
            echo "<h2 class='histoire-title'>$h->titre";
      
                echo "<h4>écrit par <a class='auteur' href='#'>$aut->realname</a></h4>";
            echo "</h2>";
            echo "<div class='separator'></div>";
            echo "<p class='histoire-description'>
                $h->texte
            </p>";
            echo "<a href='/login' class='histoire-btn'>";
                echo "<button class='btn btn-primary'>Lire l'histoire</button>";
            echo "</a>";
        echo "</div>";
    echo "</article>";
}     
echo "</section>";