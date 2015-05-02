<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Informacion de usuario</title>

</head>
<body>
<?php 
	include("conexion.php");
	$nombreUsuario = $_SESSION['userid'];
	$wsql = "select * from usuario where nombre_usuario='$nombreUsuario'";
	$result = mysql_query($wsql,$link);
	$row = mysql_fetch_array($result);
?>

<div class="widget">
	<center><h4 class="widgettitle"> Informacion Usuario</h4></center>
</div>
    <table class="table table-bordered table-invoice">
        <tbody>
            <tr>
                <td class="width30">Nombre</td>
                <td class="width70"><?php echo $row['nombres'];?></td>
            </tr><tr>
                <td class="width30">Apellidos</td>
                <td class="width70"><?php echo $row['apellidos'];?></td>
            </tr><tr>
                <td class="width30">Empresa</td>
                <td class="width70"><?php 
                $wsql = "select * from empresa where idempresa=".$row['idempresa'];
                $result = mysql_query($wsql,$link);
                $row2 = mysql_fetch_array($result);
                echo $row2['nombre_empresa']."</br><b>Convenio: </b>".$row2['tipo_convenio']."</br><b>Dirección: </b>".$row2['direccion']."</br><b>Telefonos: </b>".$row2['telefono'];?></td>
            </tr><tr>
                <td class="width30">Telefonos</td>
                <td class="width70"><?php echo $row['telefono'];?></td>
            </tr><tr>
                <td class="width30">Correo</td>
                <td class="width70"><?php echo $row['correo'];?></td>
            </tr><tr>
                <td class="width30">Tipo Usuario</td>
                <td class="width70"><?php 
                $wsql = "select * from tipo_usuario where idtipousuario=".$row['tipo_usuario'];
                $result = mysql_query($wsql,$link);
                $row2 = mysql_fetch_array($result);
                echo $row2['nombretipo_usuario'];?></td>
            </tr><tr>
                <td class="width30">Usuario</td>
                <td class="width70"><?php echo $row['nombre_usuario'];?></td>
            </tr><tr>
                <td class="width30">Contraseña</td>
                <td class="width70"><?php echo $row['clave'];?></td>
            </tr>
        </tbody>
    </table>
</body>
</html>