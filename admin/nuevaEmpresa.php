<?php include("conexion.php");?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Nueva Sucursal</title>

<script type="text/javascript">
function validateForm() {
    var tconvenio = document.forms["form"]["tipo_convenio"].value;
    if (tconvenio== null || tconvenio == "-1") {
        alert("No se ha elegido el tipo de convenio");
        return false;
    }
}

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
function validarLyN(e) 
{  
    tecla = (document.all) ? e.keyCode : e.which; // 2
    if (tecla==8) return true; // backspace
    if (e.ctrlKey && tecla==86) { return true}; //Ctrl v
    if (e.ctrlKey && tecla==67) { return true}; //Ctrl c
    if (e.ctrlKey && tecla==88) { return true}; //Ctrl x
    if (tecla>=96 && tecla<=105) { return true;} //numpad
    patron = /[0-9-a-zA-Z]/; // patron
    te = String.fromCharCode(tecla); 
    return patron.test(te); // prueba
}
function validarLyNE(e) 
{  
    tecla = (document.all) ? e.keyCode : e.which; // 2
    if (tecla==8) return true; // backspace
    if (tecla==109) return true; // menos
    if (tecla==110) return true; // punto
    if (tecla==189) return false; // guion
    if (tecla==32) return true; // espacio
    if (e.ctrlKey && tecla==86) { return true}; //Ctrl v
    if (e.ctrlKey && tecla==67) { return true}; //Ctrl c
    if (e.ctrlKey && tecla==88) { return true}; //Ctrl x
    if (tecla>=96 && tecla<=105) { return true;} //numpad
    patron = /[0-9-a-zA-Z]/; // patron
    te = String.fromCharCode(tecla); 
    return patron.test(te); // prueba
}
</script>
</head>
<body>
<div class="widget ">
	<h4 class="widgettitle"> Nuevo Empresa</h4>
    <div class="widgetcontent nopadding">
        <form class="stdform stdform2" id="form" method="post" action="empresa.php?accion=nuevo" onsubmit="return validateForm()">
        	<p>
                <label>Nombre</label>
                <span class="field"><input name="nombre" type="text" onKeyDown="return validarLetras(event)"  required class="input-large" placeholder="Nombre" /></span>
            </p>            
            <p>
                <label>Tipo de Convenio</label>
                <span class="field">
                <select  name="tipo_convenio" data-placeholder="Seleccione una Opcion" class="chzn-select" tabindex="2">
                    <option value="-1">Seleccione una Opcion</option>
                    	<option value="Convenio Empresarial">Convenio Empresarial</option>                        
                        <option value="Convenio Afiliados">Convenio Afiliados</option>
                </select>
                </span>
            </p>
            
            <p>
                <label>Telefono<small>Escriba Solo Números</small></label>
                <span class="field">
                    <input name="telefono" type="text" onkeydown="return validarNumeros(event)" required class="input-large" id="telefono" placeholder="Telefono">
                </span>
            </p>
            <p>
            	<label>RIF<small>Registro de Identificación Fiscal</small></label>
                <span class="field">
            	<select  name="rif1" data-placeholder="Seleccione una Opcion" style="width:50px; margin-top:10px;" tabindex="2">
                    	<option value="V">V</option>
                        <option value="J">J</option>
                        <option value="E">E</option>
                        <option value="G">G</option>
                </select>
                
                <input name="rif2" type="text" onKeyDown="return validarLyN(event)"  required class="input-medium" placeholder="RIF" maxlength="8"/>
                <input name="rif3" type="text" onKeyDown="return validarN(event)"  required class="input-small"  style="width:10px;" maxlength="1"/>
                </span>
            </p>
            <p>
                <label>Direccion</label>
                <span class="field"><textarea cols="80" rows="5" class="span10" onKeyDown="return validarLyNE(event)" name="direccion"></textarea></span>
            </p>
                </span>
            </p>
            
            <p class="stdformbutton">
                <button type="submit" class="btn btn-primary"><span class="iconfa-plus"></span> Crear Empresa</button>
                <button type="reset" class="btn"><i class=" iconfa-refresh icon-white"></i> Restablecer</button>
            </p>
        </form>
    </div>
</div>
</body>