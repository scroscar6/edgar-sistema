<?php
	class ClsUsuario {
		public $id;
		public $idtipo;
		public $idmodo;
		public $login;
		public $password;
		public $registro;
		public $nombre;
		public $apellido;
		public $email;
		public $ingreso;
		public $foto;
		public $estado;
		public $login1;
		public $email1;
		function __construct(
			$Oid = NULL,
			$Oidtipo = NULL,
			$Oidmodo = NULL,
			$Ologin = NULL,
			$Opassword = NULL,
			$Oregistro = NULL,
			$Onombre = NULL,
			$Oapellido = NULL,
			$Oemail = NULL,
			$Oingreso = NULL,
			$Ofoto = NULL,
			$Oestado = NULL
		)
		{
			$this->id = $Oid;
			$this->idtipo = $Oidtipo;
			$this->idmodo = $Oidmodo;
			$this->login = $Ologin;
			$this->password = $Opassword;
			$this->registro = $Oregistro;
			$this->nombre = $Onombre;
			$this->apellido = $Oapellido;
			$this->email = $Oemail;
			$this->ingreso = $Oingreso;
			$this->foto = $Ofoto;
			$this->estado = $Oestado;
		}
		public function VerificarUsername() {
			$valu1 = isset($this->login1)? ' AND dx.login != "'.mysql_real_escape_string($this->login1).'"':'';
			$sql = 'SELECT 
			COUNT(dx.login) AS EXISTE
			FROM dx_users AS dx
			WHERE dx.login = "'.mysql_real_escape_string($this->login).'"'.$valu1;
			echo $sql;
			$resultado = mysql_query($sql);
			if($resultado){
				$row = mysql_fetch_assoc($resultado);
				if($row['EXISTE']>0){
					return true;
				}else{
					return false;
				}
			}else{
				return false;
			}
		}
		public function UsuarioComp() {
			$sql = 'SELECT
			COUNT(dx.login) AS EXISTE
			FROM dx_users AS dx
			WHERE dx.login = "'.mysql_real_escape_string($this->login1).'"';
			$resultado = mysql_query($sql);
			if($resultado){
				$row = mysql_fetch_assoc($resultado);
				if($row['EXISTE']>0){
					return false;
				}else{
					return true;
				}
			}else{
				return true;
			}
		}
		public function VerificarEmail() {
			$vale1 = isset($this->email1)? ' AND dx.email != "'.mysql_real_escape_string($this->email1).'"':'';
			$sql = 'SELECT
			COUNT(dx.email) AS EXISTE
			FROM dx_users AS dx
			WHERE dx.email = "'.mysql_real_escape_string($this->email).'"'.$vale1;
			$resultado = mysql_query($sql);
			if($resultado){
				$row = mysql_fetch_assoc($resultado);
				if($row['EXISTE']>0){
					return true;
				}else{
					return false;
				}
			}else{
				return false;
			}
		}
		public function ObtenerIdCategoriaMax() {

		 	$sql = 'SELECT
			MAX(id) AS "MAXIMO" FROM dx_users';
			$resultado = mysql_query($sql);
			if($resultado){
				$row = mysql_fetch_assoc($resultado);
				return $row['MAXIMO'];
			}else{
				return false;
			}
		}
		public function VerificarLoginExiste() {
			$sql = 'SELECT
			COUNT(dx.login) AS EXISTE
			FROM dx_users AS dx
			WHERE dx.login = "'.mysql_real_escape_string($this->login).'"';
			$resultado = mysql_query($sql);
			if($resultado){
			$row = mysql_fetch_assoc($resultado);
				if($row['EXISTE']>0){
					return true;
				}else{
					return false;
				}
			}else{
				return false;
			}
		 }

		public function ObtenerTodos() {
			$sql = 'SELECT
			dx.id,
			dx.idtipo,
			dx.idmodo,
			dx.login,
			dx.password,
			dx.registro,
			dx.nombre,
			dx.apellido,
			dx.email,
			dx.ingreso,
			dx.foto,
			dx.estado
			FROM dx_users AS dx ';
			$resultado = mysql_query($sql);
			if($resultado){
				$zLista = NULL;
				$i = 0;
				while($row = mysql_fetch_array($resultado)){
					$zLista[$i] = new ClsUsuario();
					$zLista[$i]->id = $row['id'];
					$zLista[$i]->idtipo = $row['idtipo'];
					$zLista[$i]->idmodo = $row['idmodo'];
					$zLista[$i]->login = $row['login'];
					$zLista[$i]->password = $row['password'];
					$zLista[$i]->registro = $row['registro'];
					$zLista[$i]->nombre = $row['nombre'];
					$zLista[$i]->apellido = $row['apellido'];
					$zLista[$i]->email = $row['email'];
					$zLista[$i]->ingreso = $row['ingreso'];
					$zLista[$i]->foto = $row['foto'];
					$zLista[$i]->estado = $row['estado'];
					$i++;
				}
				return $zLista;
			}else{
				return false;
			}
		}
		public function Login() {
		 	$sql = 'SELECT
			dx.id,
			dx.idtipo,
			dx.idmodo,
			dx.login,
			dx.password,
			dx.registro,
			dx.nombre,
			dx.apellido,
			dx.email,
			dx.ingreso,
			dx.foto,
			dx.estado
			FROM dx_users as dx
			WHERE login = "'.mysql_real_escape_string($this->login).'" 
			AND password = "'.mysql_real_escape_string($this->password).'"
			AND estado = 1 LIMIT 1';
			$resultado = mysql_query($sql);
			if($resultado){
				$zLista = NULL;
				if($row = mysql_fetch_assoc($resultado)){
					$zLista = new ClsUsuario();
					$zLista->id = $row['id'];
					$zLista->idtipo = $row['idtipo'];
					$zLista->idmodo = $row['idmodo'];
					$zLista->login = $row['login'];
					$zLista->password = $row['password'];
					$zLista->registro = $row['registro'];
					$zLista->nombre = $row['nombre'];
					$zLista->apellido = $row['apellido'];
					$zLista->email = $row['email'];
					$zLista->ingreso = $row['ingreso'];
					$zLista->foto = $row['foto'];
					$zLista->estado = $row['estado'];
					return $zLista;
				}
			}else{
				return false;
			}
		}

		public function LoginName() {
		 	$sql = 'SELECT
			dx.id,
			dx.idtipo,
			dx.idmodo,
			dx.login,
			dx.password,
			dx.registro,
			dx.nombre,
			dx.apellido,
			dx.email,
			dx.ingreso,
			dx.foto,
			dx.estado
			FROM dx_users as dx
			WHERE login = "'.mysql_real_escape_string($this->login).'" LIMIT 1';
			$resultado = mysql_query($sql);
			if($resultado){
				$zLista = NULL;
				if($row = mysql_fetch_assoc($resultado)){
					$zLista = new ClsUsuario();
					$zLista->id = $row['id'];
					$zLista->idtipo = $row['idtipo'];
					$zLista->idmodo = $row['idmodo'];
					$zLista->login = $row['login'];
					$zLista->password = $row['password']; 
					$zLista->registro = $row['registro'];
					$zLista->nombre = $row['nombre'];				
					$zLista->apellido = $row['apellido'];		
					$zLista->email = $row['email'];
					$zLista->ingreso = $row['ingreso'];					
					$zLista->foto = $row['foto'];
					$zLista->estado = $row['estado']; 	
					return $zLista;
				}
			}else{
				return false;
			}
		}
		public function ObtenerPorId() {
			$sql = 'SELECT 
			dx.id, 	
			dx.idtipo,
			dx.idmodo,
			dx.login,
			dx.password,			
			dx.registro,			
			dx.nombre,
			dx.apellido,
			dx.email,
			dx.ingreso,
			dx.foto,
			dx.estado			 
			FROM dx_users AS dx 
			WHERE dx.id ='.mysql_real_escape_string($this->id).' 
			  LIMIT 1';
			
			//echo $sql;
			$resultado = mysql_query($sql);
			if($resultado){		
				$zLista = NULL;
				if($row = mysql_fetch_assoc($resultado)){
					$zLista = new ClsUsuario();
					$zLista->id = $row['id'];
					$zLista->idtipo = $row['idtipo'];
					$zLista->idmodo = $row['idmodo'];
					$zLista->login = $row['login'];
					$zLista->password = $row['password']; 
					$zLista->registro = $row['registro'];
					$zLista->nombre = $row['nombre'];
					$zLista->apellido = $row['apellido'];
					$zLista->email = $row['email'];
					$zLista->ingreso = $row['ingreso'];
					$zLista->foto = $row['foto'];
					$zLista->estado = $row['estado'];
				return $zLista;
				}
			}else{
				return false;
			}
		}
		
		public function ObtenerPorIdSession() {
		
			$sql = 'SELECT 
			dx.id, 	
			dx.idtipo,
			dx.idmodo,
			dx.login,
			dx.password,			
			dx.registro,			
			dx.nombre,
			dx.apellido,
			dx.email,
			dx.ingreso,
			dx.foto,
			dx.estado			 
			FROM dx_users AS dx 
			WHERE dx.id ='.mysql_real_escape_string($this->id).' LIMIT 1';
			
			//echo $sql;
			$resultado = mysql_query($sql);
			if($resultado){		
				$zLista = NULL;
				if($row = mysql_fetch_assoc($resultado)){
					$zLista = new ClsUsuario();
					$zLista->id = $row['id'];
					$zLista->idtipo = $row['idtipo'];
					$zLista->idmodo = $row['idmodo'];
					$zLista->login = $row['login'];
					$zLista->password = $row['password']; 
					$zLista->registro = $row['registro'];
					$zLista->nombre = $row['nombre'];
					$zLista->apellido = $row['apellido'];
					$zLista->email = $row['email'];
					$zLista->ingreso = $row['ingreso'];
					$zLista->foto = $row['foto'];
					$zLista->estado = $row['estado'];
				return $zLista;
				}
			}else{
				return false;
			}
		}
		
		public function Registrar() {
		
			$sql = 'INSERT INTO dx_users (
					id,
					idtipo,
					idmodo,
					login,
					password,
					registro,
					nombre,
					apellido,
					email,
					estado) '.
				   'VALUES (
				   "'.mysql_real_escape_string($this->id).'", 
				   "'.mysql_real_escape_string($this->idtipo).'", 
				   "'.mysql_real_escape_string($this->idmodo).'", 
				   "'.mysql_real_escape_string($this->login).'", 
				   "'.mysql_real_escape_string($this->password).'", 
				   "'.mysql_real_escape_string($this->registro).'", 
				   "'.mysql_real_escape_string($this->nombre).'", 
				   "'.mysql_real_escape_string($this->apellido).'", 
				   "'.mysql_real_escape_string($this->email).'", 
				   "'.mysql_real_escape_string($this->estado).'")' ;
			
					$error=0;			
				//echo $sql;	
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
			
		public function Actualizar() {
		
			$sql = 'UPDATE dx_users SET
			idmodo = "'.mysql_real_escape_string($this->idmodo).'", 
			login = "'.mysql_real_escape_string($this->login).'", 
			nombre = "'.mysql_real_escape_string($this->nombre).'", 
			apellido = "'.mysql_real_escape_string($this->apellido).'", 
			email = "'.mysql_real_escape_string($this->email).'"
			WHERE id = "'.mysql_real_escape_string($this->id).'"';
			
			/*$sql = 'UPDATE dx_users SET
			idmodo = "'.mysql_real_escape_string($this->idmodo).'", 
			idtipo = "'.mysql_real_escape_string($this->idtipo).'", 
			login = "'.mysql_real_escape_string($this->login).'", 
			nombre = "'.mysql_real_escape_string($this->nombre).'", 
			apellido = "'.mysql_real_escape_string($this->apellido).'", 
			email = "'.mysql_real_escape_string($this->email).'",
			estado = "'.mysql_real_escape_string($this->estado).'"
			WHERE id = "'.mysql_real_escape_string($this->id).'"';*/
			
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
		public function CambiarContrasena() {
			$sql = 'UPDATE dx_users SET
			password = "'.mysql_real_escape_string($this->password).'"
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
		
		public function ActualizarUltimoAcceso() {
		
			$sql = 'UPDATE dx_users SET
			ingreso = "'.mysql_real_escape_string($this->ingreso).'"		
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
		
		
		
		//Funciones comunes
	
		public function ActualizarEstado() {
		
			$sql = 'UPDATE dx_users
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
		
			$sql = 'DELETE FROM dx_users WHERE id = '.mysql_real_escape_string($this->id);	
			
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