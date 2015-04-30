<?php 
	include("conexion.php");
	
	$wsql = "select * from usuario,empresa, tipo_usuario where usuario.idempresa=empresa.idempresa and usuario.tipo_usuario=tipo_usuario.idtipousuario";
	
	$result = mysql_query($wsql,$link);
?>
<script type="text/javascript">
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
</script>


<h4 class="widgettitle">Modificar Usuarios</h4>
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
                            <th class="head0">Usuario</th>
                            <th class="head0">clave</th>
                            <th class="head1">Empresa</th>
                            <th class="head0">Nombre</th>
                            <th class="head1">Apellido</th>
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
                            <td><?php echo $row['nombre_usuario'];?></td>
                            <td><?php echo $row['clave'];?></td>
                            <td><?php echo $row['nombre_empresa'];?></td>
                            <td><?php echo $row['nombres'];?></td>
                            <td class="center"><?php echo $row['apellidos'];?></td>
                          <td><center><a href="#" title="Modificar" class="icon-edit" onClick="MM_openBrWindow('modificarUsuario.php?usuario=<?php echo $row['nombre_usuario'];?>','Modificar','width=805,height=500')"></a></center></td>
                        </tr>
                        <?php }?>
</tbody>
                </table>