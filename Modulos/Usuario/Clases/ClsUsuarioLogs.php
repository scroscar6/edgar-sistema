<?php
class ClsUsuarioLogs {
	public $id;		
	public $user;
	public $clave;
	public $fecha;
	public $ip;
	public $estado;

	function __construct(
		$id = NULL,		
		$user = NULL,
		$clave = NULL,
		$fecha = NULL,
		$ip = NULL,
		$estado = NULL
	){
		$this->id = $id;		
		$this->user = $user;
		$this->clave = $clave;
		$this->fecha = $fecha;
		$this->ip = $ip;
		$this->estado = $estado;
	}
		
	public function ObtenerIdMax() {
		$sql = 'SELECT 
		MAX(id) AS "MAXIMO" FROM dx_users_logs';
		$resultado = mysql_query($sql);
		if($resultado){
			$row = mysql_fetch_assoc($resultado);
			return $row['MAXIMO'];
		}else{
			return false;	
		}
	}


	public function RegIntento($user, $clave, $fecha, $ip, $estado) {
		$sql = 'INSERT INTO dx_users_logs (
				user,
				clave,
				fecha,
				ip,
				estado) '.
			   'VALUES (
			   "'.mysql_real_escape_string($user).'", 
			   "'.mysql_real_escape_string($clave).'", 
			   "'.mysql_real_escape_string($fecha).'", 
			   "'.mysql_real_escape_string($ip).'", 
			   "'.mysql_real_escape_string($estado).'")' ;
		
			$error=0;			

		mysql_query("SET NAMES UTF8");		
		mysql_query("START TRANSACTION");			
		
		$resultado = mysql_query($sql);

					
		if(!$resultado){
			$error=1;
		}
		
		if($error==1) {
			mysql_query("ROLLBACK");				
			return false;
		} else {
			mysql_query("COMMIT");
			return true;
		}			
	}

	public function UpdIntento($user, $clave, $id, $estado) {
		$sql = 'UPDATE dx_users_logs SET
			clave = "'.mysql_real_escape_string($clave).'", 
			estado = "'.mysql_real_escape_string($estado).'"
			WHERE user = "'.mysql_real_escape_string($user).'"
			AND id = "'.mysql_real_escape_string($id).'"';

		$error=0;				

		mysql_query("SET NAMES UTF8");		
		mysql_query("START TRANSACTION");			
		
		$resultado = mysql_query($sql);
					
		if(!$resultado){
			$error=1;
		}
		
		if($error==1) {
			mysql_query("ROLLBACK");				
			return false;
		} else {
			mysql_query("COMMIT");
			return true;
		}			
	}
	
}
?>