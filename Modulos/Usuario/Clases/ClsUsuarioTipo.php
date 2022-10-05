<?php

	class ClsUsuarioTipo {
	
	
		public $id;		
		public $tipo;
				

		 function __construct
		 (
			$Oid = NULL,
			$Otipo = NULL
					
		  )
			{
				$this->id = $Oid;
				$this->tipo = $Otipo;
				
			}
		
							
		public function ObtenerTodos() {
		
			$sql = 'SELECT 
			dx.id, 						
			dx.tipo
			FROM dx_users_tipo AS dx';
			// echo $sql;			
			
			$resultado = mysql_query($sql);
			if($resultado){
				$zLista = NULL;
				$i = 0;
				while($row = mysql_fetch_array($resultado)){		
					$zLista[$i] = new ClsUsuarioTipo();
					$zLista[$i]->id = $row['id'];
					$zLista[$i]->tipo = $row['tipo'];
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
			dx.tipo
			FROM dx_users_tipo AS dx
			WHERE dx.id = '.mysql_real_escape_string($this->id);
			// echo $sql;			
			
			$resultado = mysql_query($sql);
			if($resultado){		
				$zLista = NULL;
				if($row = mysql_fetch_assoc($resultado)){
					$zLista = new ClsUsuarioTipo();
					$zLista->id = $row['id'];
					$zLista->tipo = $row['tipo'];
				}
				return $zLista;		
			}else{
				return false;	
			}
		}
		
	}
?>