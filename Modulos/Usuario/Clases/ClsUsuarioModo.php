<?php
	class ClsUsuarioModo {

		public $id;		
		public $tipo;
				

		 function __construct($Oid = NULL, $Otipo = NULL){
				$this->id = $Oid;
				$this->tipo = $Otipo;
		}
		
		public function ObtenerTodos() {
		
			$sql = 'SELECT 
			dx.id, 						
			dx.tipo
			FROM dx_users_modo AS dx';
			// echo $sql;			
			
			$resultado = mysql_query($sql);
			if($resultado){
				$i = 0;
				$zLista = NULL;
				while($row = mysql_fetch_array($resultado)){		
					$zLista[$i] = new ClsUsuarioModo();
					$zLista[$i]->id = $row['id'];
					$zLista[$i]->tipo = $row['tipo'];
				$i++;		
				}
				return $zLista;		
			}else{
				return false;	
			}
		}
		
		public function ObtenerTodosModo() {
		
			$sql = 'SELECT 
			dx.id, 						
			dx.tipo,
			(SELECT COUNT(*) FROM dx_descarga_categoria dxx WHERE dxx.idmodo = dx.id) AS "total" 
			FROM dx_users_modo AS dx';
			
			$resultado = mysql_query($sql);
			if($resultado){
				$i = 0;
				$zLista = NULL;
				while($row = mysql_fetch_array($resultado)){		
					$zLista[$i] = new ClsUsuarioModo();
					$zLista[$i]->id = $row['id'];
					$zLista[$i]->tipo = $row['tipo'];
					$zLista[$i]->total = $row['total'];
				$i++;		
				}
				return $zLista;		
			}else{
				return false;	
			}
		}
		
	}
?>