$(document).ready(
	function(){

		$("#fecha").datepicker({
			dateFormat: 'dd-mm-yy',
			changeMonth: true,
			changeYear: true
		});
		
		$("#pacFecha").datepicker({
			dateFormat: 'dd-mm-yy',
			changeMonth: true,
			changeYear: true
		});

		$("#frmPaciente").dialog({
			autoOpen: false,
			height: 310,
			width: 400,
			modal: true,
			buttons: [
			{
				text: "Insertar",
				click: insertarPaciente
			},
			{
				text: "cancelar",
				click: cerrarDialogo
			}
			]
			
		});
	}

);

function cerrarDialogo(){
	$(this).dialog("close");
}

function mostrarFormulario(){
	documento = ""+$("#asignarDocumento").val();
	$("#pacDocumento").attr("value",documento);
	$("#frmPaciente").dialog("open");
}

function consultarPaciente(){

	var doc = $("#asignarDocumento").val();

	//alert("info"+doc);

	url="index.php?accion=consultarPaciente&documento="+doc;
	$("#paciente").load(url);
}

function insertarPaciente(){
	$(this).dialog("close");
	queryString = $("#agregarPaciente").serialize();
	url = "index.php?accion=ingresarPaciente&"+queryString;
	$("#paciente").load(url);
}

function cargarHoras(){
	medico = $("#medico").val();
	fecha = $("#fecha").val();

	//alert(fecha);
	if(medico==-1 || fecha==""){
		$("#hora").html("<option value='-1' selected='selected'>--Seleccione la hora--</option>");
	}
	else
	{
		queryString = "medico="+medico+"&fecha="+fecha;
		url = "index.php?accion=consultarHora&"+queryString;
		$("#hora").load(url);
	}
}

function cancelarCita(){

	pac = $("#cancelarDocumento").val();
	url = "index.php?accion=cancelarCita&paciente="+pac;
	$("#paciente3").load(url);
}
