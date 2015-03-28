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


<div class="widget">
	<center><h4 class="widgettitle"> Nuevo Usuario</h4></center>
    <div class="widgetcontent">
    
    	<form class="stdform" method="post" action="usuarios.php?accion=nuevo">
        	<p>
                <label>Nombre</label>
                <span class="field"><input type="text" id="nombre" name="nombre" class="input-medium" placeholder="Nombre" /></span>
            </p>
            <p>
                <label>Apellido</label>
                <span class="field"><input type="text" name="apellido" class="input-medium" placeholder="Apellido" /></span>
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
						while($row = mysql_fetch_array($result)){
					?>
                    	<option value="<?php echo $row["idempresa"];?>"><?php echo $row["nombre_empresa"];?></option>
                    <?php }?>
                </select>
                </span>
            </p>
            
            <p>
                <label>Telefono</label>
                <span class="field"><input type="text" name="telefono" class="input-medium" placeholder="Telefono" /></span>
            </p>
            <p>
                <label>Correo</label>
                <span class="field"><input type="text" name="correo" class="input-medium" placeholder="Correo" /></span>
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
						while($row = mysql_fetch_array($result)){
					?>
                    <option value="<?php echo $row['idtipousuario'];?>"><?php echo $row['nombretipo_usuario'];?></option>
                    <?php }?>
                </select>
                </span>
            </p>
            
            <p class="stdformbutton">
                    <input type="submit" class="btn btn-primary" value="Crear">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="reset" class="btn btn-primary" value="Cancelar">
            </p>
        </form>
    </div>
</div>
