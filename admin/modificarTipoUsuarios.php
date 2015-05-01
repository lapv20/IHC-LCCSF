<?php 
	include("conexion.php");
	
	$wsql = "select * from tipo_usuario";
	
	$result = mysql_query($wsql,$link);
?>
<script type="text/javascript">
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}

function eliminar(e,n){
	var a = confirm("¿Seguro desea eliminar "+n+"?");
	
	if(a){
		window.location="tipoUsuario.php?accion=eliminar&id="+e;
	}
}
</script>
<h4 class="widgettitle">Modificar Tipos de Usuarios</h4>
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
                            <th class="head0"><center>Tipo</center></th>
                            <th class="head0"><center>Accion</center></th>
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
                            <td><?php echo $row['nombretipo_usuario'];?></td>
                          <td><center><a href="#" title="Modificar" class="icon-edit" onClick="MM_openBrWindow('modificarTipoUsuario.php?id=<?php echo $row['idtipousuario'];?>','Modificar','width=900,height=200')"></a>
                          
                          &nbsp;&nbsp;&nbsp;
                          <a href="#" title="Eliminar" class="icon-trash" onClick="eliminar('<?php echo $row['idtipousuario'];?>','<?php echo $row['nombretipo_usuario'];?>');"></a></center>
                           
                          </td>
                        </tr>
                        <?php }?>
</tbody>
                </table>