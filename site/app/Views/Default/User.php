 <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 header">


                <div class="header-photo" style="background-image: url(../img/profilTest.jpg);"></div>
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


<!--</header>-->
