<?php include("conexion.php");?>
<div class="widget ">
	<center><h4 class="widgettitle"> Nueva Sucursal</h4></center>
    <div class="widgetcontent nopadding">
    	<form class="stdform stdform2" method="post" action="sucursal.php?accion=nuevo">
        	<p>
                <label>Nombre</label>
                <span class="field"><textarea cols="80" rows="5" class="span10" name="nombre" ></textarea></span>
            </p>
            
            <p>
                <label>Direccion</label>
                <span class="field"><textarea cols="80" rows="5" class="span10" name="direccion"></textarea></span>
            </p>
            
            <p>
                <label>Telefono</label>
                <span class="field"><input type="text" name="telefono" class="input-xlarge" placeholder="Telefono" /></span>
            </p>
            <p>
            	<label>RIF<small>Registro de Identificación Fiscal</small></label>
                <span class="field">
                	<select  name="rif1" data-placeholder="Seleccione una Opcion" style="width:50px; margin-top: 10px;"  tabindex="2">
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