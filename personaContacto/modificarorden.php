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
				<span class="field"><select name="sucursal" class="uniformselect">
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