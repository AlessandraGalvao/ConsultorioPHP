<?php
class Cita{
	
	private $numero;
	private $fecha;
	private $hora;
	private $paciente;
	private $medico;
	private $consultorio;
	private $estado;
	private $observaciones;

	public function __construct($num,$fec,$hor,$pac,$med,$con,$est,$obs)
	{
		$this->numero=$num;
		$this->fecha=$fec;
		$this->hora=$hor;
		$this->paciente=$pac;
		$this->medico=$med;
		$this->consultorio=$con;
		$this->estado=$est;
		$this->observaciones=$obs;

	}

	public function getNumero()
	{
		return $this->numero;
	}

	public function getFecha()
	{
		return $this->fecha;
	}

	public function getHora()
	{
		return $this->hora;
	}

	public function getPaciente()
	{
		return $this->paciente;
	}

	public function getMedico()
	{
		return $this->medico;
	}

	public function getConsultorio()
	{
		return $this->consultorio;
	}

	public function getEstado()
	{
		return $this->estado;
	}

	public function getObservaciones()
	{
		return $this->observaciones;
	}
}

?>