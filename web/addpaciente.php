<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Añadir Paciente</title>

	<link href="jQueryAssets/jquery.ui.core.min.css" rel="stylesheet" type="text/css">
	<link href="jQueryAssets/jquery.ui.theme.min.css" rel="stylesheet" type="text/css">
	<link href="jQueryAssets/jquery.ui.datepicker.min.css" rel="stylesheet" type="text/css">
	<script src="jQueryAssets/jquery-1.8.3.min.js" type="text/javascript"></script>
	<script src="jQueryAssets/jquery-ui-1.9.2.datepicker.custom.min.js" type="text/javascript"></script>
	<script src="jQueryAssets/i18n/jquery.ui.datepicker-es.js" type="text/javascript"></script>
	<script type="text/javascript">
	function validarLetras(e) { // 1
		tecla = (document.all) ? e.keyCode : e.which; 
			if (tecla==8) return true; // backspace
		if (tecla==9) return true; // tabulador
				if (tecla==32) return true; // espacio
				if (e.ctrlKey && tecla==86) { return true;} //Ctrl v
				if (e.ctrlKey && tecla==67) { return true;} //Ctrl c
				if (e.ctrlKey && tecla==88) { return true;} //Ctrl x

				patron = /[a-zA-Z]/; //patron

				te = String.fromCharCode(tecla); 
				return patron.test(te); // prueba de patron
			}    

		function validarNumeros(e) { // 1
				tecla = (document.all) ? e.keyCode : e.which; // 2
				if (tecla==8) return true; // backspace
				if (tecla==109) return true; // menos
		    if (tecla==110) return true; // punto
				if (tecla==189) return false; // guion
				if (e.ctrlKey && tecla==86) { return true}; //Ctrl v
				if (e.ctrlKey && tecla==67) { return true}; //Ctrl c
				if (e.ctrlKey && tecla==88) { return true}; //Ctrl x
				if (tecla>=96 && tecla<=105) { return true;} //numpad

				patron = /[0-9]/; // patron

				te = String.fromCharCode(tecla); 
				return patron.test(te); // prueba
			}
			</script>
		</head>

		<body>
			<div class="widget">
				<h4 class="widgettitle">Añadir Paciente</h4>
				<div class="widgetcontent nopadding">
					<form id="form1" class="stdform stdform2" action="gpaciente.php?accion=nuevo" method="post">                
						<p>
							<label>Cedula</label>                       
							<span class="field">
								<input name="cedula" type="text" onkeydown="return validarNumeros(event)" size="30" required class="input-large" placeholder="Numero" />
								<input name="tipo_cedula" type="radio" required value="V" /> V &nbsp;&nbsp; 
								<input name="tipo_cedula" type="radio" required value="E" /> E &nbsp;&nbsp;
							</span>
						</p>
            <p>
						<label>Nombres</label>
						<span class="field">  
							<input name="nombre1" type="text" onKeyDown="return validarLetras(event)" size="40" required class="input-large" placeholder="Primer Nombre" />
							<input name="nombre2" type="text" onKeyDown="return validarLetras(event)" size="40" class="input-large" placeholder="Segundo Nombre" />                  	</span>
						</p><p>
						<label>Apellidos</label>
						<span class="field">  
							<input name="apellido1" type="text" onKeyDown="return validarLetras(event)" size="40" required class="input-large" placeholder="Primer Apellido" />
							<input name="apellido2" type="text" onKeyDown="return validarLetras(event)" size="40"  class="input-large" placeholder="Segundo Apellido" />                  	</span>
						</p><p>
						<label>Fecha de Nacimiento</label>
						<span class="field">
							<input type="text" name="fecha_nacimiento" id="fecha_nacimiento"/>
						</span>
					</p><p>
					<label>Genero</label>                       
					<span class="field">
						<input name="genero" type="radio" required value="F" /> F &nbsp;&nbsp; 
						<input name="genero" type="radio" required value="M" /> M &nbsp;&nbsp;
					</span>
				</p><p>
				<label>Telefonos</label>                       
				<span class="field">
					<input name="telefono" type="text" onkeydown="return validarNumeros(event)" required class="input-large" id="telefono" placeholder="Solo Números">
					<input name="telefono2" type="tel" onkeydown="return validarNumeros(event)" class="input-large" id="telefono2" placeholder="04141234567">
				</span>                 
			</p>
			<p class="stdformbutton">
				<button class="btn btn-primary"><span class="iconfa-plus"></span> Añadir Paciente</button>
				<button type="reset" class="btn"><i class=" iconfa-refresh icon-white"></i> Restablecer</button>
			</p> 
		</form>
	</div>
</div>
<script type="text/javascript">
$(document).ready(function(){  
	$("#form1").submit(function () {  

		if($("#cedula").val().length < 4)
		{
			alert("Cedula debe ser un valor numerico");  
			return false;  
		}
		if($("#nombre1").val().length < 4) 
		{  
			alert("El nombre debe tener más de 3 caracteres");  
			return false;  
		}  
		if($("#apellido1").val().length < 4) 
		{  
			alert("El apellido debe tener más de 3 caracteres");  
			return false;  
		}  
		
	});  
});

$(function() {
	$( "#fecha_nacimiento" ).datepicker(
		$.extend(
			$.datepicker.regional['es'],
			{
				changeMonth:true,
				changeYear:true,
				dateFormat:"yy-mm-dd",	
			}
			)
		); 
});
</script>
</body>

</html>