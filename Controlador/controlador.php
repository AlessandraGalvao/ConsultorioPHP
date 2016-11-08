<?php

require_once 'Modelo/gestorPaciente.php';

class Controlador{

	public function verPagina($ruta)
	{
		include "Vista/html/header.php";
		require_once $ruta;
		include "Vista/html/footer.php";
	}

	public function consultarPaciente($doc){
		$gestorPaciente = new GestorPaciente();
		$fila = $gestorPaciente->consultarPacientePorDoc($doc);

		include "Vista/html/consultarPaciente.php";

	}

	public function ingresarPaciente($pacDoc,$pacNom,$pacApe,$pacFec,$pacSex){
		$gestorPaciente = new GestorPaciente();

		$gestorPaciente->ingresarPaciente($pacDoc,$pacNom,$pacApe,$pacFec,$pacSex);
	}
	
}

?>