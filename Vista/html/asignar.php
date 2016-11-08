<h2>Asignar</h2>
<form action="index.php?accion=guardarCita" method="post" id="frmasignar">
<table>
	<tr>
		<td>Documento del paciente</td>
		<td><input type="text" name="asignarDocumento" id="asignarDocumento"/></td>
	</tr>
	<tr>
		<td colspan="2">
			<input type="button" name="asignarConsulta" value="Consultar" id="asignarConsultar" onclick="consultarPaciente()">
		</td>
	</tr>
	<tr>
		<td colspan="2">
			<div id="paciente"></div>
		</td>
	</tr>
	<tr>
		<td>Medico</td>
		<td>
			<select id="medico" name="medico" onchange="cargarHoras()">
				<option value="-1" selected="selected">--Seleccione el medico--</option>
				<?php
					$gestorMedicos = new gestorMedicos();
					$gestorMedicos->consultarMedicos();
				?>
			</select>
		</td>
	</tr>
	<tr>
		<td>Fecha</td>
		<td><input type="text" name="fecha" id="fecha" onchange="cargarHoras()"/></td>
	</tr>
		<td>Hora</td>
		<td><select id="hora" name="hora">
				<option value="-1" selected="selected">--Seleccione la hora--</option>
			</select>
		</td>
	</tr>
	<tr>
		<td>Consultorio</td>
		<td><select id="consultorio" name="consultorio">
				<option value="-1" selected="selected">--Seleccione el consultorio--</option>
				<?php
					$consultorios = new GestorConsultorio();
					$consultorios -> consultarConsultorios();
				?>

			</select>
		</td>
	</tr>
	<tr>
		<td colspan="2"><input type="submit" name="asignarEnviar" value="Enviar" id="asignarEnviar"></td>
	</tr>
</table>
</form>

<div id="frmPaciente" title="Agregar nuevo Paciente">
<form id="agregarPaciente">
<table>
	<tr>
		<td>Documento</td>
		<td><input type="text" name="pacDocumento" id="pacDocumento" readonly="readonly"></td>
	</tr>
	<tr>
		<td>Nombres</td>
		<td><input type="text" name="pacNombres" id="pacNombres"></td>
	</tr>
	<tr>
		<td>Apellidos</td>
		<td><input type="text" name="pacApellidos" id="pacApellidos"></td>
	</tr>
	<tr>
		<td>Fecha de Nacimiento</td>
		<td><input type="date" name="pacFecha" id="pacFecha"></td>
	</tr>
	<tr>
		<td>Sexo</td>
		<td><select name="pacSexo" id="pacSexo">
				<option value="-1" selected="selected">---Seleccione Sexo</option>
				<option>M</option>
				<option>F</option>
			</select>
		</td>
	</tr>
</table>
</form>
</div>