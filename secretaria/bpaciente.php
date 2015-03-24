<!doctype html>
<head>
<script type="text/javascript">
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
</script>
</head> 
<body>
<?php 
	
	include("conexbd.php"); 
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
			$wsql="SELECT * FROM paciente WHERE cedula='$cadena'";
			$result = mysql_query($wsql,$link);
			$row = mysql_fetch_array($result);
			echo mysql_error($link);
			if($row>0)
			{
				$wsql1="SELECT * FROM ordenservicio WHERE cedula_paciente='$cadena'";
				$result1 = mysql_query($wsql1,$link);
				$row1 = mysql_fetch_array($result1);
				echo mysql_error($link);
				
?>
                         <h4 class="widgettitle">Resultados</h4>
               			 <table class="table responsive">
                           <thead> 
                                <tr>  
                                    <th>Cedula</th> 
                                    <th>Nombres</th> 
                                    <th>Apellidos</th> 
                                    <th>Fecha Nacimiento</th> 
                                    <th>Genero</th> 
                                    <th>Telefono</th> 
                                    <th>Orden de Servicio</th> 
                                    <th>Accion</th> 
                                </tr> 
                           </thead> 
                          <tbody> 
                            <tr> 
                                <td><?php echo $row['cedula']; ?></td> 
                                <td><?php echo $row['nombres']; ?></td> 
                                <td><?php echo $row['apellidos']; ?></td> 
                                <td><?php echo $row['fecha_nac']; ?></td>
                                <td><?php echo $row['genero']; ?></td>  
                                <td><?php echo $row['telefono']; ?></td> 
                                <td><?php if($row1>0){ echo $row1['numero_orden'];}else{echo "No posee";} ?></td> 
                                <td><?php  $idpaciente=$row['idpaciente'];?><a href="#" title="Modificar" class="icon-edit" onClick="MM_openBrWindow('modificarpaciente.php?paciente=<?php echo $idpaciente?>','Modificar','width=800,height=398')"></a></td>
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

?>
</body>


