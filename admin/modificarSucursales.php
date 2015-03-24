<?php 
	include("conexion.php");
	
	$wsql = "select * from laboratorios";
	
	$result = mysql_query($wsql,$link);
?>
<script type="text/javascript">
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}

function eliminar(e,n){
	var a = confirm("¿Seguro desea eliminar "+n+"?");
	
	if(a){
		window.location = "sucursal.php?accion=eliminar&id="+e;
	}
}
</script>




<h4 class="widgettitle"><center>Modificar Sucursal</center></h4>
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
                            <th class="head0">Nombre</th>
                            <th class="head1">Telefono</th>
                        <th class="head0">RIF</th>
                          <th class="head1">Accion</th>
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
                            <td><?php echo $row['nombre_laboratorio'];?></td>
                            <td><?php echo $row['telefono'];?></td>
                            <td ><?php echo $row['rif'];?></td>
                          <td><center><a href="#" title="Modificar" class="iconsweets-cog4" onClick="MM_openBrWindow('modificarSucursal.php?id=<?php echo $row['idsucursal'];?>','Modificar','width=900,height=560')"></a>
                          
                          &nbsp;&nbsp;&nbsp;
                          
                          <a href="#" title="Eliminar" class="icon-trash" onClick="eliminar('<?php echo $row['idsucursal'];?>','<?php echo $row['nombre_laboratorio'];?>');"></a></center>
                           
                          </td>
                        </tr>
                        <?php }?>
</tbody>
                </table>