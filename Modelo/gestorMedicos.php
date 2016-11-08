<?php
	
class GestorMedicos{


	public function consultarMedicos()
	{
		$conexion = new conexion();
		
		$sql = "select MEDIDENTIFICACION, MEDNOMBRE, MEDAPELLIDOS
				from medicos";

		$resultado = $conexion->consultar($sql);
		
		while (($fila= oci_fetch_array($resultado, OCI_BOTH))) {
    		$id = $fila[0];
    		$nombre = $fila[1]." ". $fila[2];
    		echo "<option value=\"$id\"> $nombre</option>";
    
		}

	}



}
?>