<?php include("../admin/conexion.php"); ?>
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
<h4 class="widgettitle">Lista de Afiliados<span class="iconfa-list" style="float:right;"></span></h4>
    <table id="dyntable2" class="table table-bordered responsive">
        <colgroup>
            <col class="con0" />
            <col class="con0" />
            <col class="con1" />
            <col class="con0" />
            <col class="con1" />
            <col class="con0" />
            <col class="con1" />
        </colgroup>
        <thead>
            <tr>
                <th class="head1"></th>
               	<th class="head0">Nombres<span class="iconfa-user" style="float:right; margin-top:5px;"></span></th>
                <th class="head0">Apellidos<span class="iconfa-leaf" style="float:right; margin-top:5px;"></span></th>
                <th class="head0">Cedula<span class="iconfa-list" style="float:right; margin-top:5px;"></span></th>
                <th class="head0">Fecha de Nacimiento<span class="iconfa-calendar" style="float:right; margin-top:5px;"></span></th>
                <th class="head0">Genero<span class="iconfa-cogs" style="float:right; margin-top:5px;"></span></th>
                <th class="head0">Telefonos<span class="iconfa-phone-sign" style="float:right; margin-top:5px;"></span></th>
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
			while($row = mysql_fetch_array($result)) { ?>
            <tr class="gradeX">
                <td></td>
                <td><?php echo $row['nombres']; ?></td>
                <td><?php echo $row['apellidos']; ?></td>
                <td><?php echo $row['cedula']; ?></td>
                <td><?php echo $row['fecha_nac']; ?></td>
                <td><?php echo $row['genero']; ?></td>
                <td><?php echo $row['telefono']; ?></td>


            </tr>
        <?php
			 }
		?>
         </tbody>
    </table>
</body>
</html>