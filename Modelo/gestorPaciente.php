<?php
	
class GestorPaciente{


	public function consultarPacientePorDoc($doc)
	{
		$conexion = new conexion();
		
		$sql = "select *
				from pacientes 
				where PACIDENTIFICACION='$doc'";

		$resultado = $conexion->consultar($sql);
		$fila= oci_fetch_array($resultado, OCI_BOTH);

		return $fila;

	}

	public function ingresarPaciente($pacDoc,$pacNom,$pacApe,$pacFec,$pacSex)
	{

		$conn = new Conexion();

		$id=0;

		$sql = "insert into pacientes values
				(:doc,:nom,:ape,to_date(:fecha,'dd/mm/yyyy'),:sex)";

		$stmt = oci_parse($conn->getConn(), $sql);

		oci_bind_by_name($stmt,":doc",$pacDoc);
		oci_bind_by_name($stmt,":nom",$pacNom);
		oci_bind_by_name($stmt,":ape",$pacApe);
		oci_bind_by_name($stmt,":fecha",$pacFec);
		oci_bind_by_name($stmt,":sex",$pacSex);
		
		oci_execute($stmt);

		
	}

}
?>