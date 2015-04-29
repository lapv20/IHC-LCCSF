<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Añadir Empleado</title>


<link href="jQueryAssets/jquery.ui.core.min.css" rel="stylesheet" type="text/css">
<link href="jQueryAssets/jquery.ui.theme.min.css" rel="stylesheet" type="text/css">
<link href="jQueryAssets/jquery.ui.datepicker.min.css" rel="stylesheet" type="text/css">
<script src="jQueryAssets/jquery-1.8.3.min.js" type="text/javascript"></script>
<script src="jQueryAssets/jquery-ui-1.9.2.datepicker.custom.min.js" type="text/javascript"></script>
<script src="jQueryAssets/i18n/jquery.ui.datepicker-es.js" type="text/javascript"></script>
</head>

<body>
<div class="widget">
<h4 class="widgettitle">Añadir Empleado</h4>
<div class="widgetcontent nopadding">
		<form class="stdform stdform2" action="gempleado.php?action=nuevo" method="post">                
		 <p>
			 <label>Cedula</label>                       
				<span class="field">
						<input name="cedula" type="text" required class="input-large" placeholder="Numero" />
							<input name="tipo_cedula" type="radio" required value="V" /> V &nbsp;&nbsp; 
							<input name="tipo_cedula" type="radio" required value="E" /> E &nbsp;&nbsp;
				 </span>
		</p><p>       
				 <label>Nombres</label>
				 <span class="field">  
				 <input name="nombre1" type="text" required class="input-large" placeholder="Primer Nombre" />
				 <input name="nombre2" type="text"  class="input-large" placeholder="Segundo Nombre" />
				</span>
		</p><p>
				 <label>Apellidos</label>
				 <span class="field"> 
				 <input name="apellido1" type="text" required class="input-large" placeholder="Primer Apellido" />
				 <input name="apellido2" type="text"  class="input-large" placeholder="Segundo Apellido"/>
				</span>
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
							<input name="telefono" type="tel" required class="input-large" id="telefono" placeholder="04141234567">
							<input name="telefono2" type="tel" class="input-large" id="telefono2" placeholder="04141234567">
				</span>                 
		</p>
			<p class="stdformbutton">
				<button class="btn btn-primary"><span class="iconfa-plus"></span> Añadir</button>
				<button type="reset" class="btn"><i class=" iconfa-refresh icon-white"></i> Restablecer</button>
			</p> 
		</form>
	</div>
</div>
<script type="text/javascript">
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