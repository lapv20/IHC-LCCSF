<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Modificar Paciente</title>

<link rel="stylesheet" href="../admin/archivos/css/style.default.css" type="text/css" />
<link rel="stylesheet" href="../admin/archivos/prettify/prettify.css" type="text/css" />
<link href="jQueryAssets/jquery.ui.core.min.css" rel="stylesheet" type="text/css" />
<link href="jQueryAssets/jquery.ui.theme.min.css" rel="stylesheet" type="text/css" />
<link href="jQueryAssets/jquery.ui.datepicker.min.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="../admin/archivos/js/jquery.dataTables.min.js"></script>
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
<?php 
	include("conexbd.php");
	$paciente = $_GET['paciente'];
	$wsql = "SELECT * from paciente WHERE idpaciente='$paciente'";
	$result = mysql_query($wsql,$link);
	$row = mysql_fetch_array($result);
	
	
?>

<div class="widget ">
	<center><h4 class="widgettitle"> Modificar Paciente</h4></center>
    <div class="widgetcontent nopadding">
    	<form class="stdform stdform2" method="post" action="gpaciente.php?accion=modificar&paciente=<?php echo $paciente;?>">
        	<p>
                <label>Nombres</label>
                <span class="field"><input type="text" id="nombres" name="nombres" class="input-medium" placeholder="Nombre" value="<?php echo $row['nombres'];?>"/></span>
            </p>
            <p>
                <label>Apellidos</label>
                <span class="field"><input type="text" name="apellidos" class="input-medium" placeholder="Apellido" value="<?php echo $row['apellidos'];?>" /></span>
            </p>
            <p>
            <label>Fecha de Nacimiento</label>
            <span class="field">    
                <input type="text" name="fecha_nacimiento" id="fecha_nacimiento"  value="<?php echo $row['fecha_nac'];?>" />
            </span>
            </p>
            <p>
                <label>Télefono</label>
                <span class="field"><input type="text" name="telefono" class="input-medium" placeholder="Telefono" value="<?php echo $row['telefono'];?>" /></span>
            </p>
            <p class="stdformbutton">
                <button class="btn btn-primary" type="submit"> <span class="iconfa-save"></span> Guardar</button>
                <button class="btn" type="reset" onclick="window.close();"> <span class="iconfa-remove-sign"></span> Cancelar</button>
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
		dateFormat:"yy-mm-dd"
		}
		)
		); 
});
</script>
</body>
</html>