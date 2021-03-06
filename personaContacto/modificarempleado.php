<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Modificar Orden de Servicio</title>

	<link rel="stylesheet" href="../admin/archivos/css/style.default.css" type="text/css" />
	<link rel="stylesheet" href="../admin/archivos/css/bootstrap-fileupload.min.css" type="text/css" />
	<link rel="stylesheet" href="../admin/archivos/css/bootstrap-timepicker.min.css" type="text/css" />
	<link href="jQueryAssets/jquery.ui.core.min.css" rel="stylesheet" type="text/css">
	<link href="jQueryAssets/jquery.ui.theme.min.css" rel="stylesheet" type="text/css">
	<link href="jQueryAssets/jquery.ui.datepicker.min.css" rel="stylesheet" type="text/css">
	<script src="jQueryAssets/jquery-1.8.3.min.js" type="text/javascript"></script>
	<script src="jQueryAssets/jquery-ui-1.9.2.datepicker.custom.min.js" type="text/javascript"></script>
	<script src="jQueryAssets/i18n/jquery.ui.datepicker-es.js" type="text/javascript"></script>
</head>
<style type="text/css">
body{
	background: none;
}
</style>
<body>
	<div class="widget">
		<?php 
		include("../admin/conexion.php");
		$cedula = $_GET['cedula'];
		$paciente = mysql_query("SELECT * FROM paciente WHERE cedula='$cedula'");
		$result_paciente = mysql_fetch_array($paciente);		
		?>
		<center><h4 class="widgettitle">Modificar Empleado</h4></center>
		<div class="widgetcontent nopadding">
			<form class="stdform stdform2" action="gempleado.php?idempleado=<?php echo $cedula; ?>&action=modificar" method="post">
				<p>
					<label>Nombres</label>
					<span class="field">  
						<input name="nombre1" type="text" required class="input-xlarge" value= "<?php echo $result_paciente['nombres'];?>"	placeholder="Nombres" />
					</span>
				</p>
				<p>
					<label>Apellidos</label>
					<span class="field">  
						<input name="apellido1" type="text" required class="input-xlarge" value= "<?php echo $result_paciente['apellidos'];?>" placeholder="Apellidos" />
					</span>
				</p>
				<p>
					<label>Fecha de Nacimiento</label>
					<span class="field">
						<input type="text" name="fecha_nacimiento" id="fecha_nacimiento" value= "<?php echo $result_paciente['fecha_nac'];?>"/>
					</span>
				</p>
				<p>
					<label>Telefonos</label>
					<span class="field">
						<input name="telefono" type="tel" required class="input-xlarge" id="telefono" value= "<?php echo $result_paciente['telefono'];?>" placeholder="04141234567">
					</span>
				</p>
				<p class="stdformbutton">
					<button class="btn btn-primary" type="submit"> <span class="iconfa-save"></span> Guardar</button>
					<button class="btn" type="reset"> <span class="iconfa-refresh"></span> Restablecer</button>
					<button class="btn btn-danger" type="reset" onclick="window.close();"> <span class="iconfa-remove-sign"></span> Cancelar</button>
				</p>
			</form>
		</div>
	</div>
</body>
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
</html>