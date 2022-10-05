<?php
	class ClsPaginaCategoria {
		
		public $id;
		public $titulo;
		public $alias;
		public $estado;
		public $total;
		
		function __construct(
			$Oid = NULL,
			$Otitulo = NULL,
			$Oalias = NULL,
 			$Oestado = NULL
		){
			$this->id = $Oid;
			$this->titulo = $Otitulo;
			$this->alias = $Oalias;
			$this->estado = $Oestado; 
		}

		public function ObtenerTodos() {
			$sql = 'SELECT 
			dx.id,
			dx.titulo,
			dx.alias,
			dx.estado,
			(SELECT COUNT(*) FROM dx_pagina dxx WHERE dxx.idpagina_categoria = dx.id) AS "total"
			FROM dx_pagina_categoria as dx
			WHERE dx.estado = 1
			ORDER BY dx.id ASC';

			
			$resultado = mysql_query($sql);
			if($resultado){
				$i = 0;
				$zLista = NULL;
				while($row = mysql_fetch_array($resultado)){
					$zLista[$i] = new ClsPaginaCategoria();
					$zLista[$i]->id = $row['id'];
					$zLista[$i]->titulo = $row['titulo'];
					$zLista[$i]->alias = $row['alias'];
					$zLista[$i]->estado = $row['estado'];
					$zLista[$i]->total = $row['total'];
					$i++;
				}
				return $zLista;
			}else{
				return false;
			}
		}
 
 
 		public function ObtenerIdCategoriaMin() {
		
		 	$sql = 'SELECT 
			MIN(id) AS "MINIMO" FROM dx_pagina_categoria WHERE estado = 1';
			$resultado = mysql_query($sql);
			if($resultado){
				$row = mysql_fetch_assoc($resultado);
				return $row['MINIMO'];	
			}else{
				return false;	
			}
		}
		
	}
?>