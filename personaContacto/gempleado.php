<?php 
	include("conexbd.php");
	session_start();
	if(isset($_GET['action']))
	{
		if($_GET['action']=='nuevo')
		{
			extract($_POST);
			$tipo_cedula = $_POST["tipo_cedula"];
			$cedula = $_POST["cedula"];
			$nombre1 = $_POST["nombre1"];
			$nombre2 = $_POST["nombre2"];
			$apellido1 = $_POST["apellido1"];
			$apellido2 = $_POST["apellido2"];
			$fecha_nacimiento = $_POST["fecha_nacimiento"];
			$genero = $_POST["genero"];
			$telefono = $_POST["telefono"];
			$telefono2 = $_POST["telefono2"];
			
			$cedulag = $tipo_cedula . $cedula;
			$nombres = $nombre1 ." ". $nombre2;
			$apellidos = $apellido1 ." ". $apellido2;
			$telefonos = $telefono ." ". $telefono2;
			
			$wsql="INSERT INTO paciente (cedula,nombres,apellidos,fecha_nac,genero,telefono) VALUES 					('$cedulag','$nombres','$apellidos','$fecha_nacimiento','$genero','$telefonos')";
			$resultado = mysql_query("SELECT idpaciente FROM paciente WHERE cedula='$cedulag'",$link);
			$numero_filas = mysql_num_rows($resultado);
			if($numero_filas == 0)
			{
				$result = mysql_query($wsql,$link);
				echo mysql_error($link);
				
				//Historial
				$wsql3="SELECT idactividad FROM actividades WHERE nombre_actividad='Agregar paciente'";
				$result3 = mysql_query($wsql3,$link);
				$row3 = mysql_fetch_array($result3);
				$idactividad=$row3['idactividad'];
				echo mysql_error($link);
				$nombreusuario = $_SESSION['userid'];
				
				$fecha=date("Y-m-d");
				$wsql4="INSERT INTO historial (idactividad,nombre_usuario,fecha) VALUES ('$idactividad','$nombreusuario','$fecha')";
				echo $nombreusuario;
				$result4 = mysql_query($wsql4,$link);
				echo mysql_error($link);	
				
				echo("<script>alert('Empleado guardado con exito'); window.location.href ='contacto.php?pag=vere&&acc=pac&&tipo=svere'; </script>");
			}
			else
			{
				$wsql="UPDATE paciente SET nombres='$nombres', apellidos='$apellidos', fecha_nac='$fecha_nacimiento', genero='$genero', telefono='$telefonos' WHERE cedula='$cedulag'";
				$result = mysql_query($wsql,$link);
				echo mysql_error($link);
				
				//Historial
				$wsql3="SELECT idactividad FROM actividades WHERE nombre_actividad='Modificar paciente'";
				$result3 = mysql_query($wsql3,$link);
				$row3 = mysql_fetch_array($result3);
				$idactividad=$row3['idactividad'];
				echo mysql_error($link);
				$nombreusuario = $_SESSION['userid'];
				$fecha=date("Y-m-d");
				$wsql4="INSERT INTO historial (idactividad,nombre_usuario,fecha) VALUES ('$idactividad','$nombreusuario','$fecha')";
				echo $wsql4;
				$result4 = mysql_query($wsql4,$link);
				echo mysql_error($link);	
				
				echo("<script>alert('Empleado actualizado con exito'); window.location.href ='contacto.php?pag=vere&&acc=pac&&tipo=svere'; </script>");
			}
			
			$sesionid = $_SESSION['userid'];
			
			$persontac = "SELECT idempresa FROM usuario WHERE nombre_usuario = '$sesionid'";
			$resultp = mysql_query($persontac);
			$idemp = mysql_result($resultp,0);
			
			$wsql = mysql_query("SELECT idpaciente FROM paciente WHERE cedula='$cedulag'",$link);
			$idp = mysql_result($wsql,0);
			
			$verificar = mysql_query("SELECT idconvenio FROM convenio_paciente WHERE idpaciente = '$idp' AND idempresa = '$idemp'");
			$numero_filas = mysql_num_rows($verificar);
			
			if($numero_filas == 0)
			{
				$wsql="INSERT INTO convenio_paciente (idpaciente, idempresa) VALUES ('$idp','$idemp')";
				$result = mysql_query($wsql);
				
				//Historial
				$wsql3="SELECT idactividad FROM actividades WHERE nombre_actividad='Agregar empleado'";
				$result3 = mysql_query($wsql3,$link);
				$row3 = mysql_fetch_array($result3);
				$idactividad=$row3['idactividad'];
				echo mysql_error($link);
				$nombreusuario = $_SESSION['userid'];
				$fecha=date("Y-m-d");
				$wsql4="INSERT INTO historial (idactividad,nombre_usuario,fecha) VALUES ('$idactividad','$nombreusuario','$fecha')";
				$result4 = mysql_query($wsql4,$link);
				echo mysql_error($link);	
			}
			
			
		}
		else
		{
	
			$sesionid = $_SESSION['userid'];
			$persontac = "SELECT idempresa FROM usuario WHERE nombre_usuario = '$sesionid'";
			$resultp = mysql_query($persontac);
			$idemp = mysql_result($resultp,0);
			$id = $_GET['idempleado'];
			if($_GET['action']=='modificar')
			{
				$nombres = $_POST["nombre1"];
				$apellidos = $_POST["apellido1"];
				$fecha_nacimiento = $_POST["fecha_nacimiento"];
				$telefono = $_POST["telefono"];
				$wsql="UPDATE paciente SET nombres='$nombres', apellidos='$apellidos', fecha_nac='$fecha_nacimiento', telefono='$telefono' WHERE cedula='$id'";
				$result = mysql_query($wsql);
				
				//Historial
				$wsql3="SELECT idactividad FROM actividades WHERE nombre_actividad='Modificar empleado'";
				$result3 = mysql_query($wsql3,$link);
				$row3 = mysql_fetch_array($result3);
				$idactividad=$row3['idactividad'];
				echo mysql_error($link);
				$nombreusuario = $_SESSION['userid'];
				$fecha=date("Y-m-d");
				$wsql4="INSERT INTO historial (idactividad,nombre_usuario,fecha) VALUES ('$idactividad','$nombreusuario','$fecha')";
				$result4 = mysql_query($wsql4,$link);
				echo mysql_error($link);	
				
				
				echo("<script>alert('Se ha modificado el paciente');  window.close(); window.opener.location.reload(); </script>");
				
			}
			
			if($_GET['action']=='anular')
			{	
				$wsql="DELETE FROM convenio_paciente WHERE idpaciente='$id' AND idempresa='$idemp'";
				mysql_query($wsql);
				
				//Historial
				$wsql3="SELECT idactividad FROM actividades WHERE nombre_actividad='Eliminar empleado'";
				$result3 = mysql_query($wsql3,$link);
				$row3 = mysql_fetch_array($result3);
				$idactividad=$row3['idactividad'];
				echo mysql_error($link);
				$nombreusuario = $_SESSION['userid'];
				$fecha=date("Y-m-d");
				$wsql4="INSERT INTO historial (idactividad,nombre_usuario,fecha) VALUES ('$idactividad','$nombreusuario','$fecha')";
				$result4 = mysql_query($wsql4,$link);
				echo mysql_error($link);	
				
				
				echo("<script>alert('Se ha elimiado existosamente el empleado'); window.location.href ='contacto.php?pag=vere&&acc=pac&&tipo=svere'; </script>");
				
			}
		}
		
		
	}
			



?>	


