<?php
class ClsCliente extends ClsPDO
{
	public function ListarCliente($limite,$pagina,$busqueda){
		$consulta = parent::Ejecutar("ListarCliente(".$limite.",".$pagina.",'".$busqueda."')");
		return parent::querySelect($consulta);
	}
	public function ListarClienteTotal($busqueda) {
		$consulta = parent::Ejecutar("ListarClienteTotal('".$busqueda."')");
		return parent::querySelect($consulta,1);
	}
	public function EliminarCliente($id){
		$consulta = parent::Ejecutar("EliminarCliente(".$id.")");
		return parent::CallSelect($consulta);
	}
	public function ListaPaises(){
		$consulta = parent::Ejecutar("ListaPaises()");
		return parent::querySelect($consulta);
	}
	public function AgregarCliente($nombre,$apellidos,$razon,$direccion,$idpais,$cuidad,$email,$celular,$documento,$estado,$nota,$contrasena,$manzana,$lote){
		$consulta = parent::Ejecutar("AgregarCliente('".$nombre."','".$apellidos."','".$razon."','".$direccion."',".$idpais.",'".$cuidad."','".$email."','".$celular."','".$documento."',".$estado.",'".$nota."','".$contrasena."','".$manzana."','".$lote."')");
		return parent::CallSelect($consulta);
	}
	public function EditarCliente($id,$nombre,$apellidos,$razon,$direccion,$idpais,$cuidad,$email,$celular,$documento,$estado,$nota,$contrasena,$manzana,$lote){
		$consulta = parent::Ejecutar("EditarCliente(".$id.",'".$nombre."','".$apellidos."','".$razon."','".$direccion."',".$idpais.",'".$cuidad."','".$email."','".$celular."','".$documento."',".$estado.",'".$nota."','".$contrasena."','".$manzana."','".$lote."')");
		return parent::CallSelect($consulta);
	}
	public function ObtenerCliente($id) {
		$consulta = parent::Ejecutar("ObtenerCliente(".$id.")");
		return parent::querySelect($consulta,2);
	}
}
?>
