<?php
class GestorUsuario{

	public function validar($user,$pass){

		$conexion = new conexion();

		$sql = "select rol from usuarios where username='$user' and password='$pass'";

		$resultado = $conexion->consultar($sql);
		$fila = oci_fetch_array($resultado, OCI_BOTH);
		$rol = $fila[0];
		
		//$numrow =  $conexion->numrows();

		return $rol;

	}

}


?>