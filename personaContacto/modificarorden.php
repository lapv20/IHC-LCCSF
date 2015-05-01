<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Modificar Orden de Servicio</title>

<link rel="stylesheet" href="../admin/archivos/css/responsive-tables.css">
	<link rel="stylesheet" href="../admin/archivos/css/style.default.css" type="text/css" />
	<link rel="stylesheet" href="../admin/archivos/css/bootstrap-fileupload.min.css" type="text/css" />
	<link rel="stylesheet" href="../admin/archivos/css/bootstrap-timepicker.min.css" type="text/css" />
	<link rel="stylesheet" href="../admin/archivos/prettify/prettify.css" type="text/css" />
	
	<script type="text/javascript" src="../admin/archivos/js/jquery-1.9.1.min.js"></script>
	<script type="text/javascript" src="../admin/archivos/js/jquery-migrate-1.1.1.min.js"></script>
	<script type="text/javascript" src="../admin/archivos/js/jquery-ui-1.9.2.min.js"></script>
	<script type="text/javascript" src="../admin/archivos/js/modernizr.min.js"></script>
	<script type="text/javascript" src="../admin/archivos/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../admin/archivos/js/jquery.cookie.js"></script>
	<script type="text/javascript" src="../admin/archivos/js/jquery.uniform.min.js"></script>
	<script type="text/javascript" src="../admin/archivos/js/flot/jquery.flot.min.js"></script>
	<script type="text/javascript" src="../admin/archivos/js/flot/jquery.flot.resize.min.js"></script>
	<script type="text/javascript" src="../admin/archivos/js/responsive-tables.js"></script>
	<script type="text/javascript" src="../admin/archivos/js/custom.js"></script>

	<script type="text/javascript" src="../admin/archivos/js/bootstrap-fileupload.min.js"></script>
	<script type="text/javascript" src="../admin/archivos/js/jquery.validate.min.js"></script>
	<script type="text/javascript" src="../admin/archivos/js/bootstrap-timepicker.min.js"></script>
	<script type="text/javascript" src="../admin/archivos/js/jquery.tagsinput.min.js"></script>
	<script type="text/javascript" src="../admin/archivos/js/jquery.autogrow-textarea.js"></script>
	<script type="text/javascript" src="../admin/archivos/js/charCount.js"></script>
	<script type="text/javascript" src="../admin/archivos/js/colorpicker.js"></script>
	<script type="text/javascript" src="../admin/archivos/js/ui.spinner.min.js"></script>
	<script type="text/javascript" src="../admin/archivos/js/chosen.jquery.min.js"></script>
	<script type="text/javascript" src="../admin/archivos/js/forms.js"></script>
	<script type="text/javascript" src="../admin/archivos/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="../admin/archivos/prettify/prettify.js"></script>
	<script type="text/javascript" src="../admin/archivos/js/jquery.jgrowl.js"></script>
	<script type="text/javascript" src="../admin/archivos/js/jquery.alerts.js"></script>
	<script type="text/javascript" src="../admin/archivos/js/elements.js"></script>

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
				$id_orden = $_GET['idordenservicio'];
				$sucursal = $_GET['sucursal'];
				$perfil = $_GET['perfil'];
				$n_sucursal = mysql_query("SELECT * FROM laboratorios WHERE idsucursal='$sucursal'");
				$result_sucursal = mysql_fetch_array($n_sucursal);
				$n_perfil = mysql_query("SELECT * FROM perfiles WHERE idperfil='$perfil'");
				$result_perfil = mysql_fetch_array($n_perfil);
				
			?>
            <center><h4 class="widgettitle">Modificar Orden de Servicio</h4></center>
            <div class="widgetcontent nopadding">
            <form class="stdform stdform2" action="gorden.php?action=modificar&idordenservicio=<?php echo $id_orden; ?>" method="post">  
               <p><label>Perfil</label>
               	<span class="field">
				<select name="perfil" class="uniformselect">
				   <option value="-1">Seleccione una Opcion</option>
   					<?php 
					 $perf = "SELECT * FROM perfiles";
					 $resultperf = mysql_query($perf);
					while($row = mysql_fetch_array($resultperf)){ ?>
      				 <option <?php if($result_perfil['idperfil'] == $row['idperfil']){  ?> selected='selected' <?php } ?> value="<?php echo $row['idperfil'];?>"><?php echo $row['nombre_perfil'];?></option>
                    <?php }?>
					 </select>
					 </span>
                   </p> 
                   <p><label>Sucursal</label>
				<span class="field"><select name="sucursal" class="uniformselect chzn-select input-xxlarge">
				   <option value="-1">Seleccione una Opcion</option>
   					<?php 
					 $labs = "SELECT * FROM laboratorios";
					 $resultlabs = mysql_query($labs);
					while($row = mysql_fetch_array($resultlabs)){
  					 ?>
      				 <option <?php if($result_sucursal['idsucursal'] == $row['idsucursal']){  ?> selected='selected' <?php } ?> value="<?php echo $row['idsucursal'];?>"><?php echo $row['nombre_laboratorio'];?></option>
                    <?php }?>
					 </select></span>    
                  </p>
                  <p class="stdformbutton">
						<button class="btn btn-primary" type="submit"> <span class="iconfa-save"></span> Guardar</button>
						<button class="btn" type="reset"> <span class="iconfa-refresh"></span> Restablecer</button>
						<button class="btn btn-danger" type="reset" onclick="window.close();"> <span class="iconfa-remove-sign"></span> Cancelar</button>
                  </p> 
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