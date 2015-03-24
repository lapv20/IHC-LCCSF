<?php 
	include("conexbd.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Laboratorio Clinico Cesar Sanchez Font</title>
<script type="text/javascript">


function eliminar(id){
	
	var respuesta = confirm('Desea eliminar al empleado?');
	
	if(respuesta){
		window.location.href = 'gempleado.php?action=anular&idempleado='+id;
		
	}
}

function colocarMoroso(c){
	var respuesta = confirm("¿Desea colocar a "+c+" como moroso?");
	var cedula = document.getElementById(c).innerHTML;
	
	if(respuesta){
		window.location="guardarMoroso.php?accion=modificar&cedula="+cedula;
	}
	
	
}
</script>

</head>

<body>
<h4 class="widgettitle"><center>Agregar Moroso</center></h4>
                <table class="table table-bordered table-infinite" id="dyntable2">
                    <colgroup>
                        <col class="con0" style="align: center; width: 4%" />
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
                            <th class="head1">Activar Moroso</th>
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
						$con = 0;
						while($row = mysql_fetch_array($result))
						{
						
				?>
                        <tr class="gradeX">
                            <td><?php echo $row['nombres']; ?></td>
                            <td><?php echo $row['apellidos']; ?></td>
                            <td><span id="<?php echo $con;?>"><?php echo $row['cedula']; ?></span></td>
                            <td><?php echo $row['fecha_nac']; ?></td>
                            <td><?php echo $row['genero']; ?></td>
                            <td><?php echo $row['telefono']; ?></td>
                            
							<?php 
								
								/*$a = explode("\n",$row['cedula']);
								print_r($a);*/
							?>
                            <td><center><a href="#" class="iconsweets-piggybank" onClick="colocarMoroso(<?php echo $con;?>)" style="cursor:pointer;" ></a></center></td>


                        </tr>
                    <?php
						$con++;
						 }
					?>
                     </tbody>
                </table>
</body>
</html>