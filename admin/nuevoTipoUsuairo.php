<?php include("conexion.php");?>

<script>
function validar(){
	var formulario  =  document.getElementsByTagName('form');
	var con = 0,a="";
	
	for(i=0;i<document.forms[0].elements.length;i++){
		con++;
		a = a+" "+ document.forms[0].elements[i].type;
	}
	
	alert("con "+a);
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
</script>


<div class="widget ">
    <h4 class="widgettitle"> Nuevo Tipo de Usuario</h4>
    <div class="widgetcontent nopadding">
    	<form class="stdform stdform2" method="post" action="tipoUsuario.php?accion=nuevo">
        	<p>
                <label>Nombre<small>Escriba el tipo de usuario</small></label>
                <span class="field"><input type="text" id="nombre" name="nombre" onKeyDown="return validarLetras(event)" required class="input-xxlarge" placeholder="Nombre" /></span>
            </p>
            <p class="stdformbutton">
                <button type="submit" class="btn btn-primary"><span class="iconfa-plus"></span> Añadir Nuevo Tipo</button>
                <button type="reset" class="btn"><i class=" iconfa-refresh icon-white"></i> Restablecer</button>
            </p>
        </form>
    </div>
</div>
