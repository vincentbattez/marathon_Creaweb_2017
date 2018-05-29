
<form method="post" action="/ajouterHistoire" enctype="multipart/form-data">

    <fieldset>
        <legend>Ajouter une histoire</legend>




        <label for="titre">Titre</label>
        <input type="text" name="titre" id="titre" /><br/>

        <label for="description">Description</label>
        <textarea name="description" id="description"></textarea><br/>

        <legend>Ajouter une premiere photo</legend>

        <label for="titrephoto">Titre</label>
        <input type="text" name="titrephoto" id="titrephoto" /><br/>

        <label for="descriptionphoto">Description</label>
        <textarea name="descriptionphoto" id="descriptionphoto"></textarea><br/>



        <input  class="input" type="file" id="image" name="image"  />

      <!--  <button type="button">Ajouter une image !</button>
        <div id="welcomeDiv"  style="display:none;" class="answer_list" >

            //ici ce qui est a show on click



        //au dessus

        </div>
        <input type="button" name="answer" value="Ajouter Image" onclick="showDiv()" />

        <script>
            function showDiv() {
                document.getElementById('welcomeDiv').style.display = "block";
            }
        </script>
-->


    </fieldset>
    <input type="submit" value="Envoyer" />
</form>

<!--

<input  class="input" type="file" id="sav_pj" name="sav_pj[]"  /> -->