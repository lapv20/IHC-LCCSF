<meta charset="utf-8">
<head>
<title>Crear Orden de Servicio</title>
</head>

<body>
<div class="widget">
            <h4 class="widgettitle">Crear Orden de Servicio</h4>
            <div class="widgetcontent nopadding">
                <form class="stdform stdform2"  action="gorden.php?accion=nuevo" method="post">                
                 <p>
                    <label>Cedula</label>                       
                    <span class="field">
                    <select name="idpaciente" class="uniformselect" required>
				   <option value="-1">Seleccione una Opcion</option>
   					<?php 
					 $perf = "SELECT * FROM paciente";
					 $resultperf = mysql_query($perf);
					while($row = mysql_fetch_array($resultperf)){
  					 ?>
      				 <option value="<?php echo $row['idpaciente'];?>"><?php echo $row['cedula'];?></option>
                    <?php }?>
					 </select>
                     </span>   
                    </p>
                    <p>     
                       <label>Perfil</label>
                       <span class="field">
                        <select name="idperfil" class="uniformselect">
                       <option value="-1">Seleccione una Opcion</option>
                        <?php 
                         $perf = "SELECT * FROM perfiles";
                         $resultperf = mysql_query($perf);
                        while($row = mysql_fetch_array($resultperf)){
                         ?>
                         <option value="<?php echo $row['idperfil'];?>"><?php echo $row['nombre_perfil'];?></option>
                        <?php }?>
                         </select></span>
                      </p>
                     <p>
                         <label>Sucursal</label><span class="field">
                        <select name="idsucursal" class="uniformselect">
                       <option value="-1">Seleccione una Opcion</option>
                        <?php 
                         $labs = "SELECT * FROM laboratorios";
                         $resultlabs = mysql_query($labs);
                        while($row = mysql_fetch_array($resultlabs)){
                         ?>
                         <option value="<?php echo $row['idsucursal'];?>"><?php echo $row['nombre_laboratorio'];?></option>
                        <?php }?>
                         </select></span>
                       </p>   
                      <p class="stdformbutton">
                     <button class="btn btn-primary">Crear</button>
                      <button type="reset" class="btn">Restablecer</button>
                 	 </p> 
                  </form>
                  </div>
                  </div>
</body>

</html>