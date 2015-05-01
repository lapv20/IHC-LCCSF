<?php 
	include("../admin/conexion.php");
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

function eliminar(id){
	
	var respuesta = confirm('Desea eliminar al empleado?');
	
	if(respuesta){
		window.location.href = 'gempleado.php?action=anular&idempleado='+id;
		
	}
}
</script>

</head>

<body>
<h4 class="widgettitle">Empleados</h4>
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
                            <th class="head1">Fecha de Nacimiento</th>
                            <th class="head0">Genero</th>
                            <th class="head1">Telefonos</th>
                            <th class="head0">Orden de Servicio</th>
                            <th>Editar</th> 
                        </tr>
                    </thead>
                    <tbody>
               <?php 
			   
						$sesionid = $_SESSION['userid'];
						$persontac = "SELECT * FROM usuario WHERE nombre_usuario = '$sesionid'";
						$resultp = mysql_query($persontac);
						$row = mysql_fetch_array($resultp);
						$idemp = $row['idempresa'];
						
						$wsql="SELECT * FROM convenio_paciente c, paciente p WHERE c.idpaciente = p.idpaciente AND c.idempresa='$idemp'";
						$result = mysql_query($wsql,$link);
						echo mysql_error($link);
						while($row = mysql_fetch_array($result))
						{
						
						$orden_servicio ="SELECT * FROM ordenservicio WHERE cedula_paciente='".$row['cedula']."'";
						$result_orden = mysql_query($orden_servicio);
						$row_orden = mysql_fetch_array($result_orden);
						
				?>
                        <tr class="gradeX">
                            <td><?php echo $row['nombres']; ?></td>
                            <td><?php echo $row['apellidos']; ?></td>
                            <td><?php echo $row['cedula']; ?></td>
                            <td><?php echo $row['fecha_nac']; ?></td>
                            <td><?php echo $row['genero']; ?></td>
                            <td><?php echo $row['telefono']; ?></td>
                            <td><?php if((mysql_num_rows($result_orden))>0){ echo (mysql_num_rows($result_orden));} else
							{ echo ('No posee');} ?></td>
                            <td>
                                <center>
                                    <a href="#" onClick="MM_openBrWindow('modificarempleado.php?cedula=<?php echo $row['cedula'] ?>','modificarorden','width=805,height=400')"><li class="icon-edit"></li></a>
                                    <a href="#" onClick="eliminar(<?php echo $row['idpaciente']; ?>);"> <li class="icon-trash"></li></a></center></td>


                        </tr>
                    <?php
						 }
					?>
                     </tbody>
                </table>
</body>
</html>