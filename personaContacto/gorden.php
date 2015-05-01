<?php 
	include("../admin/conexion.php");
	session_start();
	extract($_POST);
	$sesionid = $_SESSION['userid'];
if(isset($_GET['accion']))
{	
	if($_GET['accion']=='nuevo')
	{
		$idpaciente = $_POST["idpaciente"];
		$idperfil=$_POST["idperfil"];
		$idsucursal=$_POST["idsucursal"];
		//Parte de la hora
			$hora = time() + (60 *60 * 1);  //una hora mas
			$hora_estimada=date('H:i:s',$hora);
			//Para el numero de la orden que sea año-numero
			$wsql1="SELECT * FROM ordenservicio ORDER BY numero_orden DESC";
			$result1=mysql_query($wsql1,$link);
			$row1 = mysql_fetch_array($result1);
			$year=date("y");
			$mes=date("n");
			if($row1>0)
			{
				$contador=substr($row1['numero_orden'],3,1);
				$contador++;
				$numerorden=$year.'-'.$contador;
			}else{
				$contador=1;
				$numerorden=$year-'.'.$contador;	
			}
			
		$wsql="SELECT * FROM paciente WHERE idpaciente='$idpaciente'";
		$result=mysql_query($wsql,$link);
		$row = mysql_fetch_array($result);
		$cedulag = $row['cedula'];
		$persontac = "SELECT idempresa FROM usuario WHERE nombre_usuario = '$sesionid'";
		$resultp = mysql_query($persontac);
		$idemp = mysql_result($resultp,0);
		$wsql="SELECT * FROM paciente p, convenio_paciente c WHERE p.cedula='$cedulag' AND p.idpaciente=c.idpaciente AND c.idempresa='$idemp'";
		$result2=mysql_query($wsql);
		if(mysql_num_rows($result2)>0)
		{
			$resultado_orden = mysql_query("SELECT idordenservicio FROM ordenservicio WHERE cedula_paciente='$cedulag'",$link);
			$numero_filas = mysql_num_rows($resultado_orden);
			if($numero_filas == 0)
			{
				$numero_orden_servicio = 1;
			}
			else
			{
				$numero_orden_servicio = $numero_filas + 1;
			}
			$wsql = mysql_query("SELECT idpaciente FROM paciente WHERE cedula='$cedulag'",$link);
			$idp = mysql_result($wsql,0);
			$wsql="INSERT INTO ordenservicio (numero_orden,hora_estimada,estatus,cedula_paciente,idempresa,idsucursal,idperfil) VALUES ('$numerorden','$hora_estimada','Pendiente','$cedulag','$idemp','$idsucursal','$idperfil')";
			$result = mysql_query($wsql);
				
				//Id Actividad	
				$wsql3="SELECT idactividad FROM actividades WHERE nombre_actividad='Generar orden servicio'";
				$result3 = mysql_query($wsql3,$link);
				$row3 = mysql_fetch_array($result3);
				$idactividad=$row3['idactividad'];
				echo mysql_error($link);
				$nombreusuario = $_SESSION['userid'];
				$fecha=date("Y-m-d");
				$wsql4="INSERT INTO historial (idactividad,nombre_usuario,fecha) VALUES ('$idactividad','$nombreusuario','$fecha')";
				$result4 = mysql_query($wsql4,$link);
				//echo mysql_error($link);		
				echo("<script>alert('Se ha creado la orden de sercivio con exito'); window.location.href ='contacto.php?pag=vo&&acc=pac&&tipo=svo'; </script>");
		}
		else
		{
			echo("<script>alert('No existe el empleado'); window.location.href ='contacto.php?pag=adde&&acc=pac&&tipo=sadde'; </script>");
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
        		echo('<script type="text/javascript"> alert("Ha pasado la hora estimada para anular la orden. Comuniquese con el Administrador"); window.location.href="contacto.php?pag=vo&&acc=pac&&tipo=svo"	</script>');
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
				
				echo("<script>alert('Se ha anulado la orden de servicio'); window.location.href ='contacto.php?pag=vo&acc=pac&tipo=svo'; </script>");
			}
			
			
		}
		
}
?>	