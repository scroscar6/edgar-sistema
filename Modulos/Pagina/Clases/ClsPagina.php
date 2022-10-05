<?php
class ClsPagina {
	public $id;
	public $idpaginacategoria;
	public $titulo;
	public $alias;
	public $descripcion;
	public $pagina;
	public $fecha;
	public $opcion;
	public $orden;
	public $estado;
	
	public $limite;
	public $paginacategoria;
	public $paginaalias;
	
	function __construct(
		$Oid = NULL,
		$Oidpaginacategoria = NULL,
		$Otitulo = NULL,
		$Oalias = NULL,
		$Odescripcion = NULL,
		$Opagina = NULL,
		$Ofecha = NULL,
		$Oopcion = NULL,
		$Oorden = NULL,
		$Oestado = NULL
	){
		$this->id = $Oid;
		$this->idpaginacategoria = $Oidpaginacategoria;
		$this->titulo = $Otitulo;
		$this->alias = $Oalias;
		$this->descripcion = $Odescripcion;
		$this->pagina = $Opagina;
		$this->fecha = $Ofecha;
		$this->opcion = $Oopcion;
		$this->orden = $Oorden;
		$this->estado = $Oestado; 
	}

	public function ObtenerIdCategoriaMax() {
		$sql = 'SELECT 
		MAX(id) AS "MAXIMO" FROM dx_pagina';
		$resultado = mysql_query($sql);
		if($resultado){
			$row = mysql_fetch_assoc($resultado);
			return $row['MAXIMO'];
		}else{
			return false;
		}
	}

	public function ObtenerTodos() {
				
		 $sql = 'SELECT 
		 dx.id,
		 dx.idpagina_categoria,
		 dx.titulo,
		 dx.alias,
		 dx.descripcion,
		 dx.pagina,
		 dx.fecha,
		 dx.opcion,
		 dx.orden,
		 dx.estado
		 FROM dx_pagina as dx
		 ORDER BY dx.id ASC';

		//echo $sql;
		$resultado = mysql_query($sql);
		if($resultado){
			$zLista = NULL;
			$i = 0;	
			while( $row = mysql_fetch_array($resultado)){
				$zLista[$i] = new ClsPagina();
				$zLista[$i]->id = $row['id'];
				$zLista[$i]->idpaginacategoria = $row['idpagina_categoria'];
				$zLista[$i]->titulo = $row['titulo'];
				$zLista[$i]->alias = $row['alias'];
				$zLista[$i]->descripcion = $row['descripcion'];
				$zLista[$i]->pagina = $row['pagina'];
				$zLista[$i]->fecha = $row['fecha'];
				$zLista[$i]->opcion = $row['opcion'];
				$zLista[$i]->orden = $row['orden'];
				$zLista[$i]->estado = $row['estado'];
				$i++;
			}
			return $zLista;
		}else{
			return false;
		}
	}
	
	
	
	public function ObtenerPermitidos() {
				
		 $sql = 'SELECT 
		 dx.id,
		 dx.idpagina_categoria,
		 dx.titulo,
		 dx.alias,
		 dx.descripcion,
		 dx.pagina,
		 dx.fecha,
		 dx.opcion,
		 dx.orden,
		 dx.estado
		 FROM dx_pagina as dx
		 WHERE dx.estado = 1 
		 ORDER BY dx.id ASC';

		//echo $sql;
		$resultado = mysql_query($sql);
		if($resultado){
			$zLista = NULL;
			$i = 0;	
			while( $row = mysql_fetch_array($resultado)){
				$zLista[$i] = new ClsPagina();
				$zLista[$i]->id = $row['id'];
				$zLista[$i]->idpaginacategoria = $row['idpagina_categoria'];
				$zLista[$i]->titulo = $row['titulo'];
				$zLista[$i]->alias = $row['alias'];
				$zLista[$i]->descripcion = $row['descripcion'];
				$zLista[$i]->pagina = $row['pagina'];
				$zLista[$i]->fecha = $row['fecha'];
				$zLista[$i]->opcion = $row['opcion'];
				$zLista[$i]->orden = $row['orden'];
				$zLista[$i]->estado = $row['estado'];
				$i++;
			}
			return $zLista;
		}else{
			return false;
		}
	}
	
	public function ObtenerPorCategoria() {
		$sql = 'SELECT 
		 dx.id,
		 dx.idpagina_categoria,
		 dx.titulo,
		 dx.alias,
		 dx.descripcion,
		 dx.pagina,
		 dx.fecha,
		 dx.opcion,
		 dx.orden,
		 dx.estado,
		 dxx.titulo as "paginacategoria",
		 dxx.alias as "paginaalias"
		FROM dx_pagina as dx 
		INNER JOIN dx_pagina_categoria AS dxx 
		ON dx.idpagina_categoria = dxx.id 
		WHERE dx.idpagina_categoria = '.mysql_real_escape_string($this->idpaginacategoria).' 
		ORDER BY dx.orden ASC, dx.id ASC';

		//debug($sql);
			
		//echo $sql;
		$resultado = mysql_query($sql);
		if($resultado){
			$zLista = NULL;
			$i = 0;	
			while( $row = mysql_fetch_array($resultado)){		
				$zLista[$i] = new ClsPagina();
				$zLista[$i]->id = $row['id'];
				$zLista[$i]->idpaginacategoria = $row['idpagina_categoria'];
				$zLista[$i]->titulo = $row['titulo'];
				$zLista[$i]->alias = $row['alias'];
				$zLista[$i]->descripcion = $row['descripcion'];
				$zLista[$i]->pagina = $row['pagina'];
				$zLista[$i]->fecha = $row['fecha'];
				$zLista[$i]->opcion = $row['opcion'];
				$zLista[$i]->orden = $row['orden'];
				$zLista[$i]->estado = $row['estado'];
				$zLista[$i]->paginacategoria = $row['paginacategoria'];
				$zLista[$i]->paginaalias = $row['paginaalias'];
			$i++;
			}
			return $zLista;	
		}else{
			return false;	
		}
	}
	
	
	public function ObtenerPermitidosPorCategoria() {
		
		if(empty($this->idpaginacategoria)){
			$idpub = 0;
		}else{
			$idpub = mysql_real_escape_string($this->idpaginacategoria);
		}
		
		if(empty($this->limite)){
			$lim = '';
		}else{
			$lim = 'LIMIT 0,'.mysql_real_escape_string($this->limite);
		}
			
		$sql = 'SELECT 
		 dx.id,
		 dx.idpagina_categoria,
		 dx.titulo,
		 dx.alias,
		 dx.descripcion,
		 dx.pagina,
		 dx.fecha,
		 dx.opcion,
		 dx.orden,
		 dx.estado,
		 dxx.titulo as "paginacategoria",
		 dxx.alias as "paginaalias"
		FROM dx_pagina as dx 
		INNER JOIN dx_pagina_categoria AS dxx 
		ON dx.idpagina_categoria = dxx.id 
		WHERE dx.idpagina_categoria = '.$idpub.' 
		AND dx.estado = 1 
		ORDER BY dx.orden ASC, dx.id ASC '.$lim;
		
		//echo $sql;
		$resultado = mysql_query($sql);
		if($resultado){
			$zLista = NULL;
			$i = 0;	
			while( $row = mysql_fetch_array($resultado)){		
				$zLista[$i] = new ClsPagina();
				$zLista[$i]->id = $row['id'];
				$zLista[$i]->idpaginacategoria = $row['idpagina_categoria'];
				$zLista[$i]->titulo = $row['titulo'];
				$zLista[$i]->alias = $row['alias'];
				$zLista[$i]->descripcion = $row['descripcion'];
				$zLista[$i]->pagina = $row['pagina'];
				$zLista[$i]->fecha = $row['fecha'];
				$zLista[$i]->opcion = $row['opcion'];
				$zLista[$i]->orden = $row['orden'];
				$zLista[$i]->estado = $row['estado'];
				$zLista[$i]->paginacategoria = $row['paginacategoria'];
				$zLista[$i]->paginaalias = $row['paginaalias'];
			$i++;
			}
			return $zLista;	
		}else{
			return false;	
		}
	}

	public function ObtenerPorId() {
	
		$sql = 'SELECT 
		dx.id,
		dx.idpagina_categoria,
		dx.titulo,
		dx.alias,
		dx.descripcion,
		dx.pagina,
		dx.fecha,
		dx.opcion,
		dx.orden,
		dx.estado,
		dxx.alias AS "paginaalias"
		FROM dx_pagina AS dx 
		INNER JOIN dx_pagina_categoria AS dxx 
		ON dx.idpagina_categoria = dxx.id 
		WHERE dx.id = '.mysql_real_escape_string($this->id);
		
		$resultado = mysql_query($sql);
		if($resultado){
			$zLista = NULL;
			if($row = mysql_fetch_assoc($resultado)){
				$zLista = new ClsPagina();
				$zLista->id = $row['id'];
				$zLista->idpaginacategoria = $row['idpagina_categoria'];
				$zLista->titulo = $row['titulo'];
				$zLista->alias = $row['alias'];
				$zLista->descripcion = $row['descripcion'];
				$zLista->pagina = $row['pagina'];
				$zLista->fecha = $row['fecha'];
				$zLista->opcion = $row['opcion'];
				$zLista->orden = $row['orden'];
				$zLista->estado = $row['estado'];
				$zLista->paginaalias = $row['paginaalias'];
				return $zLista;
			}
		}else{
			return false;
		}
	}
	
	public function ObtenerPermitidosPorId() {
	
		$sql = 'SELECT 
		dx.id,
		dx.idpagina_categoria,
		dx.titulo,
		dx.alias,
		dx.descripcion,
		dx.pagina,
		dx.fecha,
		dx.opcion,
		dx.orden,
		dx.estado
		FROM dx_pagina as dx 
		WHERE dx.estado = 1 
		AND dx.id ='.mysql_real_escape_string($this->id);
		
		$resultado = mysql_query($sql);
		if($resultado){
			$zLista = NULL;
			if($row = mysql_fetch_assoc($resultado)){
				$zLista = new ClsPagina();
				$zLista->id = $row['id'];
				$zLista->idpaginacategoria = $row['idpagina_categoria'];
				$zLista->titulo = $row['titulo'];
				$zLista->alias = $row['alias'];
				$zLista->descripcion = $row['descripcion'];
				$zLista->pagina = $row['pagina'];
				$zLista->fecha = $row['fecha'];
				$zLista->opcion = $row['opcion'];
				$zLista->orden = $row['orden'];
				$zLista->estado = $row['estado'];
				return $zLista;
			}
		}else{
			return false;
		}
	}
	
	public function ObtenerPermitidosPorAlias() {
	
		$sql = 'SELECT 
		dx.id,
		dx.idpagina_categoria,
		dx.titulo,
		dx.alias,
		dx.descripcion,
		dx.pagina,
		dx.fecha,
		dx.opcion,
		dx.orden,
		dx.estado,
		dxx.titulo AS "paginacategoria",
		dxx.alias AS "paginaalias"
		FROM dx_pagina AS dx 
		INNER JOIN dx_pagina_categoria AS dxx 
		ON dx.idpagina_categoria = dxx.id 
		WHERE dx.estado = 1 
		AND dx.alias = "'.mysql_real_escape_string($this->alias).'"';
		
		$resultado = mysql_query($sql);
		if($resultado){
			$zLista = NULL;
			if($row = mysql_fetch_assoc($resultado)){
				$zLista = new ClsPagina();
				$zLista->id = $row['id'];
				$zLista->idpaginacategoria = $row['idpagina_categoria'];
				$zLista->titulo = $row['titulo'];
				$zLista->alias = $row['alias'];
				$zLista->descripcion = $row['descripcion'];
				$zLista->pagina = $row['pagina'];
				$zLista->fecha = $row['fecha'];
				$zLista->opcion = $row['opcion'];
				$zLista->orden = $row['orden'];
				$zLista->estado = $row['estado'];
				$zLista->paginacategoria = $row['paginacategoria'];
				$zLista->paginaalias = $row['paginaalias'];
				return $zLista;
			}
		}else{
			return false;
		}
	}
	
	public function Registrar() {
	
		$sql = 'INSERT INTO dx_pagina (
				id,
				idpagina_categoria,
				titulo,
				alias,
				descripcion,
				pagina,
				fecha,
				opcion,
				orden,
				estado) '.
			   'VALUES (
			   "'.mysql_real_escape_string($this->id).'",
			   "'.mysql_real_escape_string($this->idpaginacategoria).'",
			   "'.mysql_real_escape_string($this->titulo).'",
			   "'.mysql_real_escape_string($this->alias).'",
			   "'.mysql_real_escape_string($this->descripcion).'",
			   "'.mysql_real_escape_string($this->pagina).'",
			   "'.mysql_real_escape_string($this->fecha).'",
			   "'.mysql_real_escape_string($this->opcion).'",
			   "'.mysql_real_escape_string($this->orden).'",
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
			$sql = 'UPDATE dx_pagina SET 
				idpagina_categoria = "'.mysql_real_escape_string($this->idpaginacategoria).'",
				titulo = "'.mysql_real_escape_string($this->titulo).'",
				alias = "'.mysql_real_escape_string($this->alias).'",
				descripcion = "'.mysql_real_escape_string($this->descripcion).'",
				pagina = "'.mysql_real_escape_string($this->pagina).'",
				fecha = "'.mysql_real_escape_string($this->fecha).'",
				opcion = "'.mysql_real_escape_string($this->opcion).'",
				orden = "'.mysql_real_escape_string($this->orden).'",
				estado = '.mysql_real_escape_string($this->estado).' 
				WHERE id ='.mysql_real_escape_string($this->id);
				
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
	
		$sql = 'UPDATE dx_pagina
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
	
		$sql = 'DELETE FROM dx_pagina WHERE id = '.mysql_real_escape_string($this->id);	
		
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