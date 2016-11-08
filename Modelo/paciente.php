<?php

include "Modelo/conexion.php";

class Paciente{

	private $identificacion;
	private $nombres;
	private $apellidos;
	private $fechaNacimiento;
	private $sexo;

	public function __construct($id,$nom,$ape,$fNac,$sex)
	{
		
		$this->identificacion=$id;
		$this->nombres=$nom;
		$this->apellidos=$ape;
		$this->fechaNacimiento=$fNac;
		$this->sexo=$sex;

		//faltaba doble _ __
		//echo "Constructor ".$this->identificacion." ". $this->nombres;

	}

	public function getIdentificacion()
	{
		return $this->identificacion;
	}

	public function getNombres()
	{
		return $this->nombres;
	}

	public function getApellidos()
	{
		return $this->apellidos;
	}

	public function getFechaNacimiento()
	{
		return $this->fechaNacimiento;
	}

	public function getSexo()
	{
		return $this->sexo;
	}

	public function insertarPaciente(){

		$con = new Conexion();

		$sql = "insert into pacientes values
				(:doc,:nom,:ape,to_date(:fecha,'dd-mm-yyyy'),:sex)";

		$stmt = oci_parse($con->getConn(), $sql);

		oci_bind_by_name($stmt,":doc",$this->identificacion);
		oci_bind_by_name($stmt,":nom",$this->nombres);
		oci_bind_by_name($stmt,":ape",$this->apellidos);
		oci_bind_by_name($stmt,":fecha",$this->fechaNacimiento);
		oci_bind_by_name($stmt,":sex",$this->sexo);

			
		$con->insertarSTMT($stmt);

	}
}

?>