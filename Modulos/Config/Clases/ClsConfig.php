<?php
class ClsConfig {
	public $id;
	public $titulo;
	public $tituloext;
	public $metadesc;
	public $metakeys;
	public $frase;
	public $url;
	public $email;
	public $direccion;
	public $telefono;
	public $telefono1;
	public $facebook;
	public $twitter;
	public $youtube;
	public $igoogle;
	
	function __construct(
		$Oid = NULL,
		$Otitulo = NULL,
		$Otituloext = NULL,
		$Ometadesc = NULL,
		$Ometakeys = NULL,
		$Ofrase = NULL,
		$Oemail = NULL,
		$Odireccion = NULL,
		$Otelefono = NULL,
		$Otelefono1 = NULL,
		$Ofacebook = NULL,
		$Otwitter = NULL,
		$Oyoutube = NULL,
		$Oigoogle = NULL,
		$Ourl = NULL
		
	){
		$this->id = $Oid;
		$this->titulo = $Otitulo;
		$this->tituloext = $Otituloext;
		$this->metadesc = $Ometadesc;
		$this->metakeys = $Ometakeys;
		$this->frase = $Ofrase;
		$this->email = $Oemail;
		$this->direccion = $Odireccion;
		$this->telefono = $Otelefono;
		$this->telefono1 = $Otelefono1;
		$this->facebook = $Ofacebook;
		$this->twitter = $Otwitter;
		$this->youtube = $Oyoutube;
		$this->igoogle = $Oigoogle; 
		$this->url = $Ourl; 
	}

	public function ObtenerIdCategoriaMax() {
		$sql = 'SELECT 
		MAX(id) AS "MAXIMO" FROM dx_config';
		$resultado = mysql_query($sql);
		if($resultado){
			$row = mysql_fetch_assoc($resultado);
			return $row['MAXIMO'];
		}else{
			return false;
		}
	}

	public function ObtenerPorId() {
		$sql = 'SELECT 
		dx.id,
		dx.titulo,
		dx.titulo_ext,
		dx.meta_desc,
		dx.meta_keys,
		dx.frase,
		dx.url,
		dx.email,
		dx.direccion,
		dx.telefono,
		dx.telefono1,
		dx.facebook,
		dx.twitter,
		dx.youtube,
		dx.igoogle
		FROM dx_config as dx 
		WHERE dx.id = '.mysql_real_escape_string($this->id);

		//debug($sql);
		
		$resultado = mysql_query($sql);
		if($resultado){
			$zLista = NULL;
			if($row = mysql_fetch_assoc($resultado)){
				$zLista = new ClsConfig();
				$zLista->id = $row['id'];
				$zLista->titulo = $row['titulo'];
				$zLista->tituloext = $row['titulo_ext'];
				$zLista->metadesc = $row['meta_desc'];
				$zLista->metakeys = $row['meta_keys'];
				$zLista->frase = $row['frase'];
				$zLista->url = $row['url'];
				$zLista->email = $row['email'];
				$zLista->direccion = $row['direccion'];
				$zLista->telefono = $row['telefono'];
				$zLista->telefono1 = $row['telefono1'];
				$zLista->facebook = $row['facebook'];
				$zLista->twitter = $row['twitter'];
				$zLista->youtube = $row['youtube'];
				$zLista->igoogle = $row['igoogle'];
				return $zLista;
			}
		}else{
			return false;
		}
	}

	public function Actualizar() {
		$sql = 'UPDATE dx_config SET 
			titulo = "'.mysql_real_escape_string($this->titulo).'",
			titulo_ext = "'.mysql_real_escape_string($this->tituloext).'",
			meta_desc = "'.mysql_real_escape_string($this->metadesc).'",
			meta_keys = "'.mysql_real_escape_string($this->metakeys).'",
			frase = "'.mysql_real_escape_string($this->frase).'",
			url = "'.mysql_real_escape_string($this->url).'",
			direccion = "'.mysql_real_escape_string($this->direccion).'",
			email = "'.mysql_real_escape_string($this->email).'",
			telefono = "'.mysql_real_escape_string($this->telefono).'",
			telefono1 = "'.mysql_real_escape_string($this->telefono1).'",
			facebook = "'.mysql_real_escape_string($this->facebook).'",
			twitter = "'.mysql_real_escape_string($this->twitter).'",
			youtube = "'.mysql_real_escape_string($this->youtube).'",
			igoogle = "'.mysql_real_escape_string($this->igoogle).'"
			WHERE id = '.mysql_real_escape_string($this->id);
				
			//echo $sql;

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
	//Funciones comunes
	public function ActualizarEstado() {
	
		$sql = 'UPDATE dx_config
		SET estado = '.mysql_real_escape_string($this->estado).' 
		WHERE id = '.mysql_real_escape_string($this->id);
		
		$error=0;			
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
	
	public function Eliminar() {
	
		$sql = 'DELETE FROM dx_config WHERE id = '.mysql_real_escape_string($this->id);	
		
		$error=0;			
				
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