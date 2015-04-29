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
</script>


<div class="widget ">
	<center><h4 class="widgettitle"> Nuevo Tipo de Usuario</h4></center>
    <div class="widgetcontent nopadding">
    	<form class="stdform stdform2" method="post" action="tipoUsuario.php?accion=nuevo">
        	<p>
                <label>Nombre</label>
                <span class="field"><input type="text" id="nombre" name="nombre" class="input-xxlarge" placeholder="Nombre" /></span>
            </p>
            
            
            <p class="stdformbutton">
                    <input type="submit" class="btn btn-primary" value="Crear">
                    <input type="reset" class="btn btn-primary" value="Cancelar">
            </p>
        </form>
    </div>
</div>
