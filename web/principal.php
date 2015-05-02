<?php 
	session_start();
	include("../error/no_conex.php");
	include("../admin/conexion.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Laboratorio Clinico Cesar Sanchez Font</title>

	<link rel="stylesheet" href="../admin/archivos/css/responsive-tables.css">
	<link rel="stylesheet" href="../admin/archivos/css/style.default.css" type="text/css" />
	<link rel="stylesheet" href="../admin/archivos/css/bootstrap-fileupload.min.css" type="text/css" />
	<link rel="stylesheet" href="../admin/archivos/css/bootstrap-timepicker.min.css" type="text/css" />
	<link rel="stylesheet" href="../admin/archivos/prettify/prettify.css" type="text/css" />
	
	<script type="text/javascript" src="../admin/archivos/js/jquery-1.9.1.min.js"></script>
	<script type="text/javascript" src="../admin/archivos/js/jquery-migrate-1.1.1.min.js"></script>
	<script type="text/javascript" src="../admin/archivos/js/jquery-ui-1.9.2.min.js"></script>
	<script type="text/javascript" src="../admin/archivos/js/modernizr.min.js"></script>
	<script type="text/javascript" src="../admin/archivos/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../admin/archivos/js/jquery.cookie.js"></script>
	<script type="text/javascript" src="../admin/archivos/js/jquery.uniform.min.js"></script>
	<script type="text/javascript" src="../admin/archivos/js/flot/jquery.flot.min.js"></script>
	<script type="text/javascript" src="../admin/archivos/js/flot/jquery.flot.resize.min.js"></script>
	<script type="text/javascript" src="../admin/archivos/js/responsive-tables.js"></script>
	<script type="text/javascript" src="../admin/archivos/js/custom.js"></script>

	<script type="text/javascript" src="../admin/archivos/js/bootstrap-fileupload.min.js"></script>
	<script type="text/javascript" src="../admin/archivos/js/jquery.validate.min.js"></script>
	<script type="text/javascript" src="../admin/archivos/js/bootstrap-timepicker.min.js"></script>
	<script type="text/javascript" src="../admin/archivos/js/jquery.tagsinput.min.js"></script>
	<script type="text/javascript" src="../admin/archivos/js/jquery.autogrow-textarea.js"></script>
	<script type="text/javascript" src="../admin/archivos/js/charCount.js"></script>
	<script type="text/javascript" src="../admin/archivos/js/colorpicker.js"></script>
	<script type="text/javascript" src="../admin/archivos/js/ui.spinner.min.js"></script>
	<script type="text/javascript" src="../admin/archivos/js/chosen.jquery.min.js"></script>
	<script type="text/javascript" src="../admin/archivos/js/forms.js"></script>
	<script type="text/javascript" src="../admin/archivos/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="../admin/archivos/prettify/prettify.js"></script>
	<script type="text/javascript" src="../admin/archivos/js/jquery.jgrowl.js"></script>
	<script type="text/javascript" src="../admin/archivos/js/jquery.alerts.js"></script>
	<script type="text/javascript" src="../admin/archivos/js/elements.js"></script>
	<script>
		 jQuery(document).ready(function(){
	        // dynamic table
	        jQuery('#dyntable').dataTable({
	            "sPaginationType": "full_numbers",
	            "aaSortingFixed": [[0,'asc']],
	            "fnDrawCallback": function(oSettings) {
	                jQuery.uniform.update();
	            }
	        });
		 });
	</script>

</head>

<body>

<div class="mainwrapper">
    
    <div class="header">
        <div class="logo">
         <a href="principal.php"> <img src="../admin/archivos/images/LogoLCCSF.png"/></a>
        </div>
     </div>
</div>
    
    <div class="leftpanel">
        
        <div class="leftmenu">        
            <ul class="nav nav-tabs nav-stacked">
            	<li class=""><a href="principal.php"><span class=" iconfa-home"></span> INICIO</a></li>              
                 <?php 
					$pacientes="";
					$ordenser="";
					$consultas="";
					$ayuda="";
					if(isset($_GET['accion']) && isset($_GET['tipo'])){
						$accion= $_GET['accion'];
						$tipo = $_GET["tipo"];
						switch($accion){
							case "pacientes" : 
								$pacientes="active";
							break;
							case "ordenser" : 
								$ordenser="active";
							break;
							case "consultas" : 
								$consultas="active";
							break;
							case 'ayuda':
								$ayuda="active";
							break;
						}
					}
				?>
  <li class="dropdown <?php if($pacientes!=""){ echo $pacientes;}?>"><a href=""><span class="iconfa-user"></span>Pacientes</a>
                	<ul <?php if ($pacientes!=""){?>style="display: block" <?php  } ?> >                    	
                    	<li><a href="principal.php?accion=pacientes&tipo=nuevo"><span class="icon-plus"></span> Añadir Paciente</a></li>
                        <li><a href="principal.php?accion=pacientes&tipo=vep"><span class="icon-list"></span> Administrar Pacientes</a></li>                     
                    </ul>
                </li>
  <li class="dropdown <?php if($ordenser!=""){ echo $ordenser;}?>"><a href=""><span class="iconfa-file"></span>Ordenes de Servicio</a>
                	<ul <?php if ($ordenser!=""){?>style="display: block" <?php  } ?> >
                    	<li><a href="principal.php?accion=ordenser&tipo=nuevo"><span class="icon-plus"></span> Crear Orden de Servicio</a></li>
                        <li><a href="principal.php?accion=ordenser&tipo=veros"><span class="icon-list"></span> Administrar Ordenes de Servicio</a></li>
                    </ul>
                </li>
                <li class="<?php if($ayuda!=""){ echo $ayuda;}?>"><a href="principal.php?accion=ayuda&tipo=ayuda"><span class="iconfa-info-sign"></span> Ayuda</a></li>
                <li><a href="logout.php"><span class=" iconfa-off"></span> Salir</a></li>
     
        </div><!--leftmenu-->
        
    </div><!-- leftpanel -->
    
    <div class="rightpanel">
        
        <ul class="breadcrumbs">
        	<li><a href="principal.php"><i class="iconfa-home"></i></a> <span class="separator"></span> Inicio</li>
        	<?php 							
			if(isset($_GET["accion"]) || isset($_GET['tipo'])){
				if($_GET["accion"]=="pacientes" && $_GET['tipo']=="nuevo"){
					?><li><span class="separator"></span> Pacientes <span class="separator"></span> <a href="principal.php?accion=pacientes&tipo=nuevo">Añadir Paciente</a></li><?php
				}
				if($_GET["accion"]=="pacientes" && $_GET['tipo']=="vep"){
					?><li><span class="separator"></span> Pacientes <span class="separator"></span> <a href="principal.php?accion=pacientes&tipo=vep">Administrar Pacientes</a></li><?php
				}
				if($_GET["accion"]=="ordenser" && $_GET['tipo']=="nuevo"){
					?><li><span class="separator"></span> Ordenes de Servicio <span class="separator"></span> <a href="principal.php?accion=ordenser&tipo=nuevo">Crear Orden de Servicio</a></li><?php
				}
				if($_GET["accion"]=="ordenser" && $_GET["tipo"]=="veros"){
					?><li><span class="separator"></span> Ordenes de Servicio <span class="separator"></span> <a href="principal.php?accion=ordenser&tipo=veros">Administrar Ordenes de Servicio</a></li><?php
				}
				if ($_GET["accion"]=="ayuda") {
					?><li><span class="separator"></span> Ayuda<?php
				}
			}
		?>
        	<li class="right">
                <a href="" data-toggle="dropdown" class="dropdown-toggle"><i class="icon-user"></i> <?php echo $_SESSION['nombres']; echo " "; echo $_SESSION['apellidos']; ?></a>
                <ul class="dropdown-menu pull-right">
                    <li><a href="?accion=info"><span class="iconfa-user"></span> Ver Mi Información</a></li>
                    <li class=""><a href="../web/logout.php"><span class="iconfa-off"></span> Salir</a></li>
                </ul>
            </li>
        </ul>
        
        <div class="maincontent">
            <div class="maincontentinner">
                <div class="row-fluid">
                    <div id="dashboard-left" class="span"> 
                      <?php 
							if(isset($_GET["accion"]) || isset($_GET['tipo'])){
								if($_GET["accion"]=="pacientes" && $_GET['tipo']=="nuevo"){
									include("addpaciente.php"); 
								}
								if($_GET["accion"]=="info"){
									include("../admin/informacionUsuario2.php"); 
								}
								if($_GET["accion"]=="pacientes" && $_GET['tipo']=="vep"){
									include("verpacientes.php");
								}
								if($_GET["accion"]=="ordenser" && $_GET['tipo']=="nuevo"){
									include("crearordenservicio.php");
								}
								if($_GET["accion"]=="ordenser" && $_GET['tipo']=="veros"){
									include("verordenservicio.php");
								}
								if($_GET['accion']=="busqueda"){
									include("bpaciente.php");
								}
								if($_GET['accion']=="ayuda" && $_GET['tipo']=="ayuda"){
									include("ayuda.php");
								}
							}
							else
							{
								include("buscarpac.php");
							}
						?>
                     
                        
                    </div>
                </div><!--row-fluid-->
                
                <div class="footer">
                    <div class="footer-left">
                       <span>Proyecto de IHC</span>
                    </div>
                    <div class="footer-right">
                       <?php 
                       date_default_timezone_set('UTC');
                       $dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
        				$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
                       echo $dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y');
                       ?><!-- <span>Designed by: <a href="http://themepixels.com/">ThemePixels</a></span>-->
                    </div>
                </div><!--footer-->
                
            </div><!--maincontentinner-->
        </div><!--maincontent-->
        
    </div><!--rightpanel-->
    
</div><!--mainwrapper-->
<script type="text/javascript">
    jQuery(document).ready(function() {
        
      // simple chart
		var flash = [[0, 11], [1, 9], [2,12], [3, 8], [4, 7], [5, 3], [6, 1]];
		var html5 = [[0, 5], [1, 4], [2,4], [3, 1], [4, 9], [5, 10], [6, 13]];
      var css3 = [[0, 6], [1, 1], [2,9], [3, 12], [4, 10], [5, 12], [6, 11]];
			
		function showTooltip(x, y, contents) {
			jQuery('<div id="tooltip" class="tooltipflot">' + contents + '</div>').css( {
				position: 'absolute',
				display: 'none',
				top: y + 5,
				left: x + 5
			}).appendTo("body").fadeIn(200);
		}
	
			
		var plot = jQuery.plot(jQuery("#chartplace"),
			   [ { data: flash, label: "Flash(x)", color: "#6fad04"},
              { data: html5, label: "HTML5(x)", color: "#06c"},
              { data: css3, label: "CSS3", color: "#666"} ], {
				   series: {
					   lines: { show: true, fill: true, fillColor: { colors: [ { opacity: 0.05 }, { opacity: 0.15 } ] } },
					   points: { show: true }
				   },
				   legend: { position: 'nw'},
				   grid: { hoverable: true, clickable: true, borderColor: '#666', borderWidth: 2, labelMargin: 10 },
				   yaxis: { min: 0, max: 15 }
				 });
		
		var previousPoint = null;
		jQuery("#chartplace").bind("plothover", function (event, pos, item) {
			jQuery("#x").text(pos.x.toFixed(2));
			jQuery("#y").text(pos.y.toFixed(2));
			
			if(item) {
				if (previousPoint != item.dataIndex) {
					previousPoint = item.dataIndex;
						
					jQuery("#tooltip").remove();
					var x = item.datapoint[0].toFixed(2),
					y = item.datapoint[1].toFixed(2);
						
					showTooltip(item.pageX, item.pageY,
									item.series.label + " of " + x + " = " + y);
				}
			
			} else {
			   jQuery("#tooltip").remove();
			   previousPoint = null;            
			}
		
		});
		
		jQuery("#chartplace").bind("plotclick", function (event, pos, item) {
			if (item) {
				jQuery("#clickdata").text("You clicked point " + item.dataIndex + " in " + item.series.label + ".");
				plot.highlight(item.series, item.datapoint);
			}
		});
    
        
        //datepicker
        jQuery('#datepicker').datepicker();
        
        // tabbed widget
        jQuery('.tabbedwidget').tabs();
    });
</script>
</body>
</html>
