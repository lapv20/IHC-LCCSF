<!doctype html>
<html>
<head>
<meta charset="utf-8">
</head>

<body>
<div class="widget">
<?php 
	if(isset($_GET['busquedaorden'])){ 
		include('buscarorden1.php'); 
	}else{

?> 
<script type="text/javascript">
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}

function anular(id){
	
	var respuesta = confirm('Desea anular la orden de servicio');
	
	if(respuesta){
		window.location.href = 'gorden.php?action=anular&idordenservicio='+id;
		
	}
}
</script>
			
            <h4 class="widgettitle">Buscar Orden de Servicio</h4>
            <div class="widgetcontent nopadding">
      			<form class="stdform stdform2" action="contacto.php?pag=bo&&acc=pac&&tipo=sbo" method="post">
                 <p>
                   <label>Cedula</label>                       
                    <span class="field">
                    	  <input name="cedula" type="text" required class="input-large" placeholder="Numero" />
                          <input name="tipo_cedula" type="radio" required value="V" /> V &nbsp;&nbsp; 
                          <input name="tipo_cedula" type="radio" required value="E" /> E &nbsp;&nbsp;
                      <p class="stdformbutton">
                         <button class="btn btn-primary"><span class="iconfa-search"></span> Buscar</button>
                          <button type="reset" class="btn">Restablecer</button>
                       </p>
                   </span> 
                 </p>
                 </form>
            </div>
</div>       
<?php 
	}

?>




<?php 

	if(isset($_POST['cedula'])){
	
	include("../admin/conexion.php"); 
		
	extract($_POST);
	
	
	if(isset($_POST["tipo_cedula"])==true && isset($_POST["cedula"])==true)
	{
		$tipo_cedula = $_POST["tipo_cedula"];
		$cedula = $_POST["cedula"];
		$cadena=$tipo_cedula . $cedula;	
			function validar_cadena($cadena)
			{	
				$permitidos = "VE0123456789"; 
			   for ($i=0; $i<strlen($cadena); $i++)
			   { 
				  if (strpos($permitidos, substr($cadena,$i,1))===false)
				  { 
					 return false; 
				  } 
			   } 
				   return true; 	
			}
		if(validar_cadena($cadena))
		{
			$sesionid = $_SESSION['userid'];
	
			$persontac = "SELECT idempresa FROM usuario WHERE nombre_usuario = '$sesionid'";
			$resultp = mysql_query($persontac);
			$idemp = mysql_result($resultp,0);
			
			
			$wsql="SELECT idpaciente FROM paciente WHERE cedula='$cadena'";
			$result = mysql_query($wsql,$link);
			$idpac = mysql_result($result,0);
			
			
			$wsql = "SELECT * FROM ordenservicio WHERE cedula_paciente='$cadena' AND idempresa='$idemp'";
			$result = mysql_query($wsql);
			$numero_filas = mysql_num_rows($result);
			//echo($numero_filas);
			
			if($numero_filas>0)
			{
				
				$wsql = "SELECT * FROM paciente WHERE cedula='$cadena'";
				$result = mysql_query($wsql);
				$row = mysql_fetch_array($result);
				
				$wsql1="SELECT * FROM paciente p, ordenservicio o, laboratorios l, perfiles per WHERE p.cedula=o.cedula_paciente AND cedula_paciente='$cadena' AND idempresa='$idemp' AND o.idperfil=per.idperfil AND o.idsucursal=l.idsucursal";
				$result1 = mysql_query($wsql1,$link);
				$numero_filas = mysql_num_rows($result1);
				
				echo mysql_error($link);
				
				
?>
                         <h4 class="widgettitle">Resultados</h4>
               			 <table class="table responsive">
                           <thead> 
                                <tr>  
                                    <th># orden de Servicio</th> 
                                    <th>Nombres</th> 
                                    <th>Apellidos</th> 
                                    <th>Perfil</th> 
                                    <th>Sucursal</th> 
                                    <th>Estatus</th> 
                                    <th>Accion</th> 
                                    
                                </tr> 
                           </thead> 
                          <tbody>
                          <?php while($row1 = mysql_fetch_array($result1)){ 
						  if($row1['estatus']!='anulado'){
						  ?> 
                            <tr> 
                                <td><?php echo $row1['idordenservicio']; ?></td> 
                                <td><?php echo $row1['nombres']; ?></td> 
                                <td><?php echo $row1['apellidos']; ?></td> 
                                <td><?php echo $row1['nombre_perfil']; ?></td>
                                <td><?php echo $row1['nombre_laboratorio']; ?></td>  
                                <td><?php echo $row1['estatus'] ?></td> 
                                <td> <a href="#" <?php if($row1['estatus']=='pendiente'){?>onClick="MM_openBrWindow('modificarorden.php?sucursal=<?php echo $row1['idsucursal'] ?>&perfil=<?php echo $row1['idperfil'] ?>&idordenservicio=<?php echo $row1['idordenservicio']; ?>','modificarorden','width=500,height=290')"><?php }else{ ?> onClick="alert('No se puede modificar una orden cuyo estatus no sea pendiente')"  <?php } ?><li class="icon-edit"></li></a>  <a href="#"  <?php if($row1['estatus']=='pendiente'){?> onClick="anular(<?php echo $row1['idordenservicio']; ?>);"> <?php }else{ ?> onClick="alert('No se puede anular una orden cuyo estatus no sea pendiente')" <?php } ?> <li class="icon-remove"></li></a></td>
                               
                           <?php }} ?>     
                            </tr>  
                         </tbody>
                </table>                 
                <div class="divider15"></div>
                
         <!--Fin Tabla de Resultados -->
       
<?php				
			}
			else
			{
				
?>
				<div class="alert">
                <button data-dismiss="alert" class="close" type="button" onClick="window.location.href='principal.php'">&times;</button>
                 <strong>No se encontraron Resultados</strong>
				</div>

<?php 
			}
		}
		else
		{ 
?>
				<div class="alert alert-error">
                   <button data-dismiss="alert" class="close" type="button" onClick="window.location.href='principal.php'">&times;</button>
                      <strong>Error!</strong>&nbsp;<?php echo $cadena . "  NO es valido<br>" ?>
</div>			
<?php	
		}
	}
	else
	{ 
?>		
			<div class="alert alert-error">
                   <button data-dismiss="alert" class="close" type="button" onClick="window.location.href='principal.php'">&times;</button>
                      <strong>Error!</strong>Los Campos no pueden estar Vacios
</div>		
<?php
	}
	
	}

?>



  
</body>
</html>