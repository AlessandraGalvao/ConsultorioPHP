
<h2>Cancelar</h2>
<form action="index.php?accion=cancelarCita" method="post" id="frmCancelar">
<table>
	<tr>
		<td>Documento del paciente</td>
		<td><input type="text" name="cancelarDocumento" id="cancelarDocumento" /></td>
	</tr>
	<tr>
		<td colspan="2">
		<input type="button" name="cancelar" value="consultar" id="cancelar" onclick="cancelarCita()">
		</td>	
	</tr>
	<tr>
		<td colspan="2"><div id="paciente3"></div></td>
	</tr>
</table>
</form>
