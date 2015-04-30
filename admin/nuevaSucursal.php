<?php include("conexion.php");?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Nueva Sucursal</title>

<script type="text/javascript">
function validarLetras(e) 
{ 
    tecla = (document.all) ? e.keyCode : e.which; 
    if (tecla==8) return true; // backspace
    if (tecla==9) return true; // tabulador
    if (tecla==32) return true; // espacio
    if (e.ctrlKey && tecla==86) { return true;} //Ctrl v
    if (e.ctrlKey && tecla==67) { return true;} //Ctrl c
    if (e.ctrlKey && tecla==88) { return true;} //Ctrl x
    patron = /[a-zA-Z]/; //patron
    te = String.fromCharCode(tecla); 
    return patron.test(te); // prueba de patron
}
function validarNumeros(e) 
{  
    tecla = (document.all) ? e.keyCode : e.which; // 2
    if (tecla==8) return true; // backspace
    if (tecla==109) return true; // menos
    if (tecla==110) return true; // punto
    if (tecla==189) return false; // guion
    if (e.ctrlKey && tecla==86) { return true}; //Ctrl v
    if (e.ctrlKey && tecla==67) { return true}; //Ctrl c
    if (e.ctrlKey && tecla==88) { return true}; //Ctrl x
    if (tecla>=96 && tecla<=105) { return true;} //numpad
    patron = /[0-9]/; // patron
    te = String.fromCharCode(tecla); 
    return patron.test(te); // prueba
}
</script>
</head>
<body>
    <div class="widget ">
	<center><h4 class="widgettitle"> Nueva Sucursal</h4></center>
    <div class="widgetcontent nopadding">
    	<form class="stdform stdform2" method="post" action="sucursal.php?accion=nuevo">
        	<p>
                <label>Nombre<small>Escriba el nombre de la sucursal</small></label>
                <span class="field"><textarea cols="80" rows="5" class="span10" name="nombre" ></textarea></span>
            </p>
            
            <p>
                <label>Direccion</label>
                <span class="field"><textarea cols="80" rows="5" class="span10" name="direccion"></textarea></span>
            </p>
            
            <p>
                <label>Telefono<small>Escriba Solo Números</small></label>
                <span class="field"><input type="text" name="telefono" onkeydown="return validarNumeros(event)" required class="input-xlarge" placeholder="Telefono" /></span>
            </p>
            <p>
            	<label>RIF<small>Registro de Identificación Fiscal</small></label>
                <span class="field">
            	<select  name="rif1" data-placeholder="Seleccione una Opcion" style="width:50px;"  tabindex="2">
                    	<option value="V">V</option>
                        <option value="J">J</option>
                        <option value="E">E</option>
                        <option value="G">G</option>
                </select>
                <input type="text" name="rif2" class="input-medium" placeholder="RIF" maxlength="8"/>
                <input type="text" name="rif3" class="input-small" style="width:10px;"  maxlength="1"/>
                </span>
            </p>
            <p class="stdformbutton">
                <button type="submit" class="btn btn-primary"><span class="iconfa-plus"></span> Crear Sucursal</button>
                <button type="reset" class="btn"><i class=" iconfa-refresh icon-white"></i> Restablecer</button>
            </p>
        </form>
    </div>
    </div>
</body>