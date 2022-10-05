<?php defined('_SSADMACCESO_') or die; ?>
<style type="text/css">
    .desc{
        margin-top:25px;
    };
</style>
	<?php
	   if($GET_opc=='Portada'){include('includes/msg-form.php');}
    ?>
<div class="row">
	<?php
    switch($tipo){
        case 1:
    ?>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 blue-ebonyclay" href="cpanel.php?option=Usuario&amp;task=Listar">
                <div class="visual">
                    <i class="fa fa-user" aria-hidden="true"></i>
                </div>
                <div class="details">
                    <div class="desc"> Usuarios </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 yellow-casablanca" href="cpanel.php?option=Cliente&amp;task=Listar">
                <div class="visual">
                    <i class="fa fa-user" aria-hidden="true"></i>
                </div>
                <div class="details">
                    <div class="desc"> Cliente </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 yellow-casablanca" href="cpanel.php?option=Ciclo&amp;task=Listar">
                <div class="visual">
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                </div>
                <div class="details">
                    <div class="desc"> Ciclo </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 purple-medium " href="cpanel.php?option=Config&amp;task=Editar&amp;id=1">
                <div class="visual">
                    <i class="fa fa-cog" aria-hidden="true"></i>
                </div>
                <div class="details">
                    <div class="desc"> Configuración </div>
                </div>
            </a>
        </div>
    <?php
        break;
    }
    ?>
</div>