<?php
Assets::css([
  template_url('css/style.css', 'Default'),
    template_url('css/style-membres.css', 'Default'),
]);
?>

<header>
      <div class="content">
          <h1>Nos Narrateurs</h1>
          <div class="separator"></div>
          <p>Nous vous avons selectionnées les meilleurs narateurs <br> afin de ne vous laisser que des choix d'exception.<br>
           Soyer berçer comme dans votre enfance.
          </p>
        </div>
        <div class="overlay">
        <div class="background background-membre"></div>
    </div>
</header>

<div class='container membre'>
    <div class='row'>

        <?php foreach ($usr as $u){

            echo "

    <a href='user/".$u->id."' class='col-xs-12 col-sm-12 col-md-6 col-lg-4 membre-parti'>
      <div class='membre-parti-div'>
        <div class='membre-photo' style='background-image: url(".PATH."assets/images/uploads/avatar/".$u->id.".jpg);'></div>
        <h2>
          $u->realname
          <span class='membre-txt-blue'>| ".count($u->histoires)." histoires</span>
          <span class='membre-next menbre-transition'>></span>
        </h2>
      </div>
    </a>
  ";
        }
        ?>
    </div>
</div>
