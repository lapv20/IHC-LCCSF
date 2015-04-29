<!doctype html>
<html>
<head>
<meta charset="utf-8">
</head>

<body>
<div class="widget">
<?php 
	if(isset($_GET['busqueda'])){ 
		//include('buscarempleado1.php'); 
	}else{
	

?> 
<script type="text/javascript">
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}


function eliminar(id){
	
	var respuesta = confirm('Desea eliminar al empleado?');
	
	if(respuesta){
		window.location.href = 'gempleado.php?action=anular&idempleado='+id;
		
	}
}
</script>
<h4 class="widgettitle">Buscar Empleado</h4>
    <div class="widgetcontent nopadding">
      <form class="stdform stdform2" action="contacto.php?pag=me&&acc=pac&&tipo=sme" method="post">
                               
                 <p>
                   <label>Cedula</label>                       
                    <span class="field">
                    	  <input name="cedula" type="text" required class="input-large" placeholder="Numero" />
                          <input name="tipo_cedula" type="radio" required value="V" /> V &nbsp;&nbsp; 
                          <input name="tipo_cedula" type="radio" required value="E" /> E &nbsp;&nbsp;
                   </span> 
                 </p>
                 <p class="stdformbutton">
                 <button class="btn btn-primary"><span class="iconfa-search"></span> Buscar</button>
                  <button type="reset" class="btn">Restablecer</button>
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
			$persontac = "SELECT * FROM usuario WHERE nombre_usuario = '$sesionid'";
			$resultp = mysql_query($persontac);
			$row = mysql_fetch_array($resultp);
			$idemp = $row['idempresa'];
			$wsql="SELECT * FROM convenio_paciente c, paciente p WHERE c.idpaciente = p.idpaciente AND c.idempresa='$idemp' AND p.cedula='$cadena'";
			$result = mysql_query($wsql);
			$numero_filas = mysql_num_rows($result);
			if($numero_filas > 0)
			{
				
?>
				<h4 class="widgettitle">Empleados</h4>
				<table class="table table-bordered table-infinite" id="dyntable2">
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
                           	<th class="head1">Nombres</th>
                            <th class="head0">Apellidos</th>
                            <th class="head1">Cedula</th>
                            <th class="head1">Fecha de Nacimiento</th>
                            <th class="head0">Genero</th>
                            <th class="head1">Telefonos</th>
                            <th class="head0">Orden de Servicio</th>
                            <th>Editar</th> 
                        </tr>
                    </thead>
                    <tbody>
					<?php 
			   
	
						//$result = mysql_query($wsql,$link);
						while($row = mysql_fetch_array($result))
						{
						
						$orden_servicio ="SELECT * FROM ordenservicio WHERE cedula_paciente='".$row['cedula']."'";
						$result_orden = mysql_query($orden_servicio);
						$row_orden = mysql_fetch_array($result_orden);
						

				?>
                        <tr class="gradeX">
                            <td><?php echo $row['nombres']; ?></td>
                            <td><?php echo $row['apellidos']; ?></td>
                            <td><?php echo $row['cedula']; ?></td>
                            <td><?php echo $row['fecha_nac']; ?></td>
                            <td><?php echo $row['genero']; ?></td>
                            <td><?php echo $row['telefono']; ?></td>
                            <td><?php if((mysql_num_rows($result_orden))>0){ echo (mysql_num_rows($result_orden));} else
							{ echo ('No posee');} ?></td>
                            <td> <a href="#" onClick="MM_openBrWindow('modificarempleado.php?cedula=<?php echo $row['cedula'] ?>','modificarorden','width=500,height=480')"><li class="icon-edit"></li></a> <a href="#" onClick="eliminar(<?php echo $row['idpaciente']; ?>);"> <li class="icon-remove"></li></a></td>


                        </tr>
						<?php
                        }
                        ?>
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