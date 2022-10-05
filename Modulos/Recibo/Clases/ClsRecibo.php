<?php
	class ClsRecibo extends ClsPDO
	{
		public function GenerarRecibos($idciclo) {
			$consulta = parent::Ejecutar("GenerarRecibos(".$idciclo.")");
			return parent::querySelect($consulta,2);
		}
		public function CambiarEstadoVerificadoTodos($idciclo) {
			$consulta = parent::Ejecutar("CambiarEstadoVerificadoTodos(".$idciclo.")");
			return parent::querySelect($consulta,2);
		}
		public function CambiarEstadoVerificado($idrecibo) {
			$consulta = parent::Ejecutar("CambiarEstadoVerificado(".$idrecibo.")");
			return parent::querySelect($consulta,2);
		}
		public function CambiarEstadoPagado($idrecibo) {
			$consulta = parent::Ejecutar("CambiarEstadoPagado(".$idrecibo.")");
			return parent::querySelect($consulta,2);
		}
		public function TotalesCiclo($idciclo) {
			$consulta = parent::Ejecutar("TotalesCiclo(".$idciclo.")");
			return parent::querySelect($consulta,2);
		}
		public function LecturaActual($idrecibo) {
			$consulta = parent::Ejecutar("LecturaActual(".$idrecibo.")");
			return parent::querySelect($consulta,1);
		}
		public function ConsultaVerificadosTodos($idciclo) {
			$consulta = parent::Ejecutar("ConsultaVerificadosTodos(".$idciclo.")");
			return parent::querySelect($consulta,1);
		}
		public function ListarCicloRecibo() {
			$consulta = parent::Ejecutar("ListarCicloRecibo()");
			return parent::querySelect($consulta);
		}
		public function ListarRecibo($limite,$pagina,$busqueda,$idciclo){
			$consulta = parent::Ejecutar("ListarRecibo(".$limite.",".$pagina.",'".$busqueda."',".$idciclo.")");
			return parent::querySelect($consulta);
		}
		public function ListarReciboUno($idrecibo){
			$consulta = parent::Ejecutar("ListarReciboUno(".$idrecibo.")");
			return parent::querySelect($consulta);
		}
		public function DatosGrafico($idcliente){
			$consulta = parent::Ejecutar("DatosGrafico(".$idcliente.")");
			return parent::querySelect($consulta);
		}
		public function ListarReciboTotal($busqueda,$idciclo) {
			$consulta = parent::Ejecutar("ListarReciboTotal('".$busqueda."',".$idciclo.")");
			return parent::querySelect($consulta,1);
		}
		public function ListarReciboTotal_A($idciclo) {
			$consulta = parent::Ejecutar("ListarReciboTotal_A(".$idciclo.")");
			return parent::querySelect($consulta,1);
		}
		public function ActualizarLecturaActual($idrecibo,$lectura_nueva) {
            $consulta = parent::Ejecutar("ActualizarLecturaActual(".$idrecibo.",".$lectura_nueva.")");
            return parent::CallSelect($consulta);
        }
	}
?>