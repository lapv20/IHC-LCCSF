<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Modificar Orden de Servicio</title>

<link rel="stylesheet" href="archivos/css/style.default.css" type="text/css" />
<link rel="stylesheet" href="archivos/css/bootstrap-fileupload.min.css" type="text/css" />
<link rel="stylesheet" href="archivos/css/bootstrap-timepicker.min.css" type="text/css" />

<link href="jQueryAssets/jquery.ui.core.min.css" rel="stylesheet" type="text/css">
<link href="jQueryAssets/jquery.ui.theme.min.css" rel="stylesheet" type="text/css">
<link href="jQueryAssets/jquery.ui.datepicker.min.css" rel="stylesheet" type="text/css">
<script src="jQueryAssets/jquery-1.8.3.min.js" type="text/javascript"></script>
<script src="jQueryAssets/jquery-ui-1.9.2.datepicker.custom.min.js" type="text/javascript"></script>
<script src="jQueryAssets/i18n/jquery.ui.datepicker-es.js" type="text/javascript"></script>
</head>

<body>
<div class="widget">
			<?php 
			include("conexbd.php");
				$id_orden = $_GET['idordenservicio'];
				$sucursal = $_GET['sucursal'];
				$perfil = $_GET['perfil'];
				$n_sucursal = mysql_query("SELECT * FROM laboratorios WHERE idsucursal='$sucursal'");
				$result_sucursal = mysql_fetch_array($n_sucursal);
				$n_perfil = mysql_query("SELECT * FROM perfiles WHERE idperfil='$perfil'");
				$result_perfil = mysql_fetch_array($n_perfil);
				
			?>
            <h4 class="widgettitle">Modificar Orden de Servicio</h4>
            <div class="widgetcontent">
            <form class="stdform" action="gorden.php?accion=modificar&idordenservicio=<?php echo $id_orden; ?>" method="post">  
               <label>Perfil</label>
					<select name="perfil" class="uniformselect">
				   <option value="-1">Seleccione una Opcion</option>
   					<?php 
					 $perf = "SELECT * FROM perfiles";
					 $resultperf = mysql_query($perf);
					while($row = mysql_fetch_array($resultperf)){
						
  					 ?>
       					
      				 <option <?php if($result_perfil['idperfil'] == $row['idperfil']){  ?> selected='selected' <?php } ?> value="<?php echo $row['idperfil'];?>"><?php echo $row['nombre_perfil'];?></option>
                    <?php }?>
					 </select>
                      
                   <label>Sucursal</label>
					<select name="sucursal" class="uniformselect">
				   <option value="-1">Seleccione una Opcion</option>
   					<?php 
					 $labs = "SELECT * FROM laboratorios";
					 $resultlabs = mysql_query($labs);
					while($row = mysql_fetch_array($resultlabs)){
  					 ?>
      				 <option <?php if($result_sucursal['idsucursal'] == $row['idsucursal']){  ?> selected='selected' <?php } ?> value="<?php echo $row['idsucursal'];?>"><?php echo $row['nombre_laboratorio'];?></option>
                    <?php }?>
					 </select>     
                  </p>
                  <p>
                    <label>Estatus</label>
                     <span class="formwrapper">
                       <input type="radio" name="estatus" value="Procesado" />Procesado<br/>
                        <input type="radio" name="estatus" value="Realizado" />Realizado<br/>
                     </span>
                  </p>
                  <p class="stdformbutton">
                     <button class="btn btn-primary">Modificar</button>
                      <button type="reset" class="btn">Restablecer</button>
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