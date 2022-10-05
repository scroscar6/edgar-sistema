<?php
if(isset($_POST['Login'])){
	$POST_login = trim($_POST['Login']);
	
	if($POST_login <> ""){
	
		require_once('../../../Modulos/Usuario/Clases/ClsUsuario.php');
		require_once('../../../ClsConexion.php');
	
		include('../../../includes/funciones.php');
		
		$CConexion = new ClsConexion();
		$CConexion->Conectar();
			
		$Usuario = new ClsUsuario();
		
		if(validarUsuario($POST_login)){
				$Usuario->login = $POST_login;
			if ($Usuario->VerificarLoginExiste()){
				echo "<span class='LoginError'> <b>".$POST_login."</b> no esta disponible.</span>";
				//echo "1";
			}else{
				echo "<span class='Login'><b>".$POST_login."</b> esta disponible.</span>";
				//echo "2";
			}	
			
		}else{
				echo '<span class="LoginError">El nombre de usuario puede incluir solo letras, números, puntos (.), guiones (-) y caracteres de subrayado (_). El id. no puede incluir caracteres especiales ni acentuados.</span>';
	
			//echo "3";
		}
		
	}else{
		echo "No deje este campo en vacío.";
	}
}
?>