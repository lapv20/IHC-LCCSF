<?php 
	include("conexion.php");
	
	if(isset($_GET['accion'])){
		if($_GET['accion']=="anular"){
			
			if(isset($_GET['numero'])){
				$orden = $_GET['numero'];
				$wsql ="update ordenservicio set estatus='Anulado' where numero_orden='$orden'";
				mysql_query($wsql,$link);
				mysql_error($link);
				echo "<script>
					window.location='principal.php?accion=orden&tipo=anular'
					alert('Orden Anulada');
				</script>";
				
			}
		}
	}
?>