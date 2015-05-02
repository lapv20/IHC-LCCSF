<?php 
	include("conexion.php");
	
	$wsql = "SELECT numero_orden,hora_estimada,estatus,cedula,empresa.idempresa,ordenservicio.idsucursal,nombres,apellidos,nombre_empresa from paciente,ordenservicio,empresa,laboratorios where paciente.cedula=ordenservicio.cedula_paciente and empresa.idempresa=ordenservicio.idempresa and ordenservicio.idsucursal = laboratorios.idsucursal";
	
	$result = mysql_query($wsql,$link);
?>

<script>
	function anular(e){
		confirm = confirm("¿Seguro desea anular la orden "+e+"?");
		if(confirm){
			window.location="ordenServicio.php?accion=anular&numero="+e;
		}else{
            window.location.reload();
        }
	}
</script>

<h4 class="widgettitle">Administrar Ordenes de Servicio<span style="float:right;" class="iconfa-list"></span></h4>
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
                          	<th class="head0 nosort"><input type="checkbox" class="checkall" /></th>
                            <th class="head0">Numero de Orden</th>
                            <th class="head1">Empresa</th>
                            <th class="head0">Nombre</th>
                            <th class="head1">Apellido</th>
                            <th class="head1">Cedula</th>
                            <th class="head1">Estatus</th>
                            <th class="head1">Anular Orden</th>
                        </tr>
                    </thead>
                    <tbody>
                    	<?php 
							while($row = mysql_fetch_array($result)){
						?>
                        
                    <tr class="gradeX">
                          <td class="aligncenter"><span class="center">
                            <input type="checkbox" />
           	    </span></td>
                            <td><?php echo $row['numero_orden'];?></td>
                            <td><?php echo $row['nombre_empresa'];?></td>
                            <td><?php echo $row['nombres'];?></td>
                            <td><?php echo $row['apellidos'];?></td>
                            <td><?php echo $row['cedula'];?></td>
                            <td><?php echo $row['estatus'];?></td>
                          <td>
                            <center>
                            <?php if($row['estatus']!="Realizado"){ ?>
                                <a class="btn btn-danger" onclick="anular('<?php echo $row['numero_orden'];?>');" title="Anular"><span class="iconfa-trash"></span></a></center>
                                <?php } ?>
                          </td>
                        </tr>
                        <?php } ?>
</tbody>
</table>