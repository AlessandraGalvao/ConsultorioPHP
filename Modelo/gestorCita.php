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

		$sql = "insert into citas values (
			CITAS_SEQ.nextval,
			to_date(:fecha,'dd/mm/yyyy'),
			to_date(:hora,'hh24:mi:ss'),
			:paciente,
			:medico,
			:consultorio,
			:estado,
			:observaciones) returning CITNUMERO into :id";

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
		
		$sql = "select 
		            pacientes.*,medicos.*,consultorios.*,citas.*, 
		            to_char(cithora, 'hh24:mi:ss') as hora 
		        from 
		           	pacientes,medicos,consultorios,citas 
		     	where 
		     		CitPaciente=PacIdentificacion AND 
		    		CitMedico=MedIdentificacion AND 
		    		CitConsultorio=ConNumero AND 
		    		--CitEstado = 'Solicitado' AND
		    		citas.CitNumero='$id'";

		$resultado = $conexion->consultar($sql);
		$fila= oci_fetch_array($resultado, OCI_BOTH);

		return $fila;

	}

	public function consultarCitasPorPac($pac)
	{
		$conexion = new conexion();
		
		$sql = "select 
					pacientes.*,
					medicos.*,
					consultorios.*,
					citas.*, 
					to_char(cithora, 'hh24:mi:ss') as hora 
				from 
					pacientes,medicos,consultorios,citas 
				where 
					CitPaciente=PacIdentificacion AND 
					CitMedico=MedIdentificacion AND 
					CitConsultorio=ConNumero AND 
					PacIdentificacion=$pac";

		$resultado = $conexion->consultar($sql);

		$cadena = "<table border=1>";
		$cadena .= "<tr> <td>Numero</td> <td>Fecha</td> <td>Hora</td><td>Accion</td> </tr>";

		while (($fila= oci_fetch_array($resultado, OCI_BOTH))) {
			echo "<tr>";
				//MAYUSCULAS COLUMNAS
    			$citid = $fila['CITNUMERO'];
    			$citfecha = $fila['CITFECHA'];
    			$cithora = $fila['HORA'];
    		$cadena .="<td>$citid</td> <td>$citfecha</td> <td>$cithora</td>";
    		$cadena .="<td> 
    					<a href='index.php?accion=consultarCita&citnumero=$citid'>Ver</a>
    				</td>";
    		$cadena .= "</tr>";
		}

		$cadena .= "</table>";

		$numrow = $conexion->numrows();		
		
		imprimir($cadena,$numrow,"No Existen citas para este paciente");
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

		$cadena = "";
		$conexion = new conexion();
		
	$sql = "select to_char(hora,'HH24:MI:SS')  
            from horas
        	where to_char(hora,'HH24:MI:SS') 
        	not in (
           		select to_char(cithora,'HH24:MI:SS') 
           		from citas
           		where citmedico='$med' and 
           		citfecha=to_date('$fec','dd/mm/yyyy') and 
           		citestado = 'Solicitado'
          	)
			order by hora";

		$resultado = $conexion->consultar($sql);

		while (($fila= oci_fetch_array($resultado, OCI_BOTH))) {
    		$hora = $fila[0];
    		$cadena .= "<option value=\"$hora\"> $hora</option>";
    
		}

		$numrow = $conexion->numrows();

		imprimir($cadena,$numrow,"<option value='-1'>No hay horas disponibles<option>");
	}

	public function concCitas($paciente){

		$conexion = new conexion();
		
		$sql = "select 
					citnumero,
					citfecha,
					to_char(cithora,'HH24:mi:ss') as hora
			 	from 
			 		citas
			 	where 
			 		citestado = 'Solicitado' AND
			 		citpaciente=$paciente"; 

		$resultado = $conexion->consultar($sql);

		$cadena= "<table border=1>";
		$cadena .= "<tr> <td>Numero</td> <td>Fecha</td> <td>Hora</td><td>Accion</td> </tr>";

		while (($fila= oci_fetch_array($resultado, OCI_BOTH))) {
			$cadena .= "<tr>";
    			$citid = $fila[0];
    			$citfecha = $fila[1];
    			$cithora = $fila[2];
    		$cadena .= "<td>$citid</td> <td>$citfecha</td> <td>$cithora</td>";
    		$cadena .="<td> <a href='#' onclick='confirmarCancelar($citid)'> Cancelar</a></td>";
    		$cadena .="</tr>";
		}

		$cadena .= "</table>";

		$numrow =  $conexion->numrows();
		
		imprimir($cadena,$numrow,"No se encontraron citas");


	}

	function cancelar($citnumero){

		$conexion = new conexion();
		
		$sql = "update citas set citestado = 'Cancelado'
			 	where citnumero=$citnumero"; 

		$numrow = $conexion->actualizar($sql);
		
		if($numrow==0)
			echo "ERROR. intentelo nuevamente";
		else
			echo "Cita Cancelada exitosamente";

	}


}

?>