<?php 
	 session_start();
     $_SESSION['tiusuario'] = 3;
     include("../error/no_conex.php");
	 include("../admin/conexion.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Laboratorio Clinico Cesar Sanchez Font</title>
<link rel="icon" type="image/png" href="../admin/archivos/images/logo2.png" />

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
            "sScrollY": "300px",
            "sPaginationType": "full_numbers"
        });
	 });
</script>
<style>
#cargando {
    position: absolute;
    width:100%;
    height:100%;
    background:#fff url(archivos/Loaders/Snake.gif) no-repeat center;
    z-index: 10000;
}
</style>

<script type="text/javascript">
    jQuery(window).load(function () {
      // Una vez se cargue al completo la página desaparecerá el div "cargando"
        jQuery('#cargando').fadeOut(3000);
      //jQuery('#cargando').hide();
});
</script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/excanvas.min.js"></script><![endif]-->
</head>
<body>
    <div id="cargando">
        <div class="loginpanel">
            <div class="loginpanelinner">
                <!--<div class="logo" style="margin-bottom: 50px;"><img src="../admin/archivos/images/LogoLCCSF.png" width="350px"/></div> -->
                <center><h4><strong>Cargando</strong></h4></center>
            </div>
        </div>
    </div>
<div class="mainwrapper">    
    <div class="header">
        <div class="logo">
           <a href="contacto.php"><img src="../admin/archivos/images/LogoLCCSF.png" alt="" /></a>
        </div>
    </div>
    <div class="leftpanel">
        
        <div class="leftmenu">        
            <ul class="nav nav-tabs nav-stacked">
            	<li class="nav-header">Menu</li>
                  <?php 
                    $empleados="";
                    $ordenser="";
                    $consultas="";
                    $ayuda="";
                    $inicio="";
                    if(isset($_GET['pag']) && isset($_GET['acc'])){
                        $pag= $_GET['pag'];
                        $acc = $_GET["acc"];
                        switch($pag){
                            case "adde"      : $empleados = "active"; break;
                            case "vere"      : $empleados = "active"; break;
                            case "me"        : $empleados = "active"; break;
                            case "co"        : $ordenser = "active"; break;
                            case 'vo'        : $ordenser = "active"; break;
                            case "consultas" : $consultas = "active"; break;
                            case 'ay'        : $ayuda = "active"; break;
                        }
                    }else{
                            $inicio = "active";
                    } ?>
                <li class="<?php if($inicio!=""){ echo $inicio;} ?>"><a href="contacto.php"><span class="iconfa-home"></span> INICIO</a></li>
                <li class="dropdown <?php if($empleados!=""){ echo $empleados;}?>"><a href=""><span class="iconfa-user"></span>Empleados</a>
                	<ul <?php if ($empleados!=""){?>style="display: block" <?php  } ?>>                    	
                    	<li><a href="contacto.php?pag=adde&acc=pac&tipo=sadde"><span class="icon-plus"></span> Añadir Empleado</a></li>
                        <!--<li><a href="contacto.php?pag=me&acc=pac&tipo=sme"><span class="icon-edit"></span> Modificar Empleado</a></li>-->
                        <li><a href="contacto.php?pag=vere&acc=pac&tipo=administrar"><span class="icon-list"></span>Administrar Empleados</a></li>
                    </ul>
                </li>
                <li class="dropdown <?php if($ordenser!=""){ echo $ordenser;}?>"><a href=""><span class="iconfa-book"></span>Ordenes de Servicio</a>
                	<ul <?php if ($ordenser!=""){?>style="display: block" <?php  } ?>>                    	
                    	<li><a href="contacto.php?pag=co&acc=pac&tipo=sco"><span class="icon-plus"></span> Crear Orden de Servicio</a></li>
                        <li><a href="contacto.php?pag=vo&acc=pac&tipo=administrar"><span class="icon-list"></span> Administrar Ordenes de Servicio</a></li>                    
                    </ul>
                </li>
                <li class="<?php if($ayuda!=""){ echo $ayuda;}?>"><a href="contacto.php?pag=ay&acc=ay&tipo=ay"><span class="iconfa-info-sign"></span> Ayuda</a></li>
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
				if($_GET["pag"]=="vere" && $_GET['acc']=="pac" && $_GET['tipo']=="administrar"){
					?><li><span class="separator"></span> Empleados <span class="separator"></span> <a href="contacto.php?pag=vere&&acc=pac&&tipo=administrar">Administrar Empleados</a></li><?php
				}
				if($_GET["pag"]=="co" && $_GET['acc']=="pac" && $_GET['tipo']=="sco"){
					?><li><span class="separator"></span> Orden de Servicio <span class="separator"></span> <a href="contacto.php?pag=co&&acc=pac&&tipo=sco">Crear Orden de Servicio</a></li><?php
				}
				if($_GET["pag"]=="mo" && $_GET['acc']=="pac" && $_GET['tipo']=="smo"){
					?><li><span class="separator"></span> Orden de Servicio <span class="separator"></span> <a href="contacto.php?pag=mo&&acc=pac&&tipo=smo">Modificar Orden de Servicio</a></li><?php
				}
				if($_GET["pag"]=="vo" && $_GET['acc']=="pac" && $_GET['tipo']=="administrar"){
					?><li><span class="separator"></span> Orden de Servicio <span class="separator"></span> <a href="contacto.php?pag=vo&&acc=pac&&tipo=administrar">Administrar Ordenes de Servicio</a></li><?php
				}
                if ($_GET["pag"]=="ay") {
                    ?><li><span class="separator"></span> Ayuda<?php
                }
            }
		?>
            <li class="right">
                <a href="" data-toggle="dropdown" class="dropdown-toggle"><i class="icon-user"></i> <?php echo $_SESSION['nombres']; echo " "; echo $_SESSION['apellidos']; ?></a>
                <ul class="dropdown-menu pull-right">
                    <li><a href="?pag=info"><span class="iconfa-user"></span> Ver Mi Información</a></li>
                    <li class=""><a href="../web/logout.php"><span class="iconfa-off"></span> Salir</a></li>
                </ul>
            </li>
        </ul>
        <div class="maincontent">
            <div class="maincontentinner">
                <div class="row-fluid">
                    <div id="dashboard-left" class="span">
                      <?php 
				  		if(isset($_GET['pag'])){
							if($_GET['pag']=="adde"){ include("addempleado.php"); }
							if($_GET['pag']=="vere"){ include("verempleado.php"); }
							if($_GET['pag']=="co"){ include("crearordenservicio.php"); }
							if($_GET['pag']=="bo"){ include("buscarorden.php"); }
							if($_GET['pag']=="vo"){ include("verorden.php"); }
							if($_GET['pag']=="me"){ include("buscarempleado1.php"); }
                            if($_GET['pag']=="info"){ include("../admin/informacionUsuario2.php"); }
                            if($_GET['pag']=="ay"&&$_GET['acc']=="ay" && $_GET['tipo']=="ay"){    include("ayuda.php"); }
						}else{
							include("buscarempleado1.php");
						} ?>   
                    </div>
                </div><!--row-fluid-->
                <div class="footer">
                    <div class="footer-left">
                       <span><b>Proyecto de IHC</b><br>Edilianny Sánchez, Argenis García, Jesus Marquez & Luis Pérez</span>
                    </div>
                    <div class="footer-right">
                       <?php 
                       date_default_timezone_set('America/Caracas');
                       $dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
                        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
                       echo $dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y');
                       ?>
                       <!-- <span>Designed by: <a href="http://themepixels.com/">ThemePixels</a></span>-->
                    </div>
                </div><!--footer-->
            </div><!--maincontentinner-->
        </div><!--maincontent-->
    </div><!--rightpanel-->
</div><!--mainwrapper-->
</body>
</html>
