$(document).ready(function() {



    $('.addImg').on('click', function(event) {
        event.preventDefault();
        var nbAddImg = 1;
        $('article.ajoutImg').each(function(){
            nbAddImg ++;
        });
        var addImg = '<article class="ajout ajoutImg"><div class="row"><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><h2>Image n°'+nbAddImg+'</h2><input type="file" id="imgHistoire'+nbAddImg+'" name="imgHistoire'+nbAddImg+'"><textarea type="text" id="descriptionIMGHistoire'+nbAddImg+'" placeholder="Partie '+nbAddImg+' de votre texte" name="descriptionIMGHistoire'+nbAddImg+'"></textarea><div class="divArrow"><div class="arrow"><i class="fa fa-arrow-up" id="aUp'+nbAddImg+'" aria-hidden="true"></i><br><i class="fa fa-arrow-down" id="aDown'+nbAddImg+'" aria-hidden="true"></i></div></div></div></div></article><hr>';
        if (nbAddImg <= 12) {
            $('.nbImg').html(nbAddImg);
            $('#creer form').append(addImg);
        }else {
            $('.divAddBtn').css('color', 'red');
            $('.txtVariable').html('Vous ne pouvez plus ajouter d\'images');
            $('.addImg').css('background-color', 'red');

        }
    });


    $('body').on('click', '.fa', function(event) {
        event.preventDefault();
        var idArrow = ($(this).attr('id'));
        $('#creer form').append(addImg);
    });

});
