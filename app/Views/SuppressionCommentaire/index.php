<?php
/**
 * Created by PhpStorm.
 * User: thomas.duhaut
 * Date: 14/12/16
 * Time: 10:27
 */

?>
?>
<header>

</header>
<section class="container" id="commentaire">

<tr>

    <td>
        <?php
        if (isset($com->texte))
            echo $com->texte . PHP_EOL;
        ?>
    </td>
    <td>
        <?php
       // if (isset($com->datePost))
            echo $com->datePost . PHP_EOL;
        ?>
    </td>
<!--    <td>-->
<!--        --><?php
//        //if (isset($com->auteur))
//            echo $com->auteur->username . PHP_EOL;
//        ?>
<!--    </td>-->
</tr>

<div>
    <p><a href="<?php echo DIR.'com/CommentaireSupprime/'.$com->id; ?>" class="btn btn-primary" role="button">Supprimer</a>
    </p>
</div>

<div>
    <p><a href="<?php echo DIR.'afficheStory/'.$com->auteur->id ?>" class="btn btn-primary" role="button">Annuler</a>
    </p>
</div>
    </section>