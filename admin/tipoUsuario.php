<?php 
	
	include("conexion.php");
	if(isset($_GET['accion'])){
		
		if($_GET['accion']=="nuevo"){

			extract($_POST);
			$wsql = "insert into tipo_usuario (nombretipo_usuario) values ('$nombre')";
			mysql_query($wsql,$link);
			
			echo "<script>
				alert('Tipo de usuario agregado con exito');
				window.location='principal.php?accion=tipoUsuario&tipo=nuevo';
			</script>";
		}
		
		if($_GET['accion']=="modificar"){
			extract($_POST);
			$id = $_GET['id'];
			$wsql = "update tipo_usuario set nombretipo_usuario='$nombre' where idtipousuario='$id'";
			mysql_query($wsql,$link);
			
			echo "<script>
				alert('Tipo usuario modificado con exito');
				window.close();
				window.opener.location.reload();
			</script>";
			
			echo $wsql;
		}
		
		if($_GET['accion']=="eliminar"){
			$id =$_GET['id'];
			$wsql = "delete from tipo_usuario where idtipousuario='$id'";
			mysql_query($wsql,$link);
			
			echo "<script>
				alert('Tipo usuario eliminado con exito');
				window.location='principal.php?accion=tipoUsuario&tipo=modificar';
			</script>";
		}
	}
?>