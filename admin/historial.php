<?php 
	include("conexion.php");
	
	$wsql = "select * from historial join actividades where historial.idactividad=actividades.idactividad";
	
	$result = mysql_query($wsql,$link);
?>

<h4 class="widgettitle"><center>Historial</center></h4>
<table id="dyntable" class="table table-bordered responsive">
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
                          	<th class="head0 nosort"><input type="checkbox" class="checkall" /></th>
                            <th class="head0">Usuario</th>
                            <th class="head1">Actividad</th>
                            <th class="head1">Fecha</th>
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
                            <td><?php echo $row['nombre_usuario'];?></td>
                            <td><?php echo $row['nombre_actividad'];?></td>
                            <td><?php echo $row['fecha'];?></td>
                        </tr>
                        <?php }?>
</tbody>
                </table>