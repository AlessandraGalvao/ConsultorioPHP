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

		$("#divLogin").dialog({
			autoOpen: false,
			height: 200,
			width: 350,
			modal: true,
			buttons: [
			{
				text: "Login",
				click: validarLogin
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

function consultarCitas(){

	docPac=$("#consultarDocumento").val();
	url = "index.php?accion=consultarCitas&consultarDocumento="+docPac;
	$("#paciente2").load(url);
}

function cancelarCita(){

	pac = $("#cancelarDocumento").val();
	url = "index.php?accion=cancelarCita&paciente="+pac;
	$("#paciente3").load(url);
}

function confirmarCancelar(citid){
	
	if(confirm("Esta seguro que desea cancelar")){

		$.get("index.php",
			   { accion: "confirmarCancelar",
			   	 citnumero: citid	
			   },
			   function(resultado){
			   		alert(resultado);
			   }

			);

	}

	$("#btncancelar").trigger("click");

}

function validarLogin(){
	//alert("validando...");

	user = $("#user").val();
	password = $("#password").val();

	$.ajax({
			url: "index.php?accion=login",
			type: "POST",
			data: {
				user: user,
				password: password
			},
		 	success: function(result){
        			//$("#resultado").html(result);
        			//alert("ok"+result);
        			location.href = "index.php";
    			}
		});

}

function cerrarSession(){

	$.get("index.php?accion=cerrarSession");
	location.href = "index.php";
}

function mostrarLogin(){

	$("#divLogin").dialog("open");
}