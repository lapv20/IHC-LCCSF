<?php 
	include("conexbd.php");
	session_start();
	
	if(isset($_GET['accion'])){		
	
		if($_GET['accion']=="modificar"){
			extract($_GET);
			
			$sesionid = $_SESSION['userid'];
			$persontac = "SELECT * FROM usuario WHERE nombre_usuario = '$sesionid'";
			$resultp = mysql_query($persontac);
			$row = mysql_fetch_array($resultp);
			$idemp = $row['idempresa'];
			
			$cedula = $_GET['cedula'];
			
			$wsql="SELECT * FROM paciente WHERE cedula='".$cedula."'";
			echo $wsql;
		}
	}
?>