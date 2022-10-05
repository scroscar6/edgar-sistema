<?php
    session_start();
    date_default_timezone_set('America/Lima');
    $nueip = filter_var($_SERVER['REMOTE_ADDR'],FILTER_VALIDATE_IP,FILTER_FLAG_IPV4);
    $redi = $_SERVER['QUERY_STRING'];
    if(empty($redi)){ $redi1 = '?s=0'; $redi2 = '?s=1'; }else{ $redi1 = '?'.$redi.'&s=0'; $redi2 = '?s=1'; }
    $_SESSION['ref'] = trim($redi1);
    if(isset($_SESSION['IdUsuario']) && isset($_SESSION['Login']) && $nueip== $_SESSION['ip']){
    if ($_SESSION['timeout'] + 30 * 60 < time()) {
        header("Location: ./logueo/logout.php".trim($redi1));
    }
    $_SESSION['timeout'] = time();
    define('_SSADMACCESO_',true);
    define('DS', DIRECTORY_SEPARATOR);              // /
    define('DD', '_');                              // _
    define('ADMIN', '/was');                            //
    define('APP_MOD', 'Modulos');                   // Modulos
    define('APP_FORM', DS . 'Formularios' . DS);    // /Formularios/
    define('ROOT', dirname(__FILE__));              // ..
    define('WWW_ROOT', ROOT . DS . APP_MOD . DS);   // /Modulos/Modulos/
    require_once("ClsConexion.php");
    require_once("PDO.php");
    require_once("includes/funciones.php");
    include('includes/XSS.php');
    $CConexion = new ClsConexion();
    $CConexion->Conectar();
    $URLBase = $CConexion->URLBase();
    $URLBaseCDN = $CConexion->URLBaseCDN();
    $DIRBase = $CConexion->DIRBase();
    $URLBaseMedia = $URLBaseCDN.'/media';
    include(WWW_ROOT . 'Config/Clases/ClsConfig.php');
    include('Config.php');
    include(WWW_ROOT . 'Usuario/Clases/ClsUsuario.php');
    include(WWW_ROOT . 'Usuario/Clases/ClsUsuarioTipo.php');
    include(WWW_ROOT . 'Usuario/Clases/ClsUsuarioModo.php');
    $idusuario = isset($_SESSION['IdUsuario']) ? (int)$_SESSION['IdUsuario'] : 0;
    $tipo = isset($_SESSION['Tipo']) ? (int)$_SESSION['Tipo'] : 0;
    $modo = isset($_SESSION['Modo']) ? (int)$_SESSION['Modo'] : 0;
    //Options Modo
    if(isset($_GET['task'])){
        $GET_opc = LimpiarXSS($_GET['task']);
        $GET_opc = AlfaNumericoSS($GET_opc);
    }else{
        $GET_opc = 'Portada';
    }
    if(isset($_GET['option'])){
        $GET_form = LimpiarXSS($_GET['option']);
        $GET_form = AlfaNumericoSS($GET_form);
    }else{
        $GET_form = '';
    }
    $GET_cat = isset($_GET['cat']) ? (int)$_GET['cat'] : 0;
    $GET_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
    $GET_md = isset($_GET['md']) ? (int)$_GET['md'] : 0;
    $GET_pag = isset($_GET['p']) ? (int)$_GET['p'] : 0;
    $main = 'cpanel.php';
    $titleweb = "Sistema de Control de Consumo Electrico | ".$Config_NombreSitio;
    switch($tipo){
        case 1:
            $ListaForm = array('Usuario','Pagina', 'Config','Cliente','Ciclo','Recibo');
            $ListaOpciones = array("Listar", "Agregar", "Editar", "Error", "Portada");
        break;
        default:
            $ListaForm = array('-');
            $ListaOpciones = array('-');
        break;
    }

    //comprobando si existe el modulo en el array
    if (in_array($GET_form ,$ListaForm)) {
        $zGET_form = $GET_form;
    }else{
        $zGET_form = "Error";
    }

    //comprobando si existe la opción en el array
    if (in_array($GET_opc ,$ListaOpciones)) {
        $zGET_opc = $GET_opc;
    }else{
        $zGET_opc = "Error";
    }

    //DATOS DEL USUARIO LOGEADO
    $ss_nombre = '';
    $ss_ingreso = '';
    $ss_tipo = '';
    $csUsuario = new ClsUsuario();
    $csUsuario->id = $idusuario;
    $lsUsuario = $csUsuario->ObtenerPorIdSession();
    if($lsUsuario!=NULL){
        $ss_nombre = $lsUsuario->nombre;
        $ss_ingreso = $lsUsuario->ingreso;

        $csUsuarioTipo  = new ClsUsuarioTipo();
        $csUsuarioTipo->id = $lsUsuario->idtipo;
        $lsUsuarioTipo = $csUsuarioTipo->ObtenerPorId();
        if($lsUsuarioTipo!=NULL){
            $ss_tipo = $lsUsuarioTipo->tipo;
        }
    }
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <title><?php echo $titleweb;?></title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="WEB ADMIN SITELSUR" name="description" />
        <meta content="OSCAR ALAY" name="author" />
        <link rel="icon" type="image/png" href="favicon.png" />
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/layouts/layout/css/layout.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/layouts/layout/css/themes/darkblue.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="assets/layouts/layout/css/custom.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/lobibox-master/dist/css/lobibox.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/formvalidation/dist/css/formValidation.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/bootstrap-toastr/toastr.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/global/plugins/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/bootstrap-sweetalert/sweetalert.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/icheck/skins/all.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/clockface/css/clockface.css" rel="stylesheet" type="text/css" />

        <script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
    </head>
<body class="page-sidebar-fixed  page-footer-fixed page-header-fixed page-sidebar-closed-hide-logo page-content-white  page-sidebar-mobile-offcanvas">
     <div class="page-wrapper">
        <div class="page-header navbar navbar-fixed-top">
            <!-- BEGIN HEADER INNER -->
            <div class="page-header-inner ">
                <!-- BEGIN LOGO -->
                <div class="page-logo">
                    <a href="cpanel.php">
                        <img src="assets/layouts/layout/img/logo___.png" alt="SITELSUR" class="logo-default" width="110px" /> </a>
                    <div class="menu-toggler sidebar-toggler">
                        <span></span>
                    </div>
                </div>
                <!-- END LOGO -->
                <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                <!--<a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">-->
                <a href="javascript:;" class="menu-toggler responsive-toggler">
                    <span></span>
                </a>
                <!-- END RESPONSIVE MENU TOGGLER -->
                <!-- BEGIN TOP NAVIGATION MENU -->
                <div class="top-menu">
                    <ul class="nav navbar-nav pull-right">
                        <li class="dropdown dropdown-user dropdown-dark">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"  data-close-others="true">
                                <img alt="" class="img-circle" src="assets/layouts/layout/img/avatar3_small.jpg" />
                                <span class="username username-hide-on-mobile"> Bienvenido
                                <strong><?php echo iTexto($ss_nombre);?> (<?php echo iTexto($ss_tipo);?>)</strong> </span>
                                <i class="fa fa-angle-down"></i>    
                            </a>
                            <ul class="dropdown-menu dropdown-menu-default">
                                <li>
                                    <a target="_blank" href="../.">
                                        <i class="icon-lock"></i> Visita el Sitio </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" onclick="cerrarSesion('logueo/logout.php<?php echo $redi2;?>'); return false;">
                                        <i class="icon-key"></i> Salir </a>
                                </li>
                            </ul>
                        </li>
                        <!-- END USER LOGIN DROPDOWN -->
                        <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                        <?php if (false): ?>
                            <li class="dropdown dropdown-quick-sidebar-toggler">
                                <a href="javascript:;" class="dropdown-toggle">
                                    <i class="icon-logout"></i>
                                </a>
                            </li>
                        <?php endif ?>
                        <!-- END QUICK SIDEBAR TOGGLER -->
                    </ul>
                </div>
                <!-- END TOP NAVIGATION MENU -->
            </div>
            <!-- END HEADER INNER -->
        </div>
        <div class="clearfix"> </div>
        <div class="page-container">
            <?php include('includes/menu_n.php');?>
            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="theme-panel hidden-xs hidden-sm">
                        <div class="toggler"> </div>
                        <div class="toggler-close"> </div>
                        <div class="theme-options">
                            <div class="theme-option theme-colors clearfix">
                                <span> THEME COLOR </span>
                                <ul>
                                    <li class="color-default current tooltips" data-style="default" data-container="body" data-original-title="Default"> </li>
                                    <li class="color-darkblue tooltips" data-style="darkblue" data-container="body" data-original-title="Dark Blue"> </li>
                                    <li class="color-blue tooltips" data-style="blue" data-container="body" data-original-title="Blue"> </li>
                                    <li class="color-grey tooltips" data-style="grey" data-container="body" data-original-title="Grey"> </li>
                                    <li class="color-light tooltips" data-style="light" data-container="body" data-original-title="Light"> </li>
                                    <li class="color-light2 tooltips" data-style="light2" data-container="body" data-html="true" data-original-title="Light 2"> </li>
                                </ul>
                            </div>
                            <div class="theme-option">
                                <span> Theme Style </span>
                                <select class="layout-style-option form-control input-sm">
                                    <option value="square" selected="selected">Square corners</option>
                                    <option value="rounded">Rounded corners</option>
                                </select>
                            </div>
                            <div class="theme-option">
                                <span> Layout </span>
                                <select class="layout-option form-control input-sm">
                                    <option value="fluid" selected="selected">Fluid</option>
                                    <option value="boxed">Boxed</option>
                                </select>
                            </div>
                            <div class="theme-option">
                                <span> Header </span>
                                <select class="page-header-option form-control input-sm">
                                    <option value="fixed" selected="selected">Fixed</option>
                                    <option value="default">Default</option>
                                </select>
                            </div>
                            <div class="theme-option">
                                <span> Top Menu Dropdown</span>
                                <select class="page-header-top-dropdown-style-option form-control input-sm">
                                    <option value="light" selected="selected">Light</option>
                                    <option value="dark">Dark</option>
                                </select>
                            </div>
                            <div class="theme-option">
                                <span> Sidebar Mode</span>
                                <select class="sidebar-option form-control input-sm">
                                    <option value="fixed">Fixed</option>
                                    <option value="default" selected="selected">Default</option>
                                </select>
                            </div>
                            <div class="theme-option">
                                <span> Sidebar Menu </span>
                                <select class="sidebar-menu-option form-control input-sm">
                                    <option value="accordion" selected="selected">Accordion</option>
                                    <option value="hover">Hover</option>
                                </select>
                            </div>
                            <div class="theme-option">
                                <span> Sidebar Style </span>
                                <select class="sidebar-style-option form-control input-sm">
                                    <option value="default" selected="selected">Default</option>
                                    <option value="light">Light</option>
                                </select>
                            </div>
                            <div class="theme-option">
                                <span> Sidebar Position </span>
                                <select class="sidebar-pos-option form-control input-sm">
                                    <option value="left" selected="selected">Left</option>
                                    <option value="right">Right</option>
                                </select>
                            </div>
                            <div class="theme-option">
                                <span> Footer </span>
                                <select class="page-footer-option form-control input-sm">
                                    <option value="fixed">Fixed</option>
                                    <option value="default" selected="selected">Default</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <a href="cpanel.php">Inicio</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <a href="#"><?php  echo $zGET_opc;?></a>
                                <i class="fa fa-circle"></i>
                            </li>
                        </ul>
                        <div class="page-toolbar">
                            <div id="dashboard-report-range" class="pull-right tooltips btn btn-sm">
                                <i class="icon-calendar"></i>&nbsp;
                                <span class="thin uppercase hidden-xs">
                                    <?php echo fecha_letrasCompacto(); ?>  -  <span id="liveclock" ></span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <?php if($zGET_opc == 'Portada'): ;?>
                    <h3 class="page-title"><?php echo $zGET_opc;?>
                        <small>SISTEMA RECIBOS</small>
                    </h3>
                    <?php else: ?>
                    <h3 class="page-title"><?php echo $zGET_opc.' / '.$zGET_form;?>
                        <small>SISTEMA RECIBOS</small>
                    </h3>
                    <?php endif;?>
                    <?php include('includes/modulos.php');?>
                </div>
            </div>
        </div>
        <div class="page-footer">
            <div class="page-footer-inner"> <?php echo date('Y');?> © WEB ADMIN SYSTEM
            </div>
            <div class="scroll-to-top">
                <i class="icon-arrow-up"></i>
            </div>
        </div>
    </div>
    <script src="assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
    <script src="assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <script src="assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
    <script src="assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
    <script src="assets/global/scripts/app.min.js" type="text/javascript"></script>
    <script src="assets/layouts/layout/scripts/layout.min.js" type="text/javascript"></script>
    <script src="assets/layouts/layout/scripts/demo.min.js" type="text/javascript"></script>
    <script src="assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
    <script src="assets/layouts/global/scripts/quick-nav.min.js" type="text/javascript"></script>
    <script src="assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
    <script src="assets/global/plugins/icheck/icheck.min.js" type="text/javascript"></script>
    <script src="assets/global/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js" type="text/javascript"></script>
    <script src="assets/global/plugins/lobibox-master/dist/js/lobibox.min.js" type="text/javascript"></script>
    <script src="assets/global/plugins/lobibox-master/dist/js/messageboxes.min.js" type="text/javascript"></script>
    <script src="assets/global/plugins/lobibox-master/dist/js/notifications.min.js" type="text/javascript"></script>
    <script src="assets/global/plugins/formvalidation/dist/js/formValidation.min.js" type="text/javascript"></script>
    <script src="assets/global/plugins/formvalidation/dist/js/framework/bootstrap.min.js" type="text/javascript"></script>
    <script src="assets/global/plugins/formvalidation/dist/js/language/es_ES.js" type="text/javascript"></script>
    <script src="assets/global/plugins/bootstrap-toastr/toastr.min.js" type="text/javascript"></script>
    <script src="assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
    <script src="assets/pages/scripts/components-select2.min.js" type="text/javascript"></script>
    <script src="assets/global/plugins/bootstrap-select/js/bootstrap-select.min.js" type="text/javascript"></script>
    <script src="assets/global/plugins/bootstrap-sweetalert/sweetalert.min.js" type="text/javascript"></script>
    <script src="assets/pages/scripts/form-icheck.min.js" type="text/javascript"></script>
    <script src="assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
    <script src="assets/global/plugins/moment.min.js" type="text/javascript"></script>
    <script src="assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
    <script src="assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
    <script src="assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
    <script src="assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
    <script src="assets/global/plugins/bootstrap-datetimepicker/js/locales/bootstrap-datetimepicker.es.js" type="text/javascript"></script>
    <script src="assets/global/plugins/clockface/js/clockface.js" type="text/javascript"></script>
    <script src="assets/pages/scripts/components-date-time-pickers.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="plugins/ckeditor/ckeditor.js"></script>
    <script src="//cdn.ckeditor.com/4.4.3/basic/adapters/jquery.js"></script>
    <script src="assets/modulos/estructura.js" type="text/javascript"></script>
    <script src="includes/funciones.js" type="text/javascript"></script>
    <script src="js/hora.js" type="text/javascript"></script>
    <?php if ($GET_form == "Usuario"): ?>
        <script src="assets/core/Usuario.js" type="text/javascript"></script>
    <?php endif ?>
    <?php if ($GET_form == "Config"): ?>
        <script src="assets/core/Config.js" type="text/javascript"></script>
    <?php endif ?>
    <?php if ($GET_form == "Pagina"): ?>
        <script src="assets/core/Pagina.js" type="text/javascript"></script>
    <?php endif ?>
    <?php if ($GET_form == "Cliente"): ?>
        <script src="assets/core/Cliente.js" type="text/javascript"></script>
    <?php endif ?>
    <?php if ($GET_form == "Ciclo"): ?>
        <script src="assets/core/Ciclo.js" type="text/javascript"></script>
    <?php endif ?>
    <?php if ($GET_form == "Recibo"): ?>
        <script src="assets/core/Recibo.js" type="text/javascript"></script>
    <?php endif ?>
<script type="text/javascript">
  $('.select2').select2();
</script>
</body>
</html>
<?php
$CConexion->Desconectar();
} else {
    header("Location: ./");
}
?>