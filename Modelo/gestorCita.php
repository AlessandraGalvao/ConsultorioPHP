<?php
	
class GestorCita{

	public function agregarCita(Cita $cita)
	{

		$conn = new Conexion();
		$id=0;
		$fecha = $cita->getFecha();
		$hora =  $cita->getHora();
		$paciente =  $cita->getPaciente();
		$medico =  $cita->getMedico();
		$consultorio =  $cita->getConsultorio();
		$estado =  $cita->getEstado();
		$observaciones =  $cita->getObservaciones();

		$sql = "insert into citas values (CITAS_SEQ.nextval,to_date(:fecha,'dd/mm/yyyy'),to_date(:hora,'hh24:mi:ss'),:paciente,:medico,:consultorio,:estado,:observaciones) returning CITNUMERO into :id";

		$stmt = oci_parse($conn->getConn(), $sql);

		oci_bind_by_name($stmt,":id",$id,-1,SQLT_INT);
		oci_bind_by_name($stmt,":fecha",$fecha);
		oci_bind_by_name($stmt,":hora",$hora);
		oci_bind_by_name($stmt,":paciente",$paciente);
		oci_bind_by_name($stmt,":medico",$medico);
		oci_bind_by_name($stmt,":consultorio",$consultorio);
		oci_bind_by_name($stmt,":estado",$estado);
		oci_bind_by_name($stmt,":observaciones",$observaciones);

		oci_execute($stmt);

		return $id;
	}

	public function consultarCitaPorId($id)
	{
		$conexion = new conexion();
		
		$sql = "select pacientes.*,medicos.*,consultorios.*,citas.*, to_char(cithora, 'hh24:mi:ss') as hora from pacientes,medicos,consultorios,citas where citas.CitPaciente=pacientes.PacIdentificacion AND citas.CitMedico=medicos.MedIdentificacion AND citas.CitConsultorio=consultorios.ConNumero AND citas.CitNumero='$id'";

		$resultado = $conexion->consultar($sql);
		$fila= oci_fetch_array($resultado, OCI_BOTH);

		//pendiente de hacer un arreglo
		/*
		$PacIdentificacion= $fila['PACIDENTIFICACION'];
		$PacNombres= $fila['PACNOMBRES'];
		$PacApellidos= $fila['PACAPELLIDOS'];
		$MedIdentificacion= $fila['MEDIDENTIFICACION'];
		$MedNombre= $fila['MEDNOMBRE'];
		$CitNumero= $fila['CITNUMERO'];
		$CitFecha= $fila['CITFECHA'];
		$ConNumero= $fila['CONNUMERO'];
		$ConNombre= $fila['CONNOMBRE'];
		$CitEstado= $fila['CITESTADO'];
		$CitObservaciones= $fila['CITOBSERVACIONES'];
		*/

		return $fila;

	}

	public function consultarCitaPorPac($pac)
	{
		$conexion = new conexion();
		
		$sql = "select pacientes.*,medicos.*,consultorios.*,citas.*, to_char(cithora, 'hh24:mi:ss') as hora from pacientes,medicos,consultorios,citas where citas.CitPaciente=pacientes.PacIdentificacion AND citas.CitMedico=medicos.MedIdentificacion AND citas.CitConsultorio=consultorios.ConNumero AND pacientes.PacIdentificacion='$pac' AND
			rownum <=1
			order by citnumero desc";

		$resultado = $conexion->consultar($sql);
		$fila= oci_fetch_array($resultado, OCI_BOTH);

		return $fila;

	}

	public function consultarCitaPorDocumento($doc)
	{
		$conexion = new conexion();
		
		$sql = "select citas.* from citas 
				where CitPaciente= '$doc' AND
				citEstado='solicitado'";

		$resultado = $conexion->consultar($sql);

		return $resultado;

	}

	public function conHorasPorMedicoFecha($med,$fec){

		$conexion = new conexion();
		
$sql = "select to_char(hora,'HH24:MI:SS')  
        from horas
        where to_char(hora,'HH24:MI:SS') 
        not in (
           select to_char(cithora,'HH24:MI:SS') 
           from citas
           where citmedico='$med' and 
           citfecha=to_date('$fec','dd/mm/yyyy')
          )
		order by hora";

		$resultado = $conexion->consultar($sql);

		while (($fila= oci_fetch_array($resultado, OCI_BOTH))) {
    		$hora = $fila[0];
    		echo "<option value=\"$hora\"> $hora</option>";
    
		}

		//return $resultado;
	}

}

?>