


<?php
echo "<section class='container' id='histoire'>";

foreach ($histoires as $h){
    //$aut = $h->auteur;
    echo "<article>";
    echo "<a href='#' class='col-xs-6 col-sm-6 col-md-6 col-lg-6 histoire-background' style='background-image: url(".PATH.'assets/images/uploads/'.$h->id.'/1.jpg'.");'>";
    echo "<div class='overlay'></div>";
    echo "</a>";
    echo "<div class='col-xs-6 col-sm-6 col-md-6 col-lg-6 description'>";
    echo "<h2 class='histoire-title'>$h->titre";

    //echo "<h4>écrit par <a class='auteur' href='#'>$aut->realname</a></h4>";
    echo "</h2>";
    echo "<div class='separator'></div>";
    echo "<p class='histoire-description'>
                $h->texte
            </p>";
    echo "<a href='#' class='histoire-btn'>";
    echo "<button class='btn btn-primary'>Lire l'histoire</button>";
    echo "</a>";
    echo "</div>";
    echo "</article>";
}
echo "</section>";