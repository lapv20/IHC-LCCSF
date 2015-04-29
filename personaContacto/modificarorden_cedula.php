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
			
<h4 class="widgettitle">Modificar Orden de Servicio</h4>
	<div class="widgetcontent nopadding">
			<form class="stdform stdform2" action="contacto.php?pag=bo&&acc=pac&&tipo=sbo" method="post">
				<p>
					<label>Cedula</label>                       
                    <span class="field">
                    	  <input name="cedula" type="text" required class="input-large" placeholder="Numero" />
                          <input name="tipo_cedula" type="radio" required value="V" /> V &nbsp;&nbsp; 
                          <input name="tipo_cedula" type="radio" required value="E" /> E &nbsp;&nbsp;
                   </span>
                   <p class="stdformbutton">
                        <button class="btn btn-primary"><span class="iconfa-search"></span> Buscar</button>
                        <button type="reset" class="btn">Restablecer</button>
                    </p>
                 </p>
                 </form>
            </div>
</div>       
<?php 
	}

?>




<?php 

	if(isset($_POST['cedula'])){
	
	include("conexbd.php"); 
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
			//echo($numero_filas);
			
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
                                <td> <a href="contacto.php"><li class="icon-edit"></li></a></td>
                                
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