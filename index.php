<?php 
session_start();

require_once 'Vista/html/utilidades.php';
require_once 'Controlador/controlador.php';
require_once 'Modelo/gestorCita.php';
require_once 'Modelo/gestorPaciente.php';
require_once 'Modelo/gestorMedicos.php';
require_once 'Modelo/GestorConsultorio.php';
require_once 'Modelo/cita.php';
require_once 'Modelo/paciente.php';
require_once 'Modelo/conexion.php';
require_once 'Modelo/gestorUsuario.php';

	$controlador = new Controlador();

	if(isset($_GET['accion'])){

		$accion = $_GET['accion'];

		if($accion=='asignar' || $accion=='cancelar'){

			if(!isset($_SESSION["usuario"]))
				$accion = 'inicio';
		}
			
		 
		switch ($accion) {

		case 'inicio':
				$controlador->verPagina("Vista/html/inicio.php");
				break;

			
		case 'asignar':
			$controlador->verPagina("Vista/html/asignar.php");
			break;

		case 'guardarCita':
		
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
		
			break;

		case 'consultarCitas':

			//$idPac = $_POST['consultarDocumento'];
			$idPac = $_GET['consultarDocumento'];

			//echo "Consultado paciente $idPac";
			$gestorCita = new GestorCita();
			$gestorCita->consultarCitasPorPac($idPac);

			break;

		case 'consultarCita':

			$idCita = $_GET['citnumero'];

			$gestorCita = new GestorCita();
			$fila = $gestorCita->consultarCitaPorId($idCita);

			include "Vista/html/header.php";
			include "Vista/html/confirmarCita.php";
			include "Vista/html/footer.php";

			break;	

		case 'consultar':
			$controlador->verPagina("Vista/html/consultar.php");
			break;		

		case 'cancelar':
			$controlador->verPagina("Vista/html/cancelar.php");
			break;

		case 'consultarPaciente':
			$doc = $_GET['documento'];

			$controlador->consultarPaciente($doc);
			
			break;

		case 'ingresarPaciente':
			
			$pacDocumento = $_GET["pacDocumento"];
			$pacNombres= $_GET["pacNombres"];
			$pacApellidos= $_GET["pacApellidos"];
			$pacFecha = $_GET["pacFecha"];
			$pacSexo = $_GET["pacSexo"];

			$controlador->ingresarPaciente($pacDocumento,$pacNombres,$pacApellidos,$pacFecha,$pacSexo);

			echo "Paciente agregado con exitosamente";

			break;

		case 'consultarHora':
			$medico = $_GET['medico'];
			$fecha = $_GET['fecha'];
			$gestorCita = new GestorCita();
			$gestorCita->conHorasPorMedicoFecha($medico,$fecha);

			break;

		case 'cancelarCita':
			$paciente = $_GET['paciente'];
			
			$gestorCita = new GestorCita();
			$gestorCita->concCitas($paciente);

			
			break;

		case 'confirmarCancelar':

			$citnumero = $_GET['citnumero'];
				
			$gestorCita = new GestorCita();
			$gestorCita->cancelar($citnumero);

			
			break;

		case 'login':
			$user = $_POST["user"];
			$pass = $_POST["password"];

			$gestorUsuario = new GestorUsuario();
			$rol = $gestorUsuario-> validar($user,$pass);

			if(isset($rol)){
				$_SESSION["usuario"]=$rol;

			}

			break;

		case 'cerrarSession':
			session_destroy();
			header('Location: index.php');
			break;
		}

	}
	else
	{
		$controlador->verPagina("Vista/html/inicio.php");
	}
	
 ?>