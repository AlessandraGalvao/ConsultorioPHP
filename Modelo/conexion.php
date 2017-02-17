<?php

class Conexion
{
	private $conn;
	private $user;
	private $pass;
	private $host;
	private $stm;
		

	function __construct()
	{
		$this->user = "consultorio";
		$this->pass = "consultorio777.";
		$this->host = "localhost/XE";
		$this->conn = oci_connect($this->user, $this->pass,$this->host);

		$this->numrow=0;

		if(!$this->conn)
		{
			$e = oci_error();   // For oci_connect errors do not pass a handle
    		trigger_error(htmlentities($e['message']), E_USER_ERROR);
			//echo "Problemas...";
			//return 0;

		}
		else
		{
			//echo "Conexion exitosa...";
			return $this->conn;

		}

	}

	public function getConn()
	{
		return $this->conn;

	}

	public function insertarSQL($sql)
	{
		$this->stm = oci_parse($this->con, $sql);
		$resultado = oci_execute($this->stm);
		return $resultado;

	}

	public function insertarSTMT($stmt)
	{
		$resultado = oci_execute($stmt);
		return $resultado;

	}

	public function consultar($sql)
	{
		
		$this->stm = oci_parse($this->conn, $sql);
		$resultado= oci_execute($this->stm);
		return $this->stm;

	}

	public function actualizar($sql)
	{
		$this->stm = oci_parse($this->conn, $sql);
		$resultado = oci_execute($this->stm);
		return oci_num_rows($this->stm);

	}

	public function numrows(){
		return oci_num_rows($this->stm);
	}

}

?>