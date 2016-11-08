<?php 
require_once 'Controlador/controlador.php';
require_once 'Modelo/gestorCita.php';
require_once 'Modelo/gestorPaciente.php';
require_once 'Modelo/gestorMedicos.php';
require_once 'Modelo/GestorConsultorio.php';
require_once 'Modelo/cita.php';
require_once 'Modelo/paciente.php';
require_once 'Modelo/conexion.php';

	$controlador = new Controlador();

	if(isset($_GET['accion'])){

		$accion = $_GET['accion'];

		if($accion=='asignar')
			$controlador->verPagina("Vista/html/asignar.php");

		if($accion=='guardarCita')
		{
			$doc = $_POST['asignarDocumento'];
			$med = $_POST['medico'];
			$fec = $_POST['fecha'];
			$hor = $_POST['hora'];
			$con = $_POST['consultorio'];

			$cita = new Cita(null,$fec,$hor,$doc,$med,$con,"Solicitado","Ninguna");

			$gestorCita = new GestorCita();
			$idCita = $gestorCita->agregarCita($cita);
			$fila = $gestorCita->consultarCitaPorId($idCita);

			include "Vista/html/header.php";
			include "Vista/html/confirmarCita.php";
			include "Vista/html/footer.php";
		}

		if($accion == 'consultarCita'){

			$idPac = $_POST['consultarDocumento'];

			$gestorCita = new GestorCita();
			$fila = $gestorCita->consultarCitaPorPac($idPac);

			include "Vista/html/header.php";
			include "Vista/html/confirmarCita.php";
			include "Vista/html/footer.php";

		}		

		if($accion=='consultar')
			$controlador->verPagina("Vista/html/consultar.php");		

		if($accion=='cancelar')
			$controlador->verPagina("Vista/html/cancelar.php");

		if($accion=='consultarPaciente'){
			$doc = $_GET['documento'];

			$controlador->consultarPaciente($doc);
			
		}

		if($accion=='ingresarPaciente'){
			
			$pacDocumento = $_GET["pacDocumento"];
			$pacNombres= $_GET["pacNombres"];
			$pacApellidos= $_GET["pacApellidos"];
			$pacFecha = $_GET["pacFecha"];
			$pacSexo = $_GET["pacSexo"];

			$controlador->ingresarPaciente($pacDocumento,$pacNombres,$pacApellidos,$pacFecha,$pacSexo);

			echo "Paciente agregado con la ayuda de Dios...";

		}

		if($accion == 'consultarHora'){
			$medico = $_GET['medico'];
			$fecha = $_GET['fecha'];

			//$resultado = "<option>Consultando horas para el medico $medico en la fecha $fecha </option>";
			//echo $resultado;
			$gestorCita = new GestorCita();
		$gestorCita->conHorasPorMedicoFecha($medico,$fecha);

		}

		if($accion == 'cancelarCita'){
			$paciente = $_GET['paciente'];
			
			$gestorCita = new GestorCita();
			$gestorCita->conCitas($paciente);

			echo "consultando citas de $paciente";
		}	

			

	}
	else
	{
		$controlador->verPagina("Vista/html/inicio.php");
	}
	
 ?>