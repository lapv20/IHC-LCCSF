<?php include("../admin/conexion.php"); ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Laboratorio Clinico Cesar Sanchez Font</title>
<script type="text/javascript" src="js/jquery.alerts.js"></script>
<script type="text/javascript">
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
function anular(id){
	var respuesta = confirm('Desea anular la orden de servicio');	
	if(respuesta){
		window.location.href = 'gorden.php?accion=anular&idordenservicio='+id;
	}
}
</script>
</head>
<body>
	<h4 class="widgettitle">Ordenes de Servicio</h4>
		<table id="dyntable" class="table table-bordered responsive">
			<colgroup>
				<col class="con0" />
				<col class="con1" />
				<col class="con0" />
				<col class="con1" />
				<col class="con0" />
				<col class="con1" />
			</colgroup>
			<thead>
				<tr>                
					<th class="head0"></th>
					<th class="head0">Nombres</th>
					<th class="head0">Apellidos</th>
					<th class="head1">Cedula</th>
					<th class="head0">Numero de Orden</th>
					<th class="head0">Convenio</th>
					<th class="head1">Sucursal</th>
					<th class="head0">Perfil</th>
					<th class="head1">Estatus</th>
					<th class="head0">OPCIONES</th> 
				</tr>
			</thead>
			<tbody>
	   				<?php 
						$conv="SELECT * FROM convenio_paciente";
                        $resultc = mysql_query($conv,$link);
						echo mysql_error($link);
						while ($rconv = mysql_fetch_array($resultc)) 
						{
							$idpaciente = $rconv['idpaciente'];
                            $idemp=$rconv['idempresa'];
                            $wsqlp = "SELECT * FROM paciente WHERE idpaciente='$idpaciente'";
							$resultp = mysql_query($wsqlp,$link);
							while ($rowp = mysql_fetch_array($resultp)) 
							{
								$cedulap=$rowp['cedula'];
								$wsqlos="SELECT * FROM ordenservicio o WHERE cedula_paciente='$cedulap'";
								$resultos = mysql_query($wsqlos,$link);
								$wsqltp="SELECT tipo_convenio FROM empresa where idempresa= '$idemp'";
                                $resulttp = mysql_query($wsqltp,$link);
                                $rowtp = mysql_fetch_array($resulttp);
								while($rowos = mysql_fetch_array($resultos))
								{
									
									$idorden=$rowos['idordenservicio'];
									$id_sucursal = $rowos['idsucursal'];
									$id_perfil = $rowos['idperfil'];
									$estatus = $rowos['estatus'];
									
									$wsql2 = "SELECT * FROM perfiles WHERE idperfil='$id_perfil'";
									$result2= mysql_query($wsql2,$link);
									$row2 = mysql_fetch_array($result2);
									echo mysql_error($link);
									
									$wsql3 = "SELECT * FROM laboratorios WHERE idsucursal='$id_sucursal'";
									$result3 = mysql_query($wsql3,$link);
									$row3= mysql_fetch_array($result3);
									echo mysql_error($link);
									if($estatus!='Anulada')
									{
					?>
								<tr class="gradeX">
								<td></td>
								<td><?php echo $rowp['nombres']; ?></td>
								<td><?php echo $rowp['apellidos']; ?></td>
								<td><?php echo $rowp['cedula']; ?></td>
								<td><?php echo $rowos['numero_orden']; ?></td>
								<td><?php echo $rowtp['tipo_convenio']; ?></td>
								<td><?php echo $row3['nombre_laboratorio']; ?></td>
								<td><?php echo $row2['nombre_perfil']; ?></td>
								<td><?php echo $estatus; ?></td>
								<td>
									<center>
										<?php if($estatus!='Anulado'){?> <a href="#" onClick="MM_openBrWindow('modificarorden.php?sucursal=<?php echo $row['idsucursal'] ?>&perfil=<?php echo $row['idperfil'] ?>&idordenservicio=<?php echo $idorden ?>','modificarorden','width=805,height=500')"><li class="icon-edit"></li> </a><?php } ?>
										<a href="#" <?php if($estatus=='Pendiente'){?> onClick="anular(<?php echo $row['idordenservicio']; ?>);"<?php }else{?> onClick="alert('No se puede anular una orden cuyo estatus no sea pendiente')"<?php } ?>> <li class="icon-trash"></li></a>
									</center>
								</td>
								</tr>
					<?php
							}
							}
							}
						}
					?>
								
							
						

						
						
					 </tbody>
				</table>
</body>
</html>