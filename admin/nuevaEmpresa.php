<?php include("conexion.php");?>
<div class="widget ">
	<center><h4 class="widgettitle"> Nuevo Empresa</h4></center>
    <div class="widgetcontent">
    
    	<form class="stdform" method="post" action="empresa.php?accion=nuevo">
        	<p>
                <label>Nombre</label>
                <span class="field"><input type="text" id="nombre" name="nombre" class="input-medium" placeholder="Nombre" /></span>
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
                <label>Telefono</label>
                <span class="field"><input type="text" name="telefono" class="input-medium" placeholder="Telefono" /></span>
            </p>
            <p>
            	<label>RIF</label>
            	<select  name="rif1" data-placeholder="Seleccione una Opcion" style="width:50px;"  tabindex="2">
                    	<option value="V">V</option>
                        <option value="J">J</option>
                        <option value="E">E</option>
                        <option value="G">G</option>
                </select>
                <input type="text" name="rif2" class="input-medium" placeholder="RIF" maxlength="8"/>
                <input type="text" name="rif3" class="input-small" style="width:10px;"  maxlength="1"/>
            </p>
            <p>
                <label>Direccion</label>
                <span class="field"><input type="text" name="direccion" class="input-medium" placeholder="Direccion" /></span>
            </p>
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