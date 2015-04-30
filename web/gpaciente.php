<?php 
	include("conexbd.php"); 
	session_start();
	if(isset($_GET['accion']))
	{	
		if($_GET['accion']=='nuevo')
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
	
			$wsql="SELECT cedula FROM paciente WHERE cedula='$cedulag' ";
			$result = mysql_query($wsql,$link);
			$row = mysql_fetch_array($result);
			echo mysql_error($link);
	
			if($row>0){
				
			$wsql2="UPDATE paciente SET nombres='$nombres',apellidos='$apellidos',fecha_nac='$fecha_nacimiento',genero='$genero',telefono='$telefonos' WHERE cedula='$cedulag' ";
				$result2 = mysql_query($wsql2,$link);
				echo mysql_error($link);
		
			}
			else
			{
				$wsql2="INSERT INTO paciente (cedula,nombres,apellidos,fecha_nac,genero,telefono) VALUES ('$cedulag','$nombres','$apellidos','$fecha_nacimiento','$genero','$telefonos')";
			$result2 = mysql_query($wsql2,$link);
			echo mysql_error($link);
		
			}
			
			$wsql3="SELECT idactividad FROM actividades WHERE nombre_actividad='Agregar paciente'";
			$result3 = mysql_query($wsql3,$link);
			$row3 = mysql_fetch_array($result3);
			$idactividad=$row3['idactividad'];
			echo mysql_error($link);
			$nombreusuario = $_SESSION['userid'];
			$fecha=date("Y-m-d");
		    $wsql4="INSERT INTO historial (idactividad,nombre_usuario,fecha) VALUES ('$idactividad','$nombreusuario','$fecha')";
			$result4 = mysql_query($wsql4,$link);
			echo mysql_error($link);
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
			
	echo('<script type="text/javascript"> alert("Paciente Agregado Exitosamente"); window.location.href="principal.php"	</script>');
			
		}
		
		if($_GET['accion']=='modificar')
		{
			extract($_POST);
			
			$nombres=$_POST["nombres"];
			$apellidos=$_POST["apellidos"];
			$fecha_nacimiento=$_POST["fecha_nacimiento"];
			$telefono=$_POST["telefono"];
			$paciente = $_GET['paciente'];
			
			$wsql1="UPDATE paciente SET nombres='$nombres',apellidos='$apellidos',fecha_nac='$fecha_nacimiento',telefono='$telefono' WHERE idpaciente='$paciente' ";
			$result1 = mysql_query($wsql1,$link);
			
			$wsql3="SELECT idactividad FROM actividades WHERE nombre_actividad='Modificar paciente'";
			$result3 = mysql_query($wsql3,$link);
			$row3 = mysql_fetch_array($result3);
			$idactividad=$row3['idactividad'];
			echo mysql_error($link);
			$nombreusuario = $_SESSION['userid'];
			$fecha=date("Y-m-d");
		    $wsql4="INSERT INTO historial (fecha,idactividad,nombre_usuario) VALUES ('$fecha','$idactividad','$nombreusuario')";
			$result4 = mysql_query($wsql4,$link);
			echo mysql_error($link);
			
			echo "<script>alert('Paciente modificado con exito');window.close(); window.opener.location.reload();</script>";
		
		}
		if($_GET['accion']=='eliminar')
		{
			extract($_POST);
			$paciente = $_GET['paciente'];
			
			$wsql="DELETE FROM paciente WHERE idpaciente='$paciente'";
			$result = mysql_query($wsql,$link);
			
			$wsql3="SELECT idactividad FROM actividades WHERE nombre_actividad='Eliminar paciente'";
			$result3 = mysql_query($wsql3,$link);
			$row3 = mysql_fetch_array($result3);
			$idactividad=$row3['idactividad'];
			echo mysql_error($link);
			$nombreusuario = $_SESSION['userid'];
			$fecha=date("Y-m-d");
		    $wsql4="INSERT INTO historial (fecha,idactividad,nombre_usuario) VALUES ('$fecha','$idactividad','$nombreusuario')";
			$result4 = mysql_query($wsql4,$link);
			echo mysql_error($link);
			
			echo("<script>alert('Se ha eliminado el paciente'); window.location.href ='principal.php?accion=pacientes&tipo=vep'; </script>");
		
		}

	}
?>