<?php

$cpt=1;
echo
'
<!-- HEADER -->
<header id="story-header">
    <div class="content">
        <h1>'.$histoire->titre.'</h1>
        <div class="separator"></div>
    </div>
    <div class="overlay">
        <div class="background" style="background-image: url(http://localhost:8080/assets/img/histoire/story1/story1-'.$cpt.'.jpg);"></div>
    </div>
</header>
<section class="container" id="story">
    <!-- sans img -->
    <div class="parties partie-full">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <p>
                '.$histoire->texte.'
               
            </p>
        </div>
    </div>
    
<section class="container" id="story">
';
$cpt=0;$cptL=0;
foreach ($likes as $like) {
    if ($like->idHistoire == $histoire->id) {
        $cptL++;
    }

}
foreach ($histoires as $h) {
    $cpt += 1;


}


foreach ($histoires as $h){

    //$aut = $h->auteur;
    echo '<article>
        <!-- img -->
        
        <div href="#" class="col-xs-12 col-sm-12 col-md-6 col-lg-6 story-background" style="background-image: url(http://localhost:8080/assets/img/histoire/story1/story1-'.$cpt.'.jpg);">
            <div class="overlay">
            </div>
        </div>
        <!-- txt -->
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 description">
            <p class="story-description">

        </div>
    </article>';
    $cpt+=1;
}

?>
<div>
    <p><a href="<?php echo DIR.'supprimerHistoire/'.$histoire->id?>" class="btn btn-primary" role="button">Supprimer cette histoire</a>
    </p>
</div></br>
<?php



//enctype="multipart/form-data"


?>

    <p class="likeEtComment"> <a href="<?php echo DIR.'com/ajouterLike/'.$histoire->id?>"><i class="fa fa-heart" aria-hidden="true"></i></a><span class="nbLike">(<?php echo $cptL?>)</span></p>
</section>

<?php
$cptC=0;
$cptBR=0;
foreach ($commentaires as $com) {
    if ($com->idHistoire == $histoire->id) {
        $cptC++;
    }

}


?>

<section class="container" id="commentaire">
    <hr/>
    <h2>Commentaires <span class="nbCom">(<?php echo $cptC?>)</span></h2>
    <form action="<?php echo DIR.'com/CommentaireAjoute/'.$histoire->id?>" method="post">
        <div class="form-group">
            <label for="commentaireFrom">Commentaire</label>
            <textarea id="commentaireFrom" name="commentaire"></textarea>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="commenter">
        </div>
    </form>
    <!-- Comment 1 -->



    <div class="row">
        <?php foreach ($commentaires as $com) {

            if ($com->idHistoire == $histoire->id) {
                if($cptBR%2==0){
                    ?> </div>
                        <div class="row">
                    <?php
                }$cptBR++;
                ?>

                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 commentDiv">
                    <h3 class="auteurComment"><a href="#"><?php echo $com->auteur->username ?></a>
                        <small class="date"> Le <?php echo $com->datePost; ?></small>
                    </h3>
                    <p class="commentaire-content">
                        <?php echo $com->texte; ?>
                    </p>


                <div class="btn-group">

                    <div>
                        <p><a href="<?php echo DIR . 'com/SuppressionCommentaire/' . $com->id; ?>" class="btn btn-primary"
                              role="button">X</span></a>
                        </p>
                    </div>
                    <div>
                        <p><a href="<?php echo DIR . 'com/EditionCommentaire/' . $com->id; ?>" class="btn btn-primary"
                              role="button">Modifier</span></a>
                        </p>
                    </div>
                </div>
                </div>

            <?php  }


        }?>
    </div>

</section>