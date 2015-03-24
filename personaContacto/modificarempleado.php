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
				$cedula = $_GET['cedula'];
				$paciente = mysql_query("SELECT * FROM paciente WHERE cedula='$cedula'");
				$result_paciente = mysql_fetch_array($paciente);
				
			?>
            <h4 class="widgettitle">Modificar Empleado</h4>
            <div class="widgetcontent">
            <form class="stdform" action="gempleado.php?idempleado=<?php echo $cedula; ?>&action=modificar" method="post">    
              
					 <label>Nombres</label>
                     <span class="formwrapper">  
                     <input name="nombre1" type="text" required class="input-large" value= "<?php echo $result_paciente['nombres'];?>	"	placeholder="Nombres" />
                     </span>
                     <label>Apellidos</label>
                     <span class="formwrapper">  
                     <input name="apellido1" type="text" required class="input-large" value= "<?php echo $result_paciente['apellidos'];?>" placeholder="Apellidos" />
                	</span>
               	  <div class="par">
                    <label>Fecha de Nacimiento</label>
                    <input type="text" name="fecha_nacimiento" id="fecha_nacimiento" value= "<?php echo $result_paciente['fecha_nac'];?>"/>
                  </div>
                     <label>Telefonos</label>                       
                    <span class="formwrapper">
                          <input name="telefono" type="tel" required class="input-large" id="telefono" value= "<?php echo $result_paciente['telefono'];?>" placeholder="04141234567">
                  </span>      
                  <p class="stdformbutton">
                     <button class="btn btn-primary">Modificar</button>
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