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

function eliminar(id){
	
	var respuesta = confirm('Desea Eliminar este paciente');
	
	if(respuesta){
		window.location.href = 'gpaciente.php?accion=eliminar&paciente='+id;
		
	}
}
</script>

</head>

<body>
<h4 class="widgettitle">Pacientes</h4>
                <table id="dyntable" class="table table-bordered responsive">
                    <thead>
                        <tr>                          
                           	<th class="head1">Nombres</th>
                            <th class="head0">Apellidos</th>
                            <th class="head1">Cedula</th>
                            <th class="head1">Fecha de Nacimiento</th>
                            <th class="head0">Genero</th>
                            <th class="head1">Telefonos</th>
                            <th class="head0">Modificar</th>
                        </tr>
                    </thead>
                    <tbody>
               <?php 
						$wsql="SELECT * FROM paciente";
						$result = mysql_query($wsql,$link);
						echo mysql_error($link);
						while($row = mysql_fetch_array($result))
						{

				?>
                        <tr class="gradeX">
                            <td><?php echo $row['nombres']; ?></td>
                            <td><?php echo $row['apellidos']; ?></td>
                            <td><?php echo $row['cedula']; ?></td>
                            <td><?php echo $row['fecha_nac']; ?></td>
                            <td><?php echo $row['genero']; ?></td>
                            <td><?php echo $row['telefono']; ?></td>
                            <td><a href="#" title="Modificar" class="icon-edit" onClick="MM_openBrWindow('modificarpaciente.php?paciente=<?php echo $row['idpaciente'];?>','Modificar','width=805,height=398')"></a>
                                <a href="#" title="Eliminar" class="icon-trash" onClick="eliminar(<?php echo $row['idpaciente']; ?>);"></a></td>
                        </tr>
                    <?php
						 }
					?>
                     </tbody>
                </table>
</body>
</html>