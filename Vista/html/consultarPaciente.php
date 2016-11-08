<?php

	if(!$fila){
?>
		<p>El paciente no existe</p>
		<input type="button" name="ingPaciente" value="Ingresar Paciente" id="ingPaciente" onclick="mostrarFormulario()"/>

<?php
	}
	else{
		$identificacion = $fila['PACIDENTIFICACION'];
		$nombre = $fila['PACNOMBRES'];
		$sexo = $fila['PACSEXO'];

		echo "<table>
				<tr><th>Identificacion</th><th>Nombre</th><th>Sexo</th></tr>
				<tr>
					<td>$identificacion</td>
					<td>$nombre</td>
					<td>$sexo</td>
				</tr>
				</table>
				";
	}

?>