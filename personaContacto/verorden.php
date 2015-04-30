<?php 
	include("conexbd.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Laboratorio Clinico Cesar Sanchez Font</title>
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
                <table class="table table-bordered table-infinite" id="dyntable2">
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
                           	<th class="head1">Nombres</th>
                            <th class="head0">Apellidos</th>
                            <th class="head1">Cedula</th>
                            <th class="head1">Numero Orden de Servicio</th>
                            <th class="head0">Sucursal</th>
                            <th class="head1">Perfil</th>
                            <th class="head1">Estatus</th>
                            <th>Editar</th> 
                        </tr>
                    </thead>
                    <tbody>
               <?php 
			   
						$sesionid = $_SESSION['userid'];
						$persontac = "SELECT idempresa FROM usuario WHERE nombre_usuario = '$sesionid'";
						$resultp = mysql_query($persontac);
						$idemp = mysql_result($resultp,0);
						
						$wsql="SELECT * FROM convenio_paciente c, paciente p, ordenservicio o WHERE c.idpaciente = p.idpaciente AND c.idempresa='$idemp' AND o.cedula_paciente = p.cedula";
						$result = mysql_query($wsql,$link);
						echo mysql_error($link);
						while($row = mysql_fetch_array($result))
						{
							$id_orden = $row['idordenservicio'];
							$orden = "SELECT * FROM ordenservicio WHERE idordenservicio='$id_orden'";
							$result_orden = mysql_query($orden);
							$resultado_final = mysql_fetch_array($result_orden);
							$id_sucursal = $resultado_final['idsucursal'];
							$id_perfil = $resultado_final['idperfil'];
							$esta = $resultado_final['estatus'];
							
							$perfil = "SELECT * FROM perfiles WHERE idperfil='$id_perfil'";
							$nombre_perfil = mysql_query($perfil);
							$n_perfil = mysql_fetch_array($nombre_perfil);
							
							$sucursal = "SELECT * FROM laboratorios WHERE idsucursal='$id_sucursal'";
							$nombre_sucursal = mysql_query($sucursal);
							$laboratorio = mysql_fetch_array($nombre_sucursal);
							if($esta!='anulado'){
										
				?>
                        <tr class="gradeX">
                            <td><?php echo $row['nombres']; ?></td>
                            <td><?php echo $row['apellidos']; ?></td>
                            <td><?php echo $row['cedula']; ?></td>
                            <td><?php echo $row['numero_orden']; ?></td>
                            <td><?php echo $laboratorio['nombre_laboratorio']; ?></td>
                            <td><?php echo $n_perfil['nombre_perfil']; ?></td>
                            <td><?php echo $esta; ?></td>
                            <td>
                            	<center>
                            		<a href="#" <?php if($esta=='Pendiente'){?> onClick="MM_openBrWindow('modificarorden.php?sucursal=<?php echo $row['idsucursal'] ?>&perfil=<?php echo $row['idperfil'] ?>&idordenservicio=<?php echo $id_orden; ?>','modificarorden','width=805,height=280')"><?php }else{?> onClick="alert('No se puede modificar una orden cuyo estatus no sea pendiente')" <?php } ?><li class="icon-edit"></li></a>
                            		<a href="#" <?php if($esta=='Pendiente'){?> onClick="anular(<?php echo $row['idordenservicio']; ?>);"<?php }else{?> onClick="alert('No se puede anular una orden cuyo estatus no sea pendiente')"<?php } ?>> <li class="icon-remove"></li></a>
                            	</center>
                            </td>
	

                            
                        </tr>
                    <?php
							}
						 }
					?>
                     </tbody>
                </table>
</body>
</html>