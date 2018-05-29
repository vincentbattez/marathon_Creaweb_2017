$(document).ready(function() {

      var nbtest = $(".histoire-description").length;
      var limit = 140;

      for (var i = 0; i < nbtest; i++){
        var tmp = document.getElementsByClassName("histoire-description")[i];

        var description = $(tmp).html();
        var descriptionNb = $(tmp).html().length;

        if(descriptionNb > limit){
            description = description.substring(0,limit);
            description += "...";
            $(tmp).replaceWith(description);
        }
      }

});
