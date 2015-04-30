<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Crear Orden de Servicio</title>


<link href="jQueryAssets/jquery.ui.core.min.css" rel="stylesheet" type="text/css">
<link href="jQueryAssets/jquery.ui.theme.min.css" rel="stylesheet" type="text/css">
<link href="jQueryAssets/jquery.ui.datepicker.min.css" rel="stylesheet" type="text/css">
<script src="jQueryAssets/jquery-1.8.3.min.js" type="text/javascript"></script>
<script src="jQueryAssets/jquery-ui-1.9.2.datepicker.custom.min.js" type="text/javascript"></script>
<script src="jQueryAssets/i18n/jquery.ui.datepicker-es.js" type="text/javascript"></script>
<script type="text/javascript">
function validarLetras(e) 
{ 
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
function validarNumeros(e) 
{ // 1
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
		<h4 class="widgettitle">Crear Orden de Servicio</h4>
		<div class="widgetcontent nopadding">
      		<form class="stdform stdform2" action="gorden.php?idordenservicio=1&action=nuevo" method="post">                
				<p>
					<label>Paciente</label>                       
					<span class="field">
						<select name="idpaciente" class="uniformselect chzn-select input-xxlarge" required="required" >
							<option value="-1">Seleccione una Opción</option>
							<?php 
								$perf = "SELECT * FROM paciente";
								$resultperf = mysql_query($perf);
								while($row = mysql_fetch_array($resultperf)){?>
									<option value="<?php echo $row['idpaciente'];?>"><?php echo $row['cedula']." - ";echo $row['nombres']." ".$row['apellidos']; ?></option>
								<?php } ?>
							</select>
						</span>   
				</p>
					<p>     
						<label>Perfil</label>
						<span class="field">
							<select name="idperfil" class="uniformselect chzn-select input-xxlarge">
								<option value="-1">Seleccione una Opción</option>
								<?php 
								$perf = "SELECT * FROM perfiles";
								$resultperf = mysql_query($perf);
								while($row = mysql_fetch_array($resultperf)){
									?>
									<option value="<?php echo $row['idperfil'];?>"><?php echo $row['nombre_perfil'];?></option>
									<?php }?>
								</select>
						</span></p><p>
								<label>Sucursal</label><span class="field">
								<select name="idsucursal" class="uniformselect chzn-select input-xxlarge">
									<option value="-1">Seleccione una Opcion</option>
									<?php 
									$labs = "SELECT * FROM laboratorios";
									$resultlabs = mysql_query($labs);
									while($row = mysql_fetch_array($resultlabs)){
										?>
										<option value="<?php echo $row['idsucursal'];?>"><?php echo $row['nombre_laboratorio'];?></option>
										<?php }?>
									</select></span>
								</p>   
								<p class="stdformbutton">
									<button type="submit" class="btn btn-primary"><span class="iconfa-plus"></span> Crear Nueva Orden de Servicio</button>
									<button type="reset" class="btn"><i class=" iconfa-refresh icon-white"></i> Restablecer</button>
								</p>
					<p class="stdformbutton">
						<button class="btn btn-primary"><span class="iconfa-plus"></span> Añadir</button>
						<button type="reset" class="btn"><i class=" iconfa-refresh icon-white"></i> Restablecer</button>
					</p> 
			</form>
		</div>
</div>
</body>

</html>