
<h2>Consultar</h2>
<form action="index.php?accion=consultarCita" method="post" id="frmConsultar">
<table>
	<tr>
		<td>Documento del paciente</td>
		<td><input type="text" name="consultarDocumento" id="consultarDocumento" /></td>
	</tr>
	<tr>
		<td colspan="2"><input type="button" name="consultar" value="consultar" id="consultar" onclick="consultarCitas()"></td>	
	</tr>
	<tr>
		<td colspan="2"><div id="paciente2"></div></td>
	</tr>
</table>
</form>
