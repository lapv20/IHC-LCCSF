<?php 
	 session_start();
	 include("conexbd.php");
	 date_default_timezone_set('UTC');
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Laboratorio Clinico Cesar Sanchez Font</title>

<link rel="stylesheet" href="../admin/archivos/css/style.default.css" type="text/css" />
<link rel="stylesheet" href="../admin/archivos/css/bootstrap-fileupload.min.css" type="text/css" />
<link rel="stylesheet" href="../admin/archivos/css/bootstrap-timepicker.min.css" type="text/css" />

<script type="text/javascript" src="../admin/archivos/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="../admin/archivos/js/jquery-migrate-1.1.1.min.js"></script>
<script type="text/javascript" src="../admin/archivos/js/jquery-ui-1.9.2.min.js"></script>
<script type="text/javascript" src="../admin/archivos/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../admin/archivos/js/bootstrap-fileupload.min.js"></script>
<script type="text/javascript" src="../admin/archivos/js/bootstrap-timepicker.min.js"></script>
<script type="text/javascript" src="../admin/archivos/js/jquery.uniform.min.js"></script>
<script type="text/javascript" src="../admin/archivos/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="../admin/archivos/js/jquery.tagsinput.min.js"></script>
<script type="text/javascript" src="../admin/archivos/js/jquery.autogrow-textarea.js"></script>
<script type="text/javascript" src="../admin/archivos/js/charCount.js"></script>
<script type="text/javascript" src="../admin/archivos/js/colorpicker.js"></script>
<script type="text/javascript" src="../admin/archivos/js/ui.spinner.min.js"></script>
<script type="text/javascript" src="../admin/archivos/js/chosen.jquery.min.js"></script>
<script type="text/javascript" src="../admin/archivos/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="../admin/archivos/js/jquery.cookie.js"></script>
<script type="text/javascript" src="../admin/archivos/js/modernizr.min.js"></script>
<script type="text/javascript" src="../admin/js/responsive-tables.js"></script>
<script type="text/javascript" src="../admin/archivos/js/custom.js"></script>
<script type="text/javascript" src="../admin/archivos/js/forms.js"></script>
<script type="text/javascript" src="../admin/archivos/js/flot/jquery.flot.min.js"></script>
<script type="text/javascript" src="../admin/archivos/js/flot/jquery.flot.resize.min.js"></script>
<script type="text/javascript" src="../admin/archivos/prettify/prettify.js"></script>
<script type="text/javascript" src="../admin/archivos/js/jquery.jgrowl.js"></script>
<script type="text/javascript" src="../admin/archivos/js/jquery.alerts.js"></script>
<script type="text/javascript" src="../admin/archivos/js/elements.js"></script>
<link rel="stylesheet" href="../admin/archivos/css/responsive-tables.css">
<link rel="stylesheet" href="../admin/archivos/prettify/prettify.css" type="text/css" />
<link rel="shortcut icon" href="../admin/archivos/images/logo.png">

<script type="text/javascript">
    jQuery(document).ready(function(){
        // dynamic table
        jQuery('#dyntable2').dataTable( {
            "bScrollInfinite": true,
            "bScrollCollapse": true,
            "sScrollY": "300px"
        });
	 });
</script>

<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/excanvas.min.js"></script><![endif]-->
</head>

<body>

<div class="mainwrapper">
    
    <div class="header">
        <div class="logo">
            
           <a href="afiliados.php"><img src="../web/logo.png" alt="" /></a>
       
            <!--headmenu-->
        </div>
    </div>
    <div class="leftpanel">
        
        <div class="leftmenu">        
            <ul class="nav nav-tabs nav-stacked">
            	<li class="nav-header">Menu</li>
                <li class="active"><a href="contacto.php"><span class="iconfa-home"></span> Inicio</a></li>
                <li class="dropdown"><a href=""><span class="iconfa-user"></span>Empleados</a>
                	<ul>                    	
                    	<li><a href="contacto.php?pag=adde&acc=pac&tipo=sadde"><span class="icon-plus"></span> Añadir Empleado</a></li>
                        <li><a href="contacto.php?pag=me&acc=pac&tipo=sme"><span class="icon-edit"></span> Modificar Empleado</a></li>
                        <li><a href="contacto.php?pag=vere&acc=pac&tipo=svere"><span class="icon-list"></span> Ver Empleados</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a href=""><span class="iconfa-book"></span>Orden de Servicio</a>
                	<ul>                    	
                    	<li><a href="contacto.php?pag=co&acc=pac&tipo=sco"><span class="icon-plus"></span> Crear Orden de Servicio</a></li>
                        <li><a href="contacto.php?pag=vo&acc=pac&tipo=svo"><span class="icon-list"></span>  Ver Ordenes de Servicio</a></li>                    
                    </ul>
                </li>
                <li class=""><a href="../web/logout.php"><span class="iconfa-off"></span>Salir</a></li>
              </li>    
        </div><!--leftmenu-->
        
    </div><!-- leftpanel -->
    
    <div class="rightpanel">
        
        <ul class="breadcrumbs">
        <li><a href="contacto.php"><i class="iconfa-home"></i></a> <span class="separator"></span> Inicio</li>
            <?php 							
			if(isset($_GET["pag"]) || isset($_GET['acc']) || isset($_GET['tipo'])){
				if($_GET["pag"]=="adde" && $_GET['acc']=="pac" && $_GET['tipo']=="sadde"){
					?><li><span class="separator"></span> Empleados <span class="separator"></span> <a href="contacto.php?pag=adde&&acc=pac&&tipo=sadde">Añadir Empleado</a></li><?php
				}
				if($_GET["pag"]=="me" && $_GET['acc']=="pac" && $_GET['tipo']=="sme"){
					?><li><span class="separator"></span> Empleados <span class="separator"></span> <a href="contacto.php?pag=me&&acc=pac&&tipo=sme">Modificar Empleado</a></li><?php
				}
				if($_GET["pag"]=="vere" && $_GET['acc']=="pac" && $_GET['tipo']=="svere"){
					?><li><span class="separator"></span> Empleados <span class="separator"></span> <a href="contacto.php?pag=vere&&acc=pac&&tipo=svere">Ver Empleados</a></li><?php
				}
				if($_GET["pag"]=="co" && $_GET['acc']=="pac" && $_GET['tipo']=="sco"){
					?><li><span class="separator"></span> Orden de Servicio <span class="separator"></span> <a href="contacto.php?pag=co&&acc=pac&&tipo=sco">Crear Orden de Servicio</a></li><?php
				}
				if($_GET["pag"]=="mo" && $_GET['acc']=="pac" && $_GET['tipo']=="smo"){
					?><li><span class="separator"></span> Orden de Servicio <span class="separator"></span> <a href="contacto.php?pag=mo&&acc=pac&&tipo=smo">Modificar Orden de Servicio</a></li><?php
				}
				if($_GET["pag"]=="vo" && $_GET['acc']=="pac" && $_GET['tipo']=="svo"){
					?><li><span class="separator"></span> Orden de Servicio <span class="separator"></span> <a href="contacto.php?pag=vo&&acc=pac&&tipo=svo">Ver Ordenes de Servicio</a></li><?php
				}
			}
		?>
            <li class="right">
                <a href="" data-toggle="dropdown" class="dropdown-toggle"><i class="icon-user"></i> <?php echo $_SESSION['nombres']; echo " "; echo $_SESSION['apellidos']; ?></a>
                <ul class="dropdown-menu pull-right">
                    <li><a href=""><span class="iconfa-user"></span> Ver Mi Información</a></li>
                    <li class=""><a href="../web/logout.php"><span class="iconfa-off"></span> Salir</a></li>
                </ul>
            </li>
        </ul>
        
        <div class="maincontent">
            <div class="maincontentinner">
                <div class="row-fluid">
                    <div id="dashboard-left" class="span">
                      <?php 
					  		if(isset($_GET['pag']))
							{
								if($_GET['pag']=="adde")
								{	
									include("addempleado.php"); 
								}
								if($_GET['pag']=="vere")
								{	
									include("verempleado.php"); 
								}
								if($_GET['pag']=="co")
								{	
									include("crearordenservicio.php"); 
								}
								if($_GET['pag']=="bo")
								{	
									include("buscarorden.php"); 
								}
								if($_GET['pag']=="vo")
								{	
									include("verorden.php"); 
								}
								if($_GET['pag']=="me")
								{	
									include("buscarempleado1.php"); 
								}
							}
							else{
								include("buscarempleado1.php");
							}
					  
					  ?>   
                    </div>
                </div><!--row-fluid-->
                
                <div class="footer">
                    <div class="footer-left">
                       <!-- <span>&copy; 2013. Shamcey Admin Template. All Rights Reserved.</span>-->
                    </div>
                    <div class="footer-right">
                       <?php echo date('l jS \of F Y'); ?><!-- <span>Designed by: <a href="http://themepixels.com/">ThemePixels</a></span>-->
                    </div>
                </div><!--footer-->
                
            </div><!--maincontentinner-->
        </div><!--maincontent-->
        
    </div><!--rightpanel-->
    
</div><!--mainwrapper-->
</body>
</html>
