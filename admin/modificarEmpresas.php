<?php 
	include("conexion.php");
	
	$wsql = "select * from empresa";
	
	$result = mysql_query($wsql,$link);
?>
<script type="text/javascript">
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}

function eliminar(e,n){
	var a = confirm("¿Seguro desea eliminar la empresa "+n+"?");
	
	if(a){
		window.location = "empresa.php?accion=eliminar&id="+e;
	}
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
                            <th class="head0">Nombre</th>
                            <th class="head1">Convenio</th>
                            <th class="head1">Telefono</th>
                            <th class="head0">RIF</th>
                            <th class="head0">Direccion</th>
                          <th class="head1">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    	<?php 
							while($row = mysql_fetch_array($result)){
								if($row['idempresa']!=="0"){?>
                    <tr class="gradeX">
                          <td class="aligncenter"></td>
                          <td><?php echo $row['nombre_empresa'];?></td>
                          <td><?php echo $row['tipo_convenio'];?></td>
                          <td><?php echo $row['telefono'];?></td>
                          <td ><?php echo $row['rif'];?></td>
                          <td ><?php echo $row['direccion'];?></td>
                          <td>
                            <center>
                              <a href="#" title="Modificar" class="icon-edit" onClick="MM_openBrWindow('modificarEmpresa.php?nombre=<?php echo $row['nombre_empresa'];?>&amp;tipo=<?php echo $row['tipo_convenio'];?>','Modificar','width=805,height=500')"></a>
                              <a href="#" title="Eliminar" class="icon-trash" onClick="eliminar('<?php echo $row['idempresa'];?>','<?php echo $row['nombre_empresa'];?>');"></a>
                            </center>
                          </td>
                        </tr>
                        <?php }}?>
</tbody>
                </table>