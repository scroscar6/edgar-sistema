<?php defined('_SSADMACCESO_') or die; ?>
<?php
$error[0] = 'Ha ocurrido un error al momento de registrar los datos.';
$error[1] = 'El nombre de usuario ya existe.';
$error[2] = 'Error al guardar el archivo.';
$error[3] = 'Dejó campos en blanco.';
$error[4] = 'Acción no permitida.';
$error[5] = 'Usted no puede realizar ésta operación.';
$error[6] = 'Este correo electrónico ya está registrado.';
$error[7] = '<strong>Error al cambiar la contraseña:</strong> La contraseña nuevas no coinciden.';
$error[8] = '<strong>Error al cambiar la contraseña:</strong> La contraseña actual es incorrecta.';
$error[9] = '<strong>Error al cambiar la contraseña:</strong> Contraseña inválida.';
$error[10] = '<strong>Error al cambiar la contraseña:</strong> Dejó en blanco los campos "nueva contraseña".';

$iderror = isset($_GET['error'])?$_GET['error']:0;
?>
	<h3 class="errorft">Error al registrar o modificar los datos.</h3>
	<p class="errorft"><?php echo $error[$iderror];?></p>

<?php
/*switch($_GET['error']){
	case 1:
		echo '<h3 class="errorft">#1 Error al registrar los datos.</h3>
		<p>El nombre de usuario ya existe. <a href="javascript:history.back(-1);">Regresar lo anterior</a></p>';
	break;
	case 2:
		echo '<h3 class="errorft">#2::Error al guardar el archivo.</h3>';
	
	break;
	
	case 3:
		echo '<h3 class="errorft">#3::Campos en blanco.</h3>';
	
	break;
	
	case 4:
		echo '<h3 class="errorft">#3::Acción no permitida.</h3>';
	
	break;
	case 5:
		echo '<h3 class="errorft">#5::Usted no puede realizar ésta operación.</h3>';
	break;
	case 6:
		echo '<h3 class="errorft">#6::Error al registrar los datos. Este correo electrónico ya está registrado.</h3>';
	break;
	case 7:
		echo '<h3 class="errorft">#6::Error al cambiar la contraseña. La contraseña nuevas no coinciden.</h3>';
	break;
	case 8:
		echo '<h3 class="errorft">#6::Error al cambiar la contraseña. La contraseña actual es incorrecta.</h3>';
	break;
	case 9:
		echo '<h3 class="errorft">#6::Error al cambiar la contraseña. Contraseña inválida.</h3>';
	break;
	case 10:
		echo '<h3 class="errorft">#6::Error al cambiar la contraseña. Dejó en blanco el campo Nueva contraseña:.</h3>';
	break;
	
	default:
		echo '<h3 class="errorft">Ha ocurrido un error al momento de registrar los datos.</h3>';
}*/

?>