<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title><?= $title .' - ' .Config::get('app.name', SITETITLE); ?></title>
<?php
echo isset($meta) ? $meta : ''; // Place to pass data / plugable hook zone

Assets::css([
    vendor_url('dist/css/bootstrap.min.css', 'twbs/bootstrap'),
    template_url('css/fontAwesome.css', 'Default'),
    template_url('css/style.css', 'Default'),
    template_url('css/style-pageperso.css', 'Default'),
]);

echo isset($css) ? $css : ''; // Place to pass data / plugable hook zone
?>
</head>
<body>

  <!--..........................................................-->
  <!--..........................................................-->
<nav>
    <div class="container">
        <div class="row">

        <div class="logo">
        <a href="<?=PATH.'/'?>">
            <img src="<?= PATH.'templates/default/assets/img/logo/logo-white.png';?>" />
        </a>
        </div>

        <div class="collapse">
            <ul class="menu">
                <li class="li-menu">
                    <a href="<?=PATH.'/'?>">Histoire</a>
                </li>
                <li class="li-menu">
                    <a href="<?=PATH.'/users'?>">Auteurs</a>
                </li>
                <?php
                    if(Auth::check()) {
                    ?>
                        <li class="li-menu" >
                            <a href="<?=PATH.'/moi'?>" > Mon Profile </a >
                        </li >
                    <?php
                    }
                ?>
                <li class="li-menu">
                  <?php
                  if(\Nova\Support\Facades\Auth::check()) {echo "<a href='".PATH."/logout'>Déconnexion</a>";}
                    ?>
                </li>

            </ul>
        </div>


        <?php
        //if(\Nova\Support\Facades\Auth::check()) {
        if(\Nova\Support\Facades\Auth::check()) {
            echo "Bonjour ". \Nova\Support\Facades\Auth::user()->username." ";

            echo "
              <ul class='nav-btn'>
                  <li>
                      <button id='search-btn' class='closed'><i class='fa fa-search' aria-hidden='true'></i></button>
                  </li>

                  <a href='http://localhost:8080/pageAjout'><li><button id='add-btn'><i class='fa fa-pencil' aria-hidden='true'></i></button></li></a>
              </ul>
            ";


        } else {
            //QUAND ON EST PAS CONNECTER
            ?>
              <ul class="nav-btn">
                  <li>
                      <button id="search-btn" class="closed"><i class="fa fa-search" aria-hidden="true"></i></button>
                  </li>
                  <li><button id="login-btn" onClick="openIndexModal()"><i class="fa fa-user-circle" aria-hidden="true"></i></button></li>
              </ul>
            <?php
           //echo "<a href='http://localhost:8080/login'>login</a>&nbsp;<a href='http://localhost:8080/register'>Nouveau ?</a>";
        }
        ?>
            </div>
        </div>
    </div>

</nav>
<div id="search-box">
    <div class="container">
        <div class="row">
            <form method="GET" action="mdr.php" id="search-form" class="search-bar" role="search">
                <input id="search-input" type="text" class="form-search" data-action="grow" placeholder="Search">
            </form>
        </div>
    </div>
</div>


<!--..........................................................-->
<!--..........................................................-->




<?php // Le rendu des vues est donné par la variable $content, A GARDER ABSOLUMENT !!!!;?>
    <?= $content; ?>

<br/><br/>

<!--..........................................................-->
<!--..........................................................-->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-xs-3 col-xs-offset-2 col-md-2 col-md-offset-4">
              <div class="logo-iut">
                  <a href="index.html"><img src="<?= PATH.'templates/default/assets/img/logo/logo-iut-white.png';?>" /></a>
              </div>
            </div>
            <h3 class="col-xs-5 col-md-3">
              Maraton du WEB 2017 <br>
              DUT2 MMI & DUT2 INFO.
            </h3>
        </div>
    </div>
</footer>
<div id="overlay"></div>



<!--.....................................................................MODAL-->
<div id="modal">
    <div class="modal-holder">
      <div class="col-md-6 login">
          <div class="modal-content">
            <h2>Connexion</h2>
            <div class="separator2"></div>
              <div class="form-holder">
                  <form method='post' role="form" action="<?php echo DIR.'verifCompte'?>">

                      <div class="form-group">
                          <label for="username">Nom d'utilisateur</label>
                          <p><input type="text" name="username" id="username" class="form-control input-lg col-xs-12 col-sm-12 col-md-12" placeholder="<?= __d('system', 'Username'); ?>"><br><br></p>
                      </div>
                      <div class="form-group">
                          <label for="username">Mot de passe</label>
                          <p><input type="password" name="password" id="password" class="form-control input-lg col-xs-12 col-sm-12 col-md-12" placeholder="<?= __d('system', 'Password'); ?>"><br><br></p>
                      </div>
                      <div class="form-group" style="margin-top: 20px;">
                          <p><input name="remember" type="checkbox"><label for="remember">Se souvenir de moi</label></p>
                      </div>

                      <div class="btn-group" style="margin-top: 22px;">
                              <input type="submit" name="submit" class="btn btn-green" value="Se Connecter">
                      </div>




                  </form>
              </div>
          </div>
      </div>

        <div class="col-md-6 inscription">
            <div class="modal-content">
                <h2>Inscription</h2>
                <div class="separator2"></div>
                <div class="form-holder">
                    <form method='post' role="form" action="<?php echo DIR.'inscription'?>">

                        <div class="form-group">
                            <label for="realname">Nom et Prénom :</label>
                            <p><input type="text" name="realname" id="realname" class="form-control input-lg col-xs-12 col-sm-12 col-md-12" placeholder="<?= __d('users', 'Name and Surname'); ?>"><br><br></p>
                        </div>
                        <div class="form-group">
                            <label for="realname">Nom d'utilisateur :</label>
                            <p><input type="text" name="username" id="username" class="form-control input-lg col-xs-12 col-sm-12 col-md-12" placeholder="<?= __d('users', 'Username'); ?>"><br><br></p>
                        </div>
                        <div class="form-group">
                            <label for="realname">Mot de passe :</label>
                            <p><input type="password" name="password" id="password" class="form-control input-lg col-xs-12 col-sm-12 col-md-12" placeholder="<?= __d('users', 'Password'); ?>"><br><br></p>
                        </div>
                        <div class="form-group">
                            <label for="realname">Confirmez votre mot de passe :</label>
                            <p><input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-lg col-xs-12 col-sm-12 col-md-12" placeholder="<?= __d('users', 'Password confirmation'); ?>"><br><br></p>
                        </div>
                        <div class="form-group">
                            <label for="realname">Adresse email :</label>
                            <p><input type="text" name="email" id="email" class="form-control input-lg col-xs-12 col-sm-12 col-md-12" placeholder="<?= __d('users', 'E-Mail'); ?>"><br><br></p>
                        </div>

                        <div class="btn-group" style="margin-top: 22px;">
                            <input type="submit" name="submit" class="btn btn-blue" value="S'inscrire">
                        </div>




                    </form>
                </div>
            </div>
            <div class="bg-overlay">
                <div class="background" style="background-image:url(<?= PATH.'templates/default/assets/img/header/indexModal-bg.jpg';?>);"></div>
            </div>
        </div>
        <div class="col-md-12 message" style="display:none;">
          <?php echo Session::getMessages();?>
          Helloooo
          <a href="#" class="close-error" title="close">×</a>
        </div>
    </div>
    <div class="modal-overlay"></div>
</div>
<!--.....................................................................MODAL-->


<?php
Assets::js([
    template_url('js/jquery-3.1.1.min.js', 'Default'),
    template_url('js/main-histoire.js', 'Default'),
    template_url('js/main-creer.js', 'Default'),
    vendor_url('dist/js/bootstrap.min.js', 'twbs/bootstrap'),

    template_url('js/main-histoire.js', 'Default'),


    template_url('js/jquery.tickerNews.min.js', 'Default'),
    template_url('js/main.js', 'Default'),
]);


echo isset($js) ? $js : ''; // Place to pass data / plugable hook zone
echo isset($footer) ? $footer : ''; // Place to pass data / plugable hook zone
?>

<!-- DO NOT DELETE! - Forensics Profiler -->

</body>
</html>
