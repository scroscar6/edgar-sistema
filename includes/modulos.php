<?php defined('_SSADMACCESO_') or die;?>
<div class="row">
    <div class="col-md-12">
        <?php
        switch($GET_opc){

            case 'Listar':
                if($GET_form == $zGET_form){
                    if(file_exists(WWW_ROOT . $zGET_form . APP_FORM . $zGET_form . DD . $zGET_opc . '.php')){
                        require_once(WWW_ROOT . $zGET_form . APP_FORM . $zGET_form . DD . $zGET_opc . '.php');
                    }else{
                        echo "<h1>Página no encontrada!.</h1>";
                    }
                }else{
                    echo "No tiene los permisos necesarios para acceder a esta página.";
                }
            break;

            case 'Agregar' :
                if($GET_form == $zGET_form){
                    if(file_exists(WWW_ROOT . $zGET_form . APP_FORM . $zGET_form . DD . $zGET_opc . '.php')){
                        require_once(WWW_ROOT . $zGET_form . APP_FORM . $zGET_form . DD . $zGET_opc . '.php');
                    }else{
                        echo "<h1>Página no encontrada!.</h1>";
                    }
                }else{
                    echo "No tiene los permisos necesarios para acceder a esta página.";
                }
            break;

            case 'Editar':
                if($GET_form == $zGET_form){
                    if(file_exists(WWW_ROOT . $zGET_form . APP_FORM . $zGET_form . DD . $zGET_opc . '.php')){
                        require_once(WWW_ROOT . $zGET_form . APP_FORM . $zGET_form . DD . $zGET_opc . '.php');
                    }else{
                        echo "<h1>Página no encontrada!.</h1>";
                    }
                }else{
                    echo "No tiene los permisos necesarios para acceder a esta página.";
                }
            break;

            case 'Error':
                if($GET_form == $zGET_form){
                    if(file_exists(WWW_ROOT . $zGET_form . APP_FORM . $zGET_form . DD . $zGET_opc . '.php')){
                        require_once(WWW_ROOT . $zGET_form . APP_FORM . $zGET_form . DD . $zGET_opc . '.php');
                        //echo 'No tiene los permisos necesarios para acceder a esta página.';
                    }else{
                        echo "<h1>Página no encontrada!.</h1>";
                    }
                }else{
                    echo "No tiene los permisos necesarios para acceder a esta página.";
                }
            break;

            case 'Portada':
                if(file_exists('bienvenida.php')){
                    require_once('bienvenida.php');
                }else{
                    echo "<h1>Página no encontrada!.</h1>";
                }
            break;

            default:
                require_once('bienvenida.php');
            break;

        }
        ?>
    </div>
</div>
