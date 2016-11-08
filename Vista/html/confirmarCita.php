<?php
	
	$PacIdentificacion= $fila['PACIDENTIFICACION'];
	$PacNombres= $fila['PACNOMBRES'];
	$PacApellidos= $fila['PACAPELLIDOS'];
	$MedIdentificacion= $fila['MEDIDENTIFICACION'];
	$MedNombre= $fila['MEDNOMBRE'];
	$CitNumero= $fila['CITNUMERO'];
	$CitFecha= $fila['CITFECHA'];
	$CitHora= $fila['HORA'];
	$ConNumero= $fila['CONNUMERO'];
	$ConNombre= $fila['CONNOMBRE'];
	$CitEstado= $fila['CITESTADO'];
	$CitObservaciones= $fila['CITOBSERVACIONES'];
	
?>

<h2>Informacion de la Cita</h2>
<table>
	<tr><th colspan="2">Datos del Paciente</th></tr>
	<tr>
		<td>Documento</td>
		<td><?php echo $PacIdentificacion; ?></td>
	</tr>
	<tr>
		<td>Nombre</td>
		<td><?php echo $PacNombres." ".$PacApellidos; ?></td>
	</tr>
	<tr>
		<th colspan="2">Datos del Medico</th>
	</tr>
	<tr>
		<td>Documento</td>
		<td><?php echo $MedIdentificacion; ?></td>
	</tr>
	<tr>
		<td>Nombre</td>
		<td><?php echo $MedNombre; ?></td>
	</tr>
	<tr>
		<th colspan="2">Datos de la cita</th>
	</tr>
	<tr>
		<td>Numero</td>
		<td><?php echo $CitNumero; ?></td>
	</tr>
	<tr>
		<td>Fecha</td>
		<td><?php echo $CitFecha; ?></td>
	</tr>
	<tr>
		<td>Hora</td>
		<td><?php echo $CitHora; ?></td>
	</tr>
	<tr>
		<td>Numero del Consultorio</td>
		<td><?php echo $ConNumero; ?></td>
	</tr>
	<tr>
		<td>Nombre del Consultorio</td>
		<td><?php echo $ConNombre; ?></td>
	</tr>
	<tr>
		<td>Estado</td>
		<td><?php echo $CitEstado; ?></td>
	</tr>
	<tr>
		<td>Observaciones</td>
		<td><?php echo $CitObservaciones; ?></td>
	</tr>
</table>