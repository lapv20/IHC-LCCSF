<?php 
	include("conexion.php");
	if(isset($_GET['accion'])){
		
		if($_GET['accion']=="nuevo"){
			extract($_POST);
			
			$wsql = "select * from usuario order by nombre_usuario desc";
			$result = mysql_query($wsql,$link);
			$row = mysql_fetch_array($result);
			
			if(mysql_num_rows($result)==0){
				$usuario="s1";
				$wsql="insert into usuario (nombre_usuario,clave,nombres,apellidos,idempresa,tipo_usuario,correo,telefono) values('$usuario','$clave','$nombre','$apellido','$empresa','$tipousuario','$correo','$telefono')";
			}else{
				$wsql = "select * from usuario where idempresa = '$empresa'";
				$result = mysql_query($wsql,$link);
				$row = mysql_fetch_array($result);
				
				if(mysql_num_rows($result)>0){
					echo "<script> location.href='principal.php?accion=cuentas&tipo=nuevo';alert('Ya existe un usuario asociado a esta empresa'); </script>";
				}else{
				
					$wsql = "select * from usuario order by nombre_usuario desc";
					$result = mysql_query($wsql,$link);
					$row = mysql_fetch_array($result);
					extract($_POST);
					$aux = $row['nombre_usuario'];
					$can = strlen($aux);
					$aux1 = substr($aux,1,-1);
					$usuario = $aux1.$aux[$can-1];
					$usuario++;	
					$usuario = "s".$usuario;
					
					$clave = rand();

					$nombres = $nombre1." ".$nombre2;
					$apellidos = $apellido1." ".$apellido2;
					
					$wsql="insert into usuario (nombre_usuario,clave,nombres,apellidos,idempresa,tipo_usuario,correo,telefono) values('$usuario','$clave','$nombres','$apellidos','$empresa','$tipousuario','$correo','$telefono')";
					
					echo $wsql;
					mysql_query($wsql,$link);
					echo "<script>location.href='principal.php?accion=informacionUsuario&nombreUsuario=$usuario';alert('Usuario creado con exito'); </script>";
				}
				
			}			
		}
		
		if($_GET['accion']=='modificar'){
			extract($_POST);
			$usuario = $_GET['usuario'];
			
			$wsql ="select * from usuario where idempresa='$empresa' and nombre_usuario='".$usuario."';";
			$result = mysql_query($wsql,$link);
			
			if($result > 0){
				$row = mysql_fetch_array($result);
				if($row['nombre_usuario'] == $usuario){
					$wsql = "update usuario set nombres='$nombre',apellidos='$apellido',idempresa='$empresa',correo='$correo',telefono='$telefono',tipo_usuario='$tipousuario' where nombre_usuario='$usuario'";
					mysql_query($wsql,$link);
					echo "<script>window.location.href='modificarUsuario.php?usuario=$usuario';window.close();</script>";
				}else{
					echo "<script>alert('Ya existe un usario asociado a esta empresa');window.location='modificarUsuario.php?usuario=$usuario'</script>";
				}
			}
		}
		
		if($_GET['accion']=='eliminar'){
			$idusuario = $_GET['idusuario'];
			
			$wsql = "delete from usuario where nombre_usuario='$idusuario'";
			mysql_query($wsql,$link);
			
			echo "<script>alert('Usuario eliminado con exito');window.location='principal.php?accion=cuentas&tipo=eliminar';</script>";
		}
	}
?>