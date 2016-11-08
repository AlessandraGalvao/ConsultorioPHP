<?php

class Conexion
{
	private $conn;
	private $user;
	private $pass;
	private $host;
		

	function __construct()
	{
		$this->user = "consultorio";
		$this->pass = "consultorio777.";
		$this->host = "localhost/XE";
		$this->conn = oci_connect($this->user, $this->pass,$this->host);

		/*if(!$this->conn)
		{
			echo "Problemas...";
			return 0;

		}
		else
		{
			//echo "Conexion exitosa...";
			return $this->conn;

		}*/

	}

	public function getConn()
	{
		return $this->conn;

	}

	public function insertarSQL($sql)
	{
		$stm = oci_parse($this->con, $sql);
		$resultado = oci_execute($stmt);
		return $resultado;

	}

	public function insertarSTMT($stmt)
	{
		$resultado = oci_execute($stmt);
		return $resultado;

	}

	public function consultar($sql)
	{
		
		$resultado = oci_parse($this->conn, $sql);
		oci_execute($resultado);
		return $resultado;

	}

}

?>