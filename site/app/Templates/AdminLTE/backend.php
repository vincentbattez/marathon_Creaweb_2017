<?php
/**
 * Backend Default Layout
 */

// Prepare the current User Info.
$user = Auth::user();

// Generate the Language Changer menu.
$langCode = Language::code();
$langName = Language::name();

$languages = Config::get('languages');

//
ob_start();

foreach ($languages as $code => $info) {
?>
<li class="header <?php if ($code == $langCode) { echo 'active'; } ?>">
    <a href='<?= site_url('language/' .$code); ?>' title='<?= $info['info']; ?>'><?= $info['name']; ?></a>
</li>
<?php
}

$langMenuLinks = ob_get_clean();
?>
<!DOCTYPE html>
<html lang="<?= $langCode; ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $title; ?> | <?= Config::get('app.name', SITETITLE); ?></title>
    <?= isset($meta) ? $meta : ''; // Place to pass data / plugable hook zone ?>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <?php
    Assets::css(array(
        // Bootstrap 3.3.5
        vendor_url('bootstrap/css/bootstrap.min.css', 'almasaeed2010/adminlte'),
        // Font Awesome
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css',
        // Ionicons
        'https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css',
        // Theme style
        vendor_url('dist/css/AdminLTE.min.css', 'almasaeed2010/adminlte'),
        // AdminLTE Skins
        vendor_url('dist/css/skins/_all-skins.min.css', 'almasaeed2010/adminlte'),
        // Select2
        vendor_url('plugins/select2/select2.min.css', 'almasaeed2010/adminlte'),
        // Custom CSS
        template_url('css/style.css', 'AdminLTE'),
    ));

    echo isset($css) ? $css : ''; // Place to pass data / plugable hook zone
?>

<style>
.pagination {
    margin: 0;
}

.pagination > li > a, .pagination > li > span {
  padding: 5px 10px;
}
</style>

<?php
    //Add Controller specific JS files.
    Assets::js(array(
        vendor_url('plugins/jQuery/jquery-2.2.3.min.js', 'almasaeed2010/adminlte'),
    ));

    ?>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body class="hold-transition skin-<?= Config::get('app.color_scheme', 'blue'); ?> sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="<?= site_url('admin/dashboard'); ?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">CP</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><?= __d('adminlte', 'Control Panel'); ?></span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav" style="margin-right: 10px;">
          <li class="dropdown language-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class='fa fa-language'></i> <?= $langName; ?>
            </a>
            <ul class="dropdown-menu">
              <?= $langMenuLinks; ?>
            </ul>
          </li>
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="<?= vendor_url('dist/img/avatar5.png', 'almasaeed2010/adminlte'); ?>" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"><?= $user->username; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="<?= vendor_url('dist/img/avatar5.png', 'almasaeed2010/adminlte'); ?>" class="img-circle" alt="User Image">

                <p>
                  <?= $user->realname; ?> - <?= $user->role->name; ?>
                  <?php $sinceDate = $user->created_at->formatLocalized(__d('adminlte', '%d %b %Y, %R')); ?>
                  <small><?= __d('adminlte', 'Member since {0}', $sinceDate); ?></small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?= site_url('admin/profile'); ?>" class="btn btn-default btn-flat"><?= __d('adminlte', 'Profile'); ?></a>
                </div>
                <div class="pull-right">
                  <a href="<?= site_url('logout'); ?>" class="btn btn-default btn-flat"><?= __d('adminlte', 'Sign out'); ?></a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- search form -->
        <form action="<?= site_url('admin/users/search'); ?>" method="POST" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="query" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>
        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header"><?= __d('adminlte', 'ADMINISTRATION'); ?></li>
            <li <?php if ($baseUri == 'admin/dashboard') { echo "class='active'"; } ?>>
                <a href="<?= site_url('admin/dashboard'); ?>"><i class="fa fa-dashboard"></i> <span><?= __d('adminlte', 'Dashboard'); ?></span></a>
            </li>

            <?php if ($user->hasRole('administrator')) { ?>

            <li <?php if ($baseUri == 'admin/settings') { echo "class='active'"; } ?>>
                <a href="<?= site_url('admin/settings'); ?>"><i class="fa fa-gears"></i> <span><?= __d('adminlte', 'Settings'); ?></span></a>
            </li>

            <li <?php if ($baseUri == 'admin/users') { echo "class='active'"; } ?>>
                <a href="<?= site_url('admin/users'); ?>"><i class="fa fa-users"></i> <span><?= __d('adminlte', 'Users'); ?></span></a>
            </li>
            <li <?php if ($baseUri == 'admin/roles') { echo "class='active'"; } ?>>
                <a href="<?= site_url('admin/roles'); ?>"><i class="fa fa-book"></i> <span><?= __d('adminlte', 'Roles'); ?></span></a>
            </li>
            <li <?php if ($baseUri == 'admin/files') { echo "class='active'"; } ?>>
                <a href="<?= site_url('admin/files'); ?>"><i class="fa fa-file"></i> <span><?= __d('adminlte', 'Files'); ?></span></a>
            </li>

            <?php } ?>
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <?= $content; ?>
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      <?php if(Config::get('app.debug')) { ?>
      <small><!-- DO NOT DELETE! - Profiler --></small>
      <?php } ?>
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; <?php echo date('Y'); ?> <a href="http://www.novaframework.com/" target="_blank"><b>Nova Framework <?= VERSION; ?></b></a> - </strong> All rights reserved.
  </footer>

</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->
<?php
Assets::js(array(
    // Bootstrap 3.3.5
    vendor_url('bootstrap/js/bootstrap.min.js', 'almasaeed2010/adminlte'),
    // AdminLTE App
    vendor_url('dist/js/app.min.js', 'almasaeed2010/adminlte'),
    // Select2
    vendor_url('plugins/select2/select2.full.min.js', 'almasaeed2010/adminlte')
));

echo isset($js) ? $js : ''; // Place to pass data / plugable hook zone

echo isset($footer) ? $footer : ''; // Place to pass data / plugable hook zone
?>

<script>
$(function () {
    //Initialize Select2 Elements
    $(".select2").select2();
});
</script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->

<!-- DO NOT DELETE! - Forensics Profiler -->

</body>
</html>
