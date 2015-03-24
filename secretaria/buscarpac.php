<!doctype html>
<html>
<head>
<meta charset="utf-8">
<script type="text/javascript">
     
	
	  function validarNumeros(e) { // 1
        tecla = (document.all) ? e.keyCode : e.which; // 2
        if (tecla==8) return true; // backspace
		if (tecla==9) return true; // tabulador
        if (tecla==109) return true; // menos
    if (tecla==110) return true; // punto
        if (tecla==189) return true; // guion
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
<div class="widget">
<?php 
	

?> 
            <h4 class="widgettitle">Buscar Paciente</h4>
            <div class="widgetcontent">
                <form class="stdform" action="principal.php?accion=busqueda" method="post">
                               
                 <p>
                   <label>Cedula</label>                       
                    <span class="formwrapper">
                    	  <input name="cedula" type="text" required class="input-large" onKeyDown="return validarNumeros(event)" placeholder="Numero" />
                          <input name="tipo_cedula" type="radio" required value="V" /> V &nbsp;&nbsp; 
                          <input name="tipo_cedula" type="radio" required value="E" /> E &nbsp;&nbsp;
                      <p class="stdformbutton">
                         <button class="btn btn-primary">Buscar</button>
                          <button type="reset" class="btn">Restablecer</button>
                       </p>
                   </span> 
                 </p>
                 </form>
            </div>
</div>       
<?php 
	


?>  
</body>
</html>