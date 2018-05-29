<?php
/**
 * Created by PhpStorm.
 * User: thomas.duhaut
 * Date: 14/12/16
 * Time: 10:27
 */
?>
<form method="post" action="<?php echo DIR.'com/CommentaireEdite/'.$com->id;?>">
<h2>Modifier votre commentaire</h2>


<label for="texte">Modifier</label><br/>
<textarea name="texte" id="texte" placeholder="<?php echo $com->texte ?>" ></textarea>


<?php //if (!empty($com->texte)) {
//    echo $com->texte;
//} ?>


</textarea>
<label for='texte'>
    <input type="submit" value="Envoyer"/>
    </form>
<div>
    <p><a href="<?php echo DIR.'afficheStory/'.$com->auteur->id ?>" class="btn btn-primary" role="button">Annuler</a>
    </p>
</div>