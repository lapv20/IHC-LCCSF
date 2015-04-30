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
	$nombre = $_GET['nombre'];
	$tipo = $_GET['tipo'];
	$wsql = "select * from empresa where nombre_empresa='$nombre' and tipo_convenio='$tipo'";
	$result = mysql_query($wsql,$link);
	$row = mysql_fetch_array($result);
	
?>

<div class="widget " >
	<center><h4 class="widgettitle" > Modificar Usuario</h4></center>
    <div class="widgetcontent">
    
    	<form class="stdform" method="post" action="empresa.php?accion=modificar&amp;id=<?php echo $row['idempresa'];?>">
        	<p>
                <label>Nombre</label>
                <span class="field"><input type="text" id="nombre" name="nombre" class="input-medium" placeholder="Nombre" value="<?php echo $row['nombre_empresa'];?>"/></span>
            </p>
            <p>
                <label>Tipo Convenio</label>
                <span class="field">
                <select  name="tipo_convenio" data-placeholder="Seleccione una Opcion" style="width:350px" class="chzn-select" tabindex="2">
                    <option value="-1">Seleccione una Opcion</option>
                    <option value="Convenio Empresarial" <?php if($row['tipo_convenio']=="Convenio Empresarial"){?> selected="selected" <?php }?>>Convenio Empresarial</option>
                    <option value="Convenio Afiliados" <?php if($row['tipo_convenio']=="Convenio Afiliados"){?> selected="selected" <?php }?>>Convenio Afiliados</option>
                </select>
            </p>
           
            
            <p>
                <label>Telefono</label>
                <span class="field"><input type="text" name="telefono" class="input-medium" placeholder="Telefono" value="<?php echo $row['telefono'];?>" /></span>
            </p>
            <p>
            <?php 
				$RIF = array();
				$RIF = explode(" ",$row['rif']);
                
			?>
                <label>RIF</label>
            	<select  name="rif1" data-placeholder="Seleccione una Opcion" style="width:50px;"  tabindex="2">
                    	<option value="V" <?php if($RIF[0]=="V"){?> selected="selected" <?php }?>>V</option>
                        <option value="J" <?php if($RIF[0]=="J"){?> selected="selected" <?php }?>>J</option>
                        <option value="E" <?php if($RIF[0]=="E"){?> selected="selected" <?php }?>>E</option>
                        <option value="G" <?php if($RIF[0]=="G"){?> selected="selected" <?php }?>>G</option>
                </select>
                <input type="text" name="rif2" class="input-medium" placeholder="RIF" maxlength="8" value="<?php echo $RIF[1];?>"/>
                <input type="text" name="rif3" class="input-small" style="width:10px;"  maxlength="1" value="<?php echo $RIF[2];?>"/>
                </p>
            
            <p>
                <label>Direccion</label>
                <span class="field"><input type="text" name="direccion" class="input-medium" placeholder="Correo" value="<?php echo $row['direccion'];?>"/></span>
            </p>
            
            
            <p class="stdformbutton">
                    <input type="submit" class="btn btn-primary" value="Guardar">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="reset" class="btn btn-primary" value="Cancelar">
            </p>
        </form>
    </div>
</div>

</body>
</html>