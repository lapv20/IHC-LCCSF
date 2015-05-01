<?php 
	include("../admin/conexion.php"); 
	session_start();
	extract($_POST);
if(isset($_GET['accion']))
{	
	if($_GET['accion']=='nuevo')
	{
		$idpaciente = $_POST["idpaciente"];
		$idperfil=$_POST["idperfil"];
		$idsucursal=$_POST["idsucursal"];
		$year=date("y");
		$mes=date("n");
		if($mes==1)
		{
			$contador = 1;
		}
			
		$wsql="SELECT * FROM paciente WHERE idpaciente='$idpaciente'";
		$result=mysql_query($wsql,$link);
		$row = mysql_fetch_array($result);
		if($row>0)
		{
			$cedula_paciente=$row["cedula"];
			$estatus="Pendiente";
			//Parte de la hora
			$hora = time() + (60 *60 * 1);  //una hora mas
			$hora_estimada=date('h:i:s',$hora);
			//Para el numero de la orden que sea año-numero
			$wsql1="SELECT * FROM ordenservicio ORDER BY numero_orden DESC";
			$result1=mysql_query($wsql1,$link);
			$row1 = mysql_fetch_array($result1);
			if($row1>0)
			{
				$contador=substr($row1['numero_orden'],3,1);
				$contador++;
				$numerorden=$year.'-'.$contador;
			}else{
				$contador=1;
				$numerorden=$year-'.'.$contador;	
			}
			$wsql2="INSERT INTO ordenservicio (numero_orden,hora_estimada,estatus,cedula_paciente,idempresa,idsucursal,idperfil) VALUES ('$numerorden','$hora_estimada','$estatus','$cedula_paciente','1','$idsucursal','$idperfil')";
			$result2 = mysql_query($wsql2,$link);
			echo mysql_error($link);
				
			$wsql3="SELECT idactividad FROM actividades WHERE nombre_actividad='Generar orden servicio'";
			$result3 = mysql_query($wsql3,$link);
			$row3 = mysql_fetch_array($result3);
			$idactividad=$row3['idactividad'];
			echo mysql_error($link);
			$nombreusuario = $_SESSION['userid'];
			$fecha=date("Y-m-d");
			$wsql4="INSERT INTO historial (idactividad,nombre_usuario,fecha) VALUES ('$idactividad','$nombreusuario','$fecha')";
			$result4 = mysql_query($wsql4,$link);
			echo mysql_error($link);		
			echo('<script type="text/javascript"> alert("Orden de Servicio creada exitosamente"); window.location.href="principal.php?accion=ordenser&tipo=veros"	</script>');
			
		}else{
			echo('<script type="text/javascript"> alert("El paciente no existe");</script>');
		}
	}
		if($_GET['accion']=='modificar')
		{
			$idorden=$_GET["idordenservicio"];
			$perfil = $_POST["perfil"];
			$laboratorio = $_POST["sucursal"];
			$estatus= $_POST["estatus"];
			
			if($estatus=="-1"){
				$wsql="UPDATE ordenservicio SET idperfil='$perfil', idsucursal='$laboratorio' WHERE idordenservicio='$idorden'";
			}else{
				$wsql="UPDATE ordenservicio SET idperfil='$perfil', idsucursal='$laboratorio', estatus='$estatus' WHERE idordenservicio='$idorden'";
			}
			
			$result = mysql_query($wsql);
			
			$wsql3="SELECT idactividad FROM actividades WHERE nombre_actividad='Modificar orden servicio'";
			$result3 = mysql_query($wsql3,$link);
			$row3 = mysql_fetch_array($result3);
			$idactividad=$row3['idactividad'];
			echo mysql_error($link);
			$nombreusuario = $_SESSION['userid'];
			$fecha=date("Y-m-d");
			$wsql4="INSERT INTO historial (idactividad,nombre_usuario,fecha) VALUES ('$idactividad','$nombreusuario','$fecha')";
			$result4 = mysql_query($wsql4,$link);
			echo mysql_error($link);		
			
			echo("<script>alert('Se ha modificado la orden de servicio');  window.close(); window.opener.location.reload(); </script>");
		}
		
		if($_GET['accion']=='anular')
		{
			$idorden=$_GET["idordenservicio"];
			$hora = time(); 
			$hora_actual=date('h:i:s',$hora);
			$wsql="SELECT * FROM ordenservicio WHERE idordenservicio='$idorden'";
			$result=mysql_query($wsql,$link);
			$row = mysql_fetch_array($result);
			
			if($hora_actual>$row['hora_estimada'])
			{
        		echo('<script type="text/javascript"> alert("Ha pasado la hora estimada para anular la orden. Comuniquese con el Administrador"); window.location.href="principal.php?accion=ordenser&tipo=veros"	</script>');
			}else{
				$wsql="UPDATE ordenservicio SET estatus='Anulada' WHERE idordenservicio='$idorden'";
				$result = mysql_query($wsql);
				
				$wsql3="SELECT idactividad FROM actividades WHERE nombre_actividad='Anular orden servicio'";
				$result3 = mysql_query($wsql3,$link);
				$row3 = mysql_fetch_array($result3);
				$idactividad=$row3['idactividad'];
				echo mysql_error($link);
				$nombreusuario = $_SESSION['userid'];
				$fecha=date("Y-m-d");
				$wsql4="INSERT INTO historial (idactividad,nombre_usuario,fecha) VALUES ('$idactividad','$nombreusuario','$fecha')";
				$result4 = mysql_query($wsql4,$link);
				echo mysql_error($link);		
				
				echo('<script type="text/javascript"> alert("Orden anulada"); window.location.href="principal.php?accion=ordenser&tipo=veros"	</script>');
			}
			
			
		}
		
}
?>	