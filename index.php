<?php
    define('_SSADM_',true);
    date_default_timezone_set('America/Lima');
    require_once("includes/funciones.php");
  require_once("includes/XSS.php");

    $redi1 = $_SERVER['QUERY_STRING'];
    if(empty($redi1)){ $redi1 = 'cpanel.php'; }
    $redi1 = preg_replace('/^ref=/','',$redi1);
    $redix = preg_replace('/^er=/','',$redi1);
    if($redix==1){ $redi1 = "?"; }
    include('logueo/login.php');
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="es" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="es" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="es">
    <!--<![endif]-->


    <head>
        <meta charset="utf-8" />
        <title>Identifíquese | WAS | WEB ADMIN SYSTEM</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/pages/css/login.min.css" rel="stylesheet" type="text/css" />
        <link rel="icon" type="image/png" href="favicon.png" />
 </head>
    <body class=" login"  onload="document.loginPage.username.focus();">
        <div class="logo">
            <a href="#">
                <img src="assets/pages/img/logo-big-2.png" width="200px" /> </a>
        </div>
        <div class="content">
            <form class="login-form" action="" name="loginPage" method="post">
                <h3 class="form-title font-green">INGRESAR</h3>
              <?php if(isset($_POST['send'])==1){ ?>
                    <div class="alert alert-danger">
                          <button class="close" data-close="alert"></button>
                          <span> <?php echo $error;?></span>
                      </div>
                    <?php } ?>
                <div class="form-group">
                    <label class="control-label">Usuario</label>
                    <input class="form-control form-control-solid placeholder-no-fix" id="username" name="username" value="<?php echo htmlentities($user);?>" type="text" /> </div>
                <div class="form-group">
                    <label class="control-label">Contraseña</label>
                    <input class="form-control form-control-solid placeholder-no-fix"  id="password"  name="password" type="password" value="<?php echo htmlentities($clave);?>" /> </div>
                <div class="form-actions">
                      <input class="btn green uppercase" class="formbutton" id="enviar" name="login" value="Acceder" onclick="loginPage.submit();" alt="ACCEDER" type="image"/>
                      <input name="send" value="1" type="hidden"/>
                </div>
            </form>
        </div>
    <div class="copyright"> <?php echo date('Y');?> © WEB ADMIN SYSTEM | WAS
        <!--[if lt IE 9]>
        <script src="assets/global/plugins/respond.min.js"></script>
        <script src="assets/global/plugins/excanvas.min.js"></script>
        <![endif]-->
        <script>if (typeof module === 'object') {window.module = module; module = undefined;}</script>
        <script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
        <script src="assets/global/scripts/app.min.js" type="text/javascript"></script>
        <script type="text/javascript">
          $('#username,#password').keypress(function(e) {
              if (e.which == '13') {
                  $('#enviar').trigger('click');
              }
          });
        </script>
        <script>if (window.module) module = window.module;</script>
    </body>

</html>