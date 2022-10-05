<?php
	class ClsCiclo extends ClsPDO
	{
		public function ListarCiclo($limite,$pagina,$busqueda){
			$consulta = parent::Ejecutar("ListarCiclo(".$limite.",".$pagina.",'".$busqueda."')");
			return parent::querySelect($consulta);
		}
		public function ListarCicloTotal($busqueda) {
			$consulta = parent::Ejecutar("ListarCicloTotal('".$busqueda."')");
			return parent::querySelect($consulta,1);
		}
		public function VerVariables($id) {
			$consulta = parent::Ejecutar("VerVariables(".$id.")");
			return parent::querySelect($consulta,2);
		}
		public function CrearCiclo($mes,$anio,$inicio,$fin) {
			$consulta = parent::Ejecutar("CrearCiclo(".$mes.",'".$anio."',".$inicio.",".$fin.")");
			return parent::querySelect($consulta,2);
		}
		public function EliminarCiclo($id) {
			$consulta = parent::Ejecutar("EliminarCiclo(".$id.")");
			return parent::querySelect($consulta,2);
		}
		public function GuardarVariables($id,$tarifa,$acometida,$medidor,$sistema,$electronico,$costo_kwh,$alumbrado_p,$cargo_fijo,$mantenimiento,$igv,$derecho_r,$interes_c) {
            $consulta = parent::Ejecutar("GuardarVariables(".$id.",'".$tarifa."','".$acometida."','".$medidor."','".$sistema."','".$electronico."',".$costo_kwh.",".$alumbrado_p.",".$cargo_fijo.",".$mantenimiento.",".$igv.",".$derecho_r.",".$interes_c.")");
            return parent::CallSelect($consulta);
        }
	}
?>
