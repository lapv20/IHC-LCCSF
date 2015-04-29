<?php include("conexion.php");?>
<div class="widget ">
	<center><h4 class="widgettitle"> Nuevo Empresa</h4></center>
    <div class="widgetcontent nopadding">
        <form class="stdform stdform2" method="post" action="empresa.php?accion=nuevo">
        	<p>
                <label>Nombre</label>
                <span class="field"><input type="text" id="nombre" name="nombre" class="input-xxlarge" placeholder="Nombre" /></span>
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
                <span class="field"><input type="text" name="telefono" class="input-xlarge" placeholder="Telefono" /></span>
            </p>
            <p>
            	<label>RIF<small>Registro de Identificación Fiscal</small></label>
                <span class="field">
            	<select  name="rif1" data-placeholder="Seleccione una Opcion" style="width:50px;" tabindex="2">
                    	<option value="V">V</option>
                        <option value="J">J</option>
                        <option value="E">E</option>
                        <option value="G">G</option>
                </select>
                <input type="text" name="rif2" class="input-medium" placeholder="RIF" maxlength="8"/>
                <input type="text" name="rif3" class="input-small" style="width:10px;"  maxlength="1"/>
                </span>
            </p>
            <p>
                <label>Direccion</label>
                <span class="field"><textarea cols="80" rows="5" class="span10" name="direccion"></textarea></span>
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