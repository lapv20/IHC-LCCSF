<?php 
	include("conexbd.php");
	//session_start();
?>
<meta charset="utf-8">
<head>
	<title>Crear Orden de Servicio</title>
</head>
<body>
	<div class="widget">
		<h4 class="widgettitle">Crear Orden de Servicio</h4>
		<div class="widgetcontent nopadding">
			<form class="stdform stdform2" id="form" action="gorden.php?accion=nuevo" method="post" onsubmit="return validateForm()">
				<p>
					<label>Paciente</label>                       
					<span class="field">
						<select name="idpaciente" class="uniformselect chzn-select input-xxlarge" required="required" >
							<option value="-1">Seleccione una Opción</option>
							<?php 
								$perf = "SELECT * FROM convenio_paciente";
								$resultperf = mysql_query($perf,$link);
								while ($row = mysql_fetch_array($resultperf)) 
								{
										$idpaciente = $row['idpaciente'];
									$wsql="SELECT * FROM paciente WHERE idpaciente='$idpaciente'";
									$result = mysql_query($wsql,$link);
									while($row1 = mysql_fetch_array($result)){?>
										<option value="<?php echo $row1['idpaciente'];?>"><?php echo $row1['cedula']." - ";echo $row1['nombres']." ".$row1['apellidos']; ?></option>
								<?php } }?>
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
			</form>
		</div>
	</div>
</body>
<script type="text/javascript">
	function validateForm() {
		var cedpaciente = document.forms["form"]["idpaciente"].value;
		var idperfil = document.forms["form"]["idperfil"].value;
		var idsucursal = document.forms["form"]["idsucursal"].value;
		if (cedpaciente == null || cedpaciente == "-1") {
			alert("No has elegido un paciente");
			return false;
		}
		if (idperfil == null || idperfil == "-1") {
			alert("No has elegido una examen");
			return false;
		}if (idsucursal == null || idsucursal == "-1") {
			alert("No has elegido una Sucursal");
			return false;
		}
	}
</script>