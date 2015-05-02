<?php include("conexion.php");?>

<script type="text/javascript">
function validateForm() {
    var empresa = document.forms["form"]["empresa"].value;
    var tipoU = document.forms["form"]["tipousuario"].value;
    if (empresa== null || empresa== "-1") {
        alert("No se ha elegido la empresa asociada a la cuenta");
        return false;
    }
        if (tipoU== null || tipoU == "-1") {
        alert("No se ha elegido el tipo usuario");
        return false;
    }
}

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
function validarNumeros(e) 
{ // 1
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

<div class="widget ">
	<h4 class="widgettitle">Nueva Cuenta de Usuario</h4>
    <div class="widgetcontent nopadding">
        <form class="stdform stdform2" id="form" method="post" action="usuarios.php?accion=nuevo" onsubmit="return validateForm()">
        	<p>
                <label>Nombres<small>Escriba Solo Letras</small></label>
                    <span class="field">  
                        <input name="nombre1" type="text" onKeyDown="return validarLetras(event)" size="40" required class="input-large" placeholder="Primer Nombre" />
                        <input name="nombre2" type="text" onKeyDown="return validarLetras(event)" size="40" class="input-large" placeholder="Segundo Nombre" />
                    </span>
            </p>
            <p>
                <label>Apellidos<small>Escriba Solo Letras</small></label>
                    <span class="field">  
                        <input name="apellido1" type="text" onKeyDown="return validarLetras(event)" size="40" required class="input-large" placeholder="Primer Apellido" />
                        <input name="apellido2" type="text" onKeyDown="return validarLetras(event)" size="40"  class="input-large" placeholder="Segundo Apellido" />
                    </span>
            </p>
            
            <?php 
				$wsql ="select * from empresa";
				$result = mysql_query($wsql,$link);
			?>
            
            <p>
                <label>Empresa</label>
                <span class="field">
                <select  name="empresa" data-placeholder="Seleccione una Opcion" style="width:350px" class="chzn-select" >
                    <option value="-1">Seleccione una Opcion</option>
                    <?php 
						while($row = mysql_fetch_array($result)){
					?>
                    	<option value="<?php echo $row["idempresa"];?>"><?php echo $row["nombre_empresa"];?></option>
                    <?php }?>
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
                <label>Correo<small>nombre@empresa.com</small></label>
                <span class="field"><input type="text" name="correo" required class="input-xlarge" placeholder="Correo" /></span>
            </p>
             <?php 
				$wsql ="select * from tipo_usuario";
				$result = mysql_query($wsql,$link);
			?>
            <p>
                <label>Tipo Usuario</label>
                <span class="field">
                <select name="tipousuario" data-placeholder="Seleccione una Opcion" style="width:350px" class="chzn-select" tabindex="2">
                    <option value="-1">Seleccione una Opcion</option>
                    <?php 
						while($row = mysql_fetch_array($result)){
					?>
                    <option value="<?php echo $row['idtipousuario'];?>"><?php echo $row['nombretipo_usuario'];?></option>
                    <?php }?>
                </select>
                </span>
            </p>
            
            <p class="stdformbutton">
                <button type="submit" class="btn btn-primary"><span class="iconfa-plus"></span> Añadir Cuenta</button>
                <button type="reset" class="btn"><i class=" iconfa-refresh icon-white"></i> Restablecer</button>
            </p>
        </form>
    </div>
</div>
