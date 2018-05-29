

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 header">
                <div class="header-photo"></div>
                <div class="header-nom"><?=$user->realname ?></div>
                <div class="overlay">
                    <div class="background background-user"></div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 info">
                <ul class="container-fluid">
                    <li class="col-md-4"><span><?=count($stories)?></span>&nbsp;Histoires</li>
                    <li class="col-md-4"><span><?=$likes?></span>&nbsp;Likes reçu</li>
                    <li class="col-md-4"><span><?=$nbCom?></span>&nbsp;Commentaires reçu</li>
                </ul>
            </div>
        </div>
    </div>
    <br/>
    <?php

    echo "<section class='container' id='histoire'>";
    foreach ($histoires as $h){
        $aut = $h->auteur;
        if($user->id == $aut->id) {
            echo "<article>";
            echo "<a href='afficheStory/$h->id' class='col-xs-6 col-sm-6 col-md-6 col-lg-6 histoire-background' style='background-image: url(" . PATH . 'assets/images/uploads/histoires/h' . $h->id . '/1.jpg' . ");'>";
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
            echo "<a href='afficheStory/$h->id' class='histoire-btn'>";
            echo "<button class='btn btn-primary'>Lire l'histoire</button>";
            echo "</a>";
            echo "</div>";
            echo "</article>";
        }
    }
    echo "</section>";

    ?>