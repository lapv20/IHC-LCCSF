<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Laboratorio Clinico Cesar Sánchez Font</title>
<link rel="stylesheet" href="archivos/css/style.default.css" type="text/css" />

<link rel="stylesheet" href="archivos/css/responsive-tables.css">
<link rel="stylesheet" href="../web/archivos/css/style.default.css" type="text/css" />
<link rel="stylesheet" href="archivos/css/bootstrap-fileupload.min.css" type="text/css" />
<link rel="stylesheet" href="archivos/css/bootstrap-timepicker.min.css" type="text/css" />

<link rel="stylesheet" href="archivos/prettify/prettify.css" type="text/css" />

<link rel="shortcut icon" href="logo.png">

<script type="text/javascript" src="archivos/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="archivos/js/jquery-migrate-1.1.1.min.js"></script>
<script type="text/javascript" src="archivos/js/jquery-ui-1.9.2.min.js"></script>
<script type="text/javascript" src="archivos/js/modernizr.min.js"></script>
<script type="text/javascript" src="archivos/js/bootstrap.min.js"></script>
<script type="text/javascript" src="archivos/js/jquery.cookie.js"></script>
<script type="text/javascript" src="archivos/js/jquery.uniform.min.js"></script>
<script type="text/javascript" src="archivos/js/flot/jquery.flot.min.js"></script>
<script type="text/javascript" src="archivos/js/flot/jquery.flot.resize.min.js"></script>
<script type="text/javascript" src="archivos/js/responsive-tables.js"></script>
<script type="text/javascript" src="archivos/js/custom.js"></script>

<script type="text/javascript" src="archivos/js/bootstrap-fileupload.min.js"></script>
<script type="text/javascript" src="archivos/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="archivos/js/bootstrap-timepicker.min.js"></script>
<script type="text/javascript" src="archivos/js/jquery.tagsinput.min.js"></script>
<script type="text/javascript" src="archivos/js/jquery.autogrow-textarea.js"></script>
<script type="text/javascript" src="archivos/js/charCount.js"></script>
<script type="text/javascript" src="archivos/js/colorpicker.js"></script>
<script type="text/javascript" src="archivos/js/ui.spinner.min.js"></script>
<script type="text/javascript" src="archivos/js/chosen.jquery.min.js"></script>
<script type="text/javascript" src="archivos/js/forms.js"></script>


<script type="text/javascript" src="archivos/js/jquery.dataTables.min.js"></script>

<script type="text/javascript" src="archivos/prettify/prettify.js"></script>
<script type="text/javascript" src="archivos/js/jquery.jgrowl.js"></script>
<script type="text/javascript" src="archivos/js/jquery.alerts.js"></script>
<script type="text/javascript" src="archivos/js/elements.js"></script>


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



<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/excanvas.min.js"></script><![endif]-->
</head>

<body>

<div class="mainwrapper">
    
    <!--<div class="header" style="background:url(logo.png); background-repeat:no-repeat;background-size:500px 500px;">-->
    <div class="header" >
    <div>
        <div class="logo">
         	 <a href="principal.php"> <img src="../web/Logo.png"/></a>
    	</div>   
    </div>
        
       
    </div>
    
    <div class="leftpanel">
        
        <div class="leftmenu">        
            <ul class="nav nav-tabs nav-stacked">
            	<li class="nav-header"><a href="principal.php">Inicio</a></li>
                
                <?php 
					$cuentas="";
					$orden="";
					$consulta="";
					$empresa="";
					$historial="";
					$sucursal="";
					$tipoUsuario="";
					if(isset($_GET['accion']) && isset($_GET['tipo'])){
						$accion= $_GET['accion'];
						$tipo = $_GET["tipo"];
						switch($accion){
							case "cuentas" : 
								$cuentas="active";
							break;
							case "orden" : 
								$orden="active";
							break;
							case "consulta" : 
								$consulta="active";
							break;
							case "empresa";
								$empresa = "active";
							break;
							case "historial";
								$historial = "active";
							break;
							case "sucursal";
								$sucursal = "active";
							break;
							case "tipoUsuario";
								$tipoUsuario = "active";
							break;
						}
						
					}
				?>
                
                <li class="dropdown <?php if($cuentas!=""){ echo $cuentas;}?>"><a href=""><span class="iconfa-user"></span> Cuentas</a>
                	<ul <?php if ($cuentas!=""){?>style="display: block" <?php  } ?> >
                    	<li><a href="principal.php?accion=cuentas&tipo=nuevo">Agregar Cuenta</a></li>                       
                        <li><a href="principal.php?accion=cuentas&tipo=modificar">Modificar Cuenta</a></li>
                        <li><a href="principal.php?accion=cuentas&tipo=eliminar">Eliminar Cuenta</a></li>
                    </ul>
                </li>
                
                <li class="<?php if($orden!=""){ echo $orden;}?>"><a href="principal.php?accion=orden&tipo=anular"><span class=" iconfa-briefcase"></span> Orden de Servicio</a>
                	
                </li>
                <li class=" dropdown <?php if($empresa!=""){ echo $empresa;}?>"><a href=""><span class="iconfa-home"></span> Empresas</a>
                	<ul <?php if ($empresa!=""){?>style="display: block" <?php  } ?> >
                    	<li><a href="principal.php?accion=empresa&tipo=nuevo">Agregar</a></li>
                        <li><a href="principal.php?accion=empresa&tipo=modificar">Modificar/Eliminar</a></li>
                    </ul>
                </li>
                
                <li class=" dropdown <?php if($sucursal!=""){ echo $sucursal;}?>"><a href=""><span class="iconsweets-companies	"></span> Sucursales</a>
                	<ul <?php if ($sucursal!=""){?>style="display: block" <?php  } ?> >
                    	<li><a href="principal.php?accion=sucursal&tipo=nuevo">Nueva Sucursal</a></li>
                        <li><a href="principal.php?accion=sucursal&tipo=modificar">Modificar/Eliminar</a></li>
                    </ul>
                </li>
                
                <li class=" dropdown <?php if($tipoUsuario!=""){ echo $tipoUsuario;}?>"><a href=""><span class="iconfa-group"></span> Tipos de Usuario</a>
                	<ul <?php if ($tipoUsuario!=""){?>style="display: block" <?php  } ?> >
                    	<li><a href="principal.php?accion=tipoUsuario&tipo=nuevo">Nuevo Tipo</a></li>
                        <li><a href="principal.php?accion=tipoUsuario&tipo=modificar">Modificar/Eliminar</a></li>
                    </ul>
                </li>
              
                
                 <li class="<?php if($historial!=""){ echo $historial;}?>"><a href="principal.php?accion=historial&tipo=consultar"><span class=" iconfa-list-alt"></span> Historial</a>
                
                
                
                <li class=""><a href="../web/logout.php"><span class=" iconfa-off"></span> Salir</a></li>
                
            </ul>
        </div><!--leftmenu-->
        
    </div><!-- leftpanel -->
    
    <div class="rightpanel"> 
        <div class="maincontent">
            <div class="maincontentinner">
                <div class="row-fluid">
                    <div id="dashboard-left" class="span">                        
                        <?php 							
							if(isset($_GET["accion"]) || isset($_GET['tipo'])){
								if($_GET["accion"]=="cuentas" && $_GET['tipo']=="nuevo"){
									include("nuevoUsuario.php");
								}
								if($_GET["accion"]=="cuentas" && $_GET['tipo']=="modificar"){
									include("modificarUsuarios.php");
								}
								if($_GET["accion"]=="cuentas" && $_GET['tipo']=="eliminar"){
									include("eliminarUsuarios.php");
								}
								if($_GET["accion"]=="informacionUsuario"){
									include("informacionUsuario.php");
								}
								if($_GET["accion"]=="orden"){
									include("ordenDeServicio.php");
								}
								if($_GET["accion"]=="empresa" && $_GET['tipo']=="nuevo"){
									include("nuevaEmpresa.php");
								}
								if($_GET["accion"]=="empresa" && $_GET['tipo']=="modificar"){
									include("modificarEmpresas.php");
								}
								if($_GET["accion"]=="historial" && $_GET['tipo']=="consultar"){
									include("historial.php");
								}
								if($_GET["accion"]=="sucursal" && $_GET['tipo']=="nuevo"){
									include("nuevaSucursal.php");
								}
								if($_GET["accion"]=="sucursal" && $_GET['tipo']=="modificar"){
									include("modificarSucursales.php");
								}
								if($_GET["accion"]=="tipoUsuario" && $_GET['tipo']=="nuevo"){
									include("nuevoTipoUsuairo.php");
								}
								if($_GET["accion"]=="tipoUsuario" && $_GET['tipo']=="modificar"){
									include("modificarTipoUsuarios.php");
								}
							}
						?>
                        
                    </div>
                </div><!--row-fluid-->
                
                <div class="footer">
                    <div class="footer-left">
                        <span>FOOTER LEFT</span>
                    </div>
                    <div class="footer-right">
                        <span>FOOTER RIGHT</span>
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
