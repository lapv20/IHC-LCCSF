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
</head>

<body>
<div class="widget">
						<h4 class="widgettitle">Crear Orden de Servicio</h4>
						<div class="widgetcontent">
								<form class="stdform" action="gorden.php?idordenservicio=1&action=nuevo" method="post">                
								 <p>
									 <label>Cedula</label>                       
										<span class="formwrapper">
												<input name="cedula" type="text" required class="input-large" placeholder="Numero" />
													<input name="tipo_cedula" type="radio" required value="V" /> V &nbsp;&nbsp; 
													<input name="tipo_cedula" type="radio" required value="E" /> E &nbsp;&nbsp;
										 </span>        
									 
										<label>Perfil</label>
										<span class="formwrapper">
											<select name="perfil" class="uniformselect">
												<option value="-1">Seleccione una Opcion</option>
												<?php
												$perf = "SELECT * FROM perfiles";
												$resultperf = mysql_query($perf);
												while($row = mysql_fetch_array($resultperf)){
												?>
							 					<option value="<?php echo $row['idperfil'];?>"><?php echo $row['nombre_perfil'];?></option>
							 					<?php } ?>
					 						</select>
					 					</span>
											
									 <label>Sucursal</label>
									 <span class="formwrapper">
					<select name="sucursal" class="uniformselect">
					 <option value="-1">Seleccione una Opcion</option>
						<?php 
					 $labs = "SELECT * FROM laboratorios";
					 $resultlabs = mysql_query($labs);
					while($row = mysql_fetch_array($resultlabs)){
						 ?>
							 <option value="<?php echo $row['idsucursal'];?>"><?php echo $row['nombre_laboratorio'];?></option>
										<?php }?>
					 </select>
					 </span>
					</p>
									<p class="stdformbutton">
										 <button class="btn btn-primary">Añadir</button>
											<button type="reset" class="btn">Restablecer</button>
									</p> 
									</form>
									</div>
									</div>
</body>

</html>