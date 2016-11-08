<?php
	
class GestorConsultorio{


	public function consultarConsultorios()
	{
		$conexion = new conexion();
		
		$sql = "select CONNUMERO,CONNOMBRE
				from consultorios";

		$resultado = $conexion->consultar($sql);
		
		while (($fila= oci_fetch_array($resultado, OCI_BOTH))) {
    		$id = $fila[0];
    		$nombre = $fila[1];
    		echo "<option value=\"$id\"> $nombre</option>";
    
		}

	}



}
?>