<?php 
	include("conexion.php");
	
	if(isset($_GET['accion'])){
		if($_GET['accion']=="nuevo"){
			extract($_POST);
			$RIF =$rif1." ".$rif2." ".$rif3;
			
			
			$wsql ="insert into empresa (nombre_empresa,tipo_convenio,telefono,rif,direccion) values('$nombre','$tipo_convenio','$telefono','$RIF','$direccion')";
			
			mysql_query($wsql,$link);
			echo "<script> alert('Empresa creada con exito');location.href='principal.php?accion=empresa&tipo=nuevo'; </script>";
		}
		
		if($_GET['accion']=="modificar"){
			extract($_POST);
			$id = $_GET['id'];
			$RIF =$rif1." ".$rif2." ".$rif3;
			$wsql ="update empresa set nombre_empresa='$nombre',tipo_convenio='$tipo_convenio',telefono='$telefono',rif='$RIF',direccion='$direccion' where idempresa=$id";
			
			mysql_query($wsql,$link);
			echo "<script> 
				alert('Empresa Modificada con exito');
				window.close();
				window.opener.location.reload();
			</script>";
			
		}
		if($_GET['accion']=="eliminar"){
			$id = $_GET['id'];
			$wsql = "delete from empresa where idempresa='$id'";
			mysql_query($wsql,$link);
			echo "<script>
				alert('Empresa Eliminada');
				window.location='principal.php?accion=empresa&tipo=modificar';
				</script>";
		}
	}
	
?>