<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>

<link rel="stylesheet" href="archivos/css/style.default.css" type="text/css" />

<link rel="stylesheet" href="archivos/css/responsive-tables.css">
<link rel="stylesheet" href="archivos/css/style.default.css" type="text/css" />
<link rel="stylesheet" href="archivos/css/bootstrap-fileupload.min.css" type="text/css" />
<link rel="stylesheet" href="archivos/css/bootstrap-timepicker.min.css" type="text/css" />

<script type="text/javascript" src="archivos/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="archivos/js/jquery-migrate-1.1.1.min.js"></script>
<script type="text/javascript" src="archivos/js/jquery-ui-1.9.2.min.js"></script>
<script type="text/javascript" src="archivos/js/modernizr.min.js"></script>
<script type="text/javascript" src="archivos/js/bootstrap.min.js"></script>
<script type="text/javascript" src="archivos/js/jquery.cookie.js"></script>
<script type="text/javascript" src="archivos/js/jquery.uniform.min.js"></script>
<script type="text/javascript" src="archivos/js/flot/jquery.flot.min.js"></script>
<script type="text/javascript" src="archivos/js/flot/jquery.flot.resize.min.js"></script>
<script type="text/javascript" src="archivos/js/responsive-tables.js"></script>
<script type="text/javascript" src="archivos/js/custom.js"></script>

<script type="text/javascript" src="archivos/js/bootstrap-fileupload.min.js"></script>
<script type="text/javascript" src="archivos/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="archivos/js/bootstrap-timepicker.min.js"></script>
<script type="text/javascript" src="archivos/js/jquery.tagsinput.min.js"></script>
<script type="text/javascript" src="archivos/js/jquery.autogrow-textarea.js"></script>
<script type="text/javascript" src="archivos/js/charCount.js"></script>
<script type="text/javascript" src="archivos/js/colorpicker.js"></script>
<script type="text/javascript" src="archivos/js/ui.spinner.min.js"></script>
<script type="text/javascript" src="archivos/js/chosen.jquery.min.js"></script>
<script type="text/javascript" src="archivos/js/forms.js"></script>


<script type="text/javascript" src="archivos/js/jquery.dataTables.min.js"></script>

</head>

<body>

<?php 
	include("conexion.php");
	$usuario = $_GET['usuario'];
	$wsql = "select * from usuario,empresa where nombre_usuario='$usuario' and usuario.idempresa=empresa.idempresa";
	$result = mysql_query($wsql,$link);
	$row = mysql_fetch_array($result);
	
?>

<div class="widget " >
	<center><h4 class="widgettitle" > Modificar Usuario</h4></center>
    <div class="widgetcontent">
    
    	<form class="stdform" method="post" action="usuarios.php?accion=modificar&amp;usuario=<?php echo $usuario;?>">
        	<p>
                <label>Nombre</label>
                <span class="field"><input type="text" id="nombre" name="nombre" class="input-medium" placeholder="Nombre" value="<?php echo $row['nombres'];?>"/></span>
            </p>
            <p>
                <label>Apellido</label>
                <span class="field"><input type="text" name="apellido" class="input-medium" placeholder="Apellido" value="<?php echo $row['apellidos'];?>" /></span>
            </p>
            
            <?php 
				$wsql ="select * from empresa";
				$result = mysql_query($wsql,$link);
			?>
            
            <p>
               <label>Empresa</label>
                <span class="field">
                <select  name="empresa" data-placeholder="Seleccione una Opcion" style="width:350px" class="chzn-select" tabindex="2">
                    <option value="-1">Seleccione una Opcion</option>
                    <?php 
						while($row1 = mysql_fetch_array($result)){
					?>
                    	<option value="<?php echo $row1["idempresa"];?>" <?php if($row['idempresa']==$row1['idempresa']){?>selected="selected" <?php }?> ><?php echo $row1["nombre_empresa"];?></option>
                    <?php }?>
                </select>
                </span>
            </p>
            
            <p>
                <label>Telefono</label>
                <span class="field"><input type="text" name="telefono" class="input-medium" placeholder="Telefono" value="<?php echo $row['telefono'];?>" /></span>
            </p>
            <p>
                <label>Correo</label>
                <span class="field"><input type="text" name="correo" class="input-medium" placeholder="Correo" value="<?php echo $row['correo'];?>"/></span>
            </p>
             
             <?php 
				$wsql ="select * from tipo_usuario";
				$result = mysql_query($wsql,$link);
			?>
            
            <p>
                <label>Tipo Usuario</label>
                <span class="field">
                <select name="tipousuario" class="uniformselect">
                    <option value="-1">Seleecione una Opcion</option>
                    <?php 
						while($row1 = mysql_fetch_array($result)){
					?>
                    <option value="<?php echo $row1['idtipousuario'];?>" <?php if($row1['idtipousuario'] == $row['tipo_usuario']){?>selected="selected" <?php }?>><?php echo $row1['nombretipo_usuario'];?></option>
                    <?php }?>
                </select>
                </span>
            </p>
            
            <p class="stdformbutton">
                    <input type="submit" class="btn btn-primary" value="Guardar">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="button" onclick="window.close();" class="btn btn-primary" value="Cancelar">
            </p>
        </form>
    </div>
</div>

</body>
</html>