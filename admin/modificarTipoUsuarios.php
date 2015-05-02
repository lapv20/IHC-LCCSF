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
<h4 class="widgettitle">Administrar Tipos de Usuarios<span style="float:right;" class="iconfa-list"></span></h4>
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
                            <th class="head0"><center>Opciones</center></th>
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
                          <td>
                            <center>
                              <a title="Modificar" class="btn btn-info" onClick="MM_openBrWindow('modificarTipoUsuario.php?id=<?php echo $row['idtipousuario'];?>','Modificar','width=900,height=200')"><span class="iconfa-edit"></span></a>
                              <a title="Eliminar" class="btn btn-danger" onClick="eliminar('<?php echo $row['idtipousuario'];?>','<?php echo $row['nombretipo_usuario'];?>');"><span class="iconfa-trash"></span></a></center>
                          </td>
                        </tr>
                        <?php }?>
</tbody>
                </table>