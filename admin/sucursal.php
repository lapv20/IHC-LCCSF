<?php 
	include("conexion.php");
	if(isset($_GET['accion'])){
		
		if($_GET['accion']=="nuevo"){
			extract($_POST);
			$RIF = $rif1."-".$rif2."-".$rif3;
			$wsql="insert into laboratorios (nombre_laboratorio,rif,direccion,telefono) values ('$nombre','$RIF','$direccion','$telefono')";
			mysql_query($wsql,$link);
			echo"<script>
				alert('Sucursal agregada con exito');
				window.location='principal.php?accion=sucursal&tipo=nuevo';
			</script>";
		}
		
		if($_GET['accion']=="modificar"){
			extract($_POST);
			$id = $_GET['id'];
			$RIF = $rif1."-".$rif2."-".$rif3;
			$wsql ="update laboratorios set nombre_laboratorio='$nombre', direccion='$direccion', telefono='$telefono', rif='$RIF' where idsucursal='$id'";
			mysql_query($wsql,$link);
			echo"<script>
				alert('Sucursal Modificada con exito');
				window.close();
				window.opener.location.reload();
			</script>";
		}
		if($_GET['accion']=="eliminar"){
			$id = $_GET["id"];
			$wsql = "delete from laboratorios where idsucursal='$id'";
			mysql_query($wsql,$link);
			
			echo "<script>
				window.location='principal.php?accion=sucursal&tipo=modificar';
				alert('Sucursal eliminada con exito');
			</script>";
		}
	}
?>