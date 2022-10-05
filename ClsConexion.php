<?php
	class ClsConexion {
		public $Mantenimiento;
		public $Servidor 		= '127.0.0.1';
		public $Usuario 		= 'root';
		public $Contrasena 		= '';
		public $BD 				= 'sistema_recibo';
		public $Puerto 			= '3306';
		public $URLBase;
		public $DIRBase;
		public $DIRBaseCDN;
		public $URLBaseCDN;
		public $ConfigEmail;
		public $ConfigNombre;
		public $Conexion;
		function __construct(){
			$this->Mantenimiento 	= 0;						// Definir si está en mantenimiento. 0:Apagado; 1:Encendido
			$this->URLBase  		= '/sistema_edgar';						// URL del sitio Web
			$this->DIRBase 			= '..';					// Directorio CDN (Uso UPLOAD para el CKEDITOR Y RedimImagen)
			$this->DIRBaseCDN 		= '../../../..';		// Directorio CDN (Uso UPLOAD para media)
			$this->URLBaseCDN 		= 'http://localhost:8080/sistema_edgar';	// URL del CDN (VISTA)
			$this->ConfigEmail		= 'info@sistema.tic64.com';
			$this->ConfigNombre 	= 'SISTEMA RECIBOS - EDGAR';
		}
		function __destruct(){

		}
		public function Conectar(){
			$on = true;
			$this->Conexion = @mysql_connect($this->Servidor.':'.$this->Puerto, $this->Usuario, $this->Contrasena);
			mysql_query("SET NAMES 'utf8'");
			mysql_query("SET CHARACTER SET utf8 ");
			if(!$this->Conexion) {
				$iderrno = 0;
				$ConfigNombre = $this->ConfigNombre;
				include('includes/mysql_error.php');
				$on = false;
				exit();
			}else{
				if(!@mysql_select_db($this->BD, $this->Conexion)){
					$iderrno = 1;
					$ConfigNombre = $this->ConfigNombre;
					include('includes/mysql_error.php');
					$on = false;
					exit();
				}
			}
			return $on;
		}
		public function Desconectar(){
			if (isset($this->Conexion)){
				@mysql_close($this->Conexion);
			}
		}
		public function URLBase(){
			return $this->URLBase;
		}
		public function DIRBase(){
			return $this->DIRBase;
		}
		public function DIRBaseCDN(){
			return $this->DIRBaseCDN;
		}
		public function URLBaseCDN(){
			return $this->URLBaseCDN;
		}
		public function ConfigEmail(){
			return $this->ConfigEmail;
		}
		public function ConfigNombre(){
			return $this->ConfigNombre;
		}
		public function Mantenimiento(){
			return $this->Mantenimiento;
		}
	}
?>
