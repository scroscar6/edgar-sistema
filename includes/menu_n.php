<?php defined('_SSADMACCESO_') or die;?>
<div class="page-sidebar-wrapper">
    <div class="page-sidebar">
        <ul class="page-sidebar-menu page-header-fixed " data-keep-expanded="false" data-auto-scroll="false" data-slide-speed="200" style="padding-top: 20px">
            <li class="sidebar-toggler-wrapper hide">
                <div class="sidebar-toggler">
                    <span></span>
                </div>
            </li>
            <li class="sidebar-search-wrapper">
                <form class="sidebar-search  sidebar-search-bordered sidebar-search-solid" action="" method="POST">
                    <a href="javascript:;" class="remove">
                        <i class="icon-close"></i>
                    </a>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Buscar...">
                        <span class="input-group-btn">
                            <a href="javascript:;" class="btn submit">
                                <i class="icon-magnifier"></i>
                            </a>
                        </span>
                    </div>
                </form>
            </li>
            <li class="nav-item">
                <a href="cpanel.php" class="nav-link">
                    <i class="fa fa-tachometer" aria-hidden="true"></i>
                    <span class="title">Panel de Control</span>
                </a>
            </li>
           
            <li class="heading">
                <h3 class="uppercase">Modulos</h3>
            </li>
            <?php switch($tipo){ 
                 case 1: ?>
                    <li class="nav-item">
                        <a href="cpanel.php?option=Usuario&amp;task=Listar" class="nav-link">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            <span class="title">Usuarios</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="cpanel.php?option=Cliente&amp;task=Listar" class="nav-link nav-toggle">
                            <i class="fa fa-users" aria-hidden="true"></i>
                            <span class="title">Clientes</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="cpanel.php?option=Ciclo&amp;task=Listar" class="nav-link nav-toggle">
                            <i class="fa fa-calendar" aria-hidden="true"></i>
                            <span class="title">Ciclo</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="cpanel.php?option=Recibo&amp;task=Listar" class="nav-link nav-toggle">
                            <i class="fa fa-folder" aria-hidden="true"></i> 
                            <span class="title">Recibos</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="cpanel.php?option=Config&task=Editar&id=1" class="nav-link">
                            <i class="fa fa-cog" aria-hidden="true"></i>
                            <span class="title">Configuraciones</span>
                        </a>
                    </li>
                <?php break; 
           } ?>
        </ul>
    </div>
</div>