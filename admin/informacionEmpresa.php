<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Informacion de usuario</title>
</head>
<body>

<?php 
	include("conexion.php");
	$nombreUsuario = $_GET['nombreUsuario'];
	$wsql = "select * from usuario where nombre_usuario='$nombreUsuario'";
	$result = mysql_query($wsql,$link);
	$row = mysql_fetch_array($result);
?>

<div class="widget ">
	<center><h4 class="widgettitle"> Informacion Empresa</h4></center>
    <div class="widgetcontent">
    
    	<form class="stdform" method="post" action="usuarios.php?accion=nuevo">
        	<p>
                <label><b>Nombre</b></label>
                <span class="field" style="padding:5px;"><?php echo $row['nombres'];?></span>
            </p>
            <p>
                <label><b>Apellido</b></label>
                <span class="field" style="padding:5px;"><?php echo $row['apellidos'];?></span>
            </p>
            
            <p>
                <label><b>Empresa</b></label>
                <span class="field" style="padding:5px;"><?php echo $row['idempresa'];?></span>
            </p>
            <p>
                <label><b>Telefono</b></label>
                <span class="field" style="padding:5px;"><?php echo $row['telefono'];?></span>
            </p>
            
            <p>
                <label><b>Correo</b></label>
                <span class="field" style="padding:5px;"><?php echo $row['correo'];?></span>
            </p>
            
            <p>
                <label><b>Tipo de usuario</b></label>
                <span class="field" style="padding:5px;"><?php echo $row['tipo_usuario'];?></span>
            </p>
            
            <p>
                <label><b>Nombre de usuario</b></label>
                <span class="field" style="padding:5px;"><?php echo $row['nombre_usuario'];?></span>
            </p>
            
            <p>
                <label><b>Contraseña</b></label>
                <span class="field" style="padding:5px;"><?php echo $row['clave'];?></span>
            </p>
            
        </form>
    </div>
</div>
</body>
</html>