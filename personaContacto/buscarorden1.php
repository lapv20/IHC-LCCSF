<!doctype html>
<head>

<link rel="stylesheet" href="archivos/css/style.default.css" type="text/css" />
<link rel="stylesheet" href="archivos/css/bootstrap-fileupload.min.css" type="text/css" />
<link rel="stylesheet" href="archivos/css/bootstrap-timepicker.min.css" type="text/css" />

<script type="text/javascript" src="archivos/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="archivos/js/jquery-migrate-1.1.1.min.js"></script>
<script type="text/javascript" src="archivos/js/jquery-ui-1.9.2.min.js"></script>
<script type="text/javascript" src="archivos/js/bootstrap.min.js"></script>
<script type="text/javascript" src="archivos/js/bootstrap-fileupload.min.js"></script>
<script type="text/javascript" src="archivos/js/bootstrap-timepicker.min.js"></script>
<script type="text/javascript" src="archivos/js/jquery.uniform.min.js"></script>
<script type="text/javascript" src="archivos/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="archivos/js/jquery.tagsinput.min.js"></script>
<script type="text/javascript" src="archivos/js/jquery.autogrow-textarea.js"></script>
<script type="text/javascript" src="archivos/js/charCount.js"></script>
<script type="text/javascript" src="archivos/js/colorpicker.js"></script>
<script type="text/javascript" src="archivos/js/ui.spinner.min.js"></script>
<script type="text/javascript" src="archivos/js/chosen.jquery.min.js"></script>
<script type="text/javascript" src="archivos/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="archivos/js/jquery.cookie.js"></script>
<script type="text/javascript" src="archivos/js/modernizr.min.js"></script>
<script type="text/javascript" src="js/responsive-tables.js"></script>
<script type="text/javascript" src="archivos/js/custom.js"></script>
<script type="text/javascript" src="archivos/js/forms.js"></script>


</head> 
<body>
<?php 
	
	include("../admin/conexion.php"); 
		session_start();
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
			echo($numero_filas);
			
			if($numero_filas>0)
			{
				
				$wsql = "SELECT * FROM paciente WHERE cedula='$cadena'";
				$result = mysql_query($wsql);
				$row = mysql_fetch_array($result);
				
				$wsql1="SELECT * FROM paciente p, ordenservicio o WHERE p.cedula=o.cedula_paciente AND cedula_paciente='$cadena' AND idempresa='$idemp'";
				$result1 = mysql_query($wsql1,$link);
				$numero_filas = mysql_num_rows($result1);
				$row1 = mysql_fetch_array($result1);
				echo mysql_error($link);
				echo ($wsql1);
				
?>
                         <h4 class="widgettitle">Resultados</h4>
               			 <table class="table responsive">
                           <thead> 
                                <tr>  
                                    <th>Orden de Servicio</th> 
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
                                <td><?php echo $row1['idordenservicio']; ?></td> 
                                <td><?php echo $row1['nombres']; ?></td> 
                                <td><?php echo $row1['apellidos']; ?></td> 
                                <td><?php echo $row1['fecha_nac']; ?></td>
                                <td><?php echo $row1['genero']; ?></td>  
                                <td><?php echo $row1['telefono']; ?></td> 
                                <td><?php if($numero_filas>0){ echo $numero_filas;}else{echo "No posee";} ?></td> 
                                <?php if($numero_filas>0){ ?> <td> <a href="#" onClick="MM_openBrWindow('modificarorden.php?sucursal=<?php echo $row1['idsucursal'] ?>&perfil=<?php $row1['idperfil'] ?>&idordenservicio=<?php echo $id_orden; ?>','modificarorden','width=500,height=500')"><li class="icon-edit"></li></a></td>
                                <?php } ?>
                                
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

?>
</body>




