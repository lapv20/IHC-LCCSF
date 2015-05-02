<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Laboratorio Clinico Cesar Sanchez Font</title>

	<link rel="stylesheet" href="archivos/css/responsive-tables.css">
	<link rel="stylesheet" href="archivos/css/style.default.css" type="text/css" />
	<link rel="stylesheet" href="archivos/css/bootstrap-fileupload.min.css" type="text/css" />
	<link rel="stylesheet" href="archivos/css/bootstrap-timepicker.min.css" type="text/css" />
	<link rel="stylesheet" href="archivos/prettify/prettify.css" type="text/css" />
	
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

<style>
#cargando {
	position: absolute; 
    width:100%;
    height:100%;
    background:#FFFFFF url(archivos/Loaders/Snake.gif) no-repeat center;
    }

</style>

<script type="text/javascript">
	jQuery(window).load(function () {
	  // Una vez se cargue al completo la página desaparecerá el div "cargando"
		//jQuery('#cargando').fadeOut(2000);
	  jQuery('#cargando').hide();
	  
});
</script>

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

<div id="cargando">
	 <center><h4><strong>Redireccionando...</strong> </h4></center>                        
</div>

<div class="mainwrapper">
    <!--<div class="header" style="background:url(logo.png); background-repeat:no-repeat;background-size:500px 500px;">-->
    <div class="header" >
	    <div>
	        <div class="logo">
	         	 <a href="principal.php"><img src="archivos/images/LogoLCCSF.png"/></a>
	    	</div>   
	    </div>
    </div>
    
    <div class="leftpanel">
        <div class="leftmenu">        
            <ul class="nav nav-tabs nav-stacked">
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
            	<li><a href="principal.php"><span class="iconfa-home"></span> INICIO</a></li>                  
                <li class="dropdown <?php if($cuentas!=""){ echo $cuentas;}?>"><a href=""><span class="iconfa-user"></span> Cuentas</a>
                	<ul <?php if ($cuentas!=""){?>style="display: block" <?php  } ?> >
                    	<li><a href="principal.php?accion=cuentas&tipo=nuevo"><span class="icon-plus"></span> Nueva Cuenta</a></li>                       
                        <li><a href="principal.php?accion=cuentas&tipo=modificar"><span class="icon-list"></span> Administrar Cuentas</a></li>
                        <!--<li><a href="principal.php?accion=cuentas&tipo=eliminar"><span class="icon-trash"></span> Eliminar</a></li>-->
                    </ul>
                </li>
                
                <li class="<?php if($orden!=""){ echo $orden;}?>"><a href="principal.php?accion=orden&tipo=anular"><span class=" iconfa-calendar"></span> Orden de Servicio</a>
                	
                </li>
                <li class="dropdown <?php if($empresa!=""){ echo $empresa;}?>"><a href=""><span class="iconfa-briefcase"></span> Empresas</a>
                	<ul <?php if ($empresa!=""){?>style="display: block" <?php  } ?> >
                    	<li><a href="principal.php?accion=empresa&tipo=nuevo"><span class="icon-plus"></span> Nueva Empresa</a></li>
                        <li><a href="principal.php?accion=empresa&tipo=modificar"><span class="icon-list"></span> Administrar Empresas</a></li>
                    </ul>
                </li>
                
                <li class=" dropdown <?php if($sucursal!=""){ echo $sucursal;}?>"><a href=""><span class="iconfa-globe"></span> Sucursales</a>
                	<ul <?php if ($sucursal!=""){?>style="display: block" <?php  } ?> >
                    	<li><a href="principal.php?accion=sucursal&tipo=nuevo"><span class="icon-plus"></span> Nueva Sucursal</a></li>
                        <li><a href="principal.php?accion=sucursal&tipo=modificar"><span class="icon-list"></span> Administrar Sucursales</a></li>
                    </ul>
                </li>
                
                <li class=" dropdown <?php if($tipoUsuario!=""){ echo $tipoUsuario;}?>"><a href=""><span class="iconfa-group"></span> Tipos de Usuario</a>
                	<ul <?php if ($tipoUsuario!=""){?>style="display: block" <?php  } ?> >
                    	<li><a href="principal.php?accion=tipoUsuario&tipo=nuevo"><span class="icon-plus"></span> Nuevo Tipo</a></li>
                        <li><a href="principal.php?accion=tipoUsuario&tipo=modificar"><span class="icon-list"></span> Administrar Tipos de Usuario</a></li>
                    </ul>
                </li>
              
                
                <li class="<?php if($historial!=""){ echo $historial;}?>"><a href="principal.php?accion=historial&tipo=consultar"><span class=" iconfa-list-alt"></span> Historial</a>
                <li class=""><a href="../web/logout.php"><span class=" iconfa-off"></span> Salir</a></li>
                
            </ul>
        </div><!--leftmenu-->
        
    </div><!-- leftpanel -->
    
    <div class="rightpanel">
        <ul class="breadcrumbs">
            <li><a href="principal.php"><i class="iconfa-home"></i></a> <span class="separator"></span> Inicio</li>
            <?php 							
			if(isset($_GET["accion"]) || isset($_GET['tipo'])){
				if($_GET["accion"]=="cuentas" && $_GET['tipo']=="nuevo"){
					?><li><span class="separator"></span> Cuentas <span class="separator"></span> <a href="principal.php?accion=cuentas&tipo=nuevo">Agregar Cuenta</a></li><?php
				}
				if($_GET["accion"]=="cuentas" && $_GET['tipo']=="modificar"){
					?><li><span class="separator"></span> Cuentas <span class="separator"></span> <a href="principal.php?accion=cuentas&tipo=modificar">Administrar Cuentas</a></li><?php
				}
				if($_GET["accion"]=="orden" && $_GET["tipo"]=="anular"){
					?><li><span class="separator"></span> Orden de Servicio <span class="separator"></span> <a href="principal.php?accion=orden&tipo=anular">Anular Orden de Servicio</a></li><?php
				}
				if($_GET["accion"]=="empresa" && $_GET["tipo"]=="nuevo"){
					?><li><span class="separator"></span> Empresas <span class="separator"></span> <a href="principal.php?accion=empresa&tipo=nuevo">Agregar Nueva Empresa</a></li><?php
				}
				if($_GET["accion"]=="empresa" && $_GET["tipo"]=="modificar"){
					?><li><span class="separator"></span> Empresas <span class="separator"></span> <a href="principal.php?accion=empresa&tipo=modificar">Administrar Empresas</a></li><?php
				}
				if($_GET["accion"]=="sucursal" && $_GET["tipo"]=="nuevo"){
					?><li><span class="separator"></span> Sucursales <span class="separator"></span> <a href="principal.php?accion=sucursal&tipo=nuevo">Añadir Sucursal</a></li><?php
				}
				if($_GET["accion"]=="sucursal" && $_GET["tipo"]=="modificar"){
					?><li><span class="separator"></span> Sucursales <span class="separator"></span> <a href="principal.php?accion=sucursal&tipo=modificar"> Administrar Sucursales</a></li><?php
				}
				if($_GET["accion"]=="tipoUsuario" && $_GET["tipo"]=="nuevo"){
					?><li><span class="separator"></span> Tipos de Usuario <span class="separator"></span> <a href="principal.php?accion=tipoUsuario&tipo=nuevo">Nuevo Tipo</a></li><?php
				}
				if($_GET["accion"]=="tipoUsuario" && $_GET["tipo"]=="modificar"){
					?><li><span class="separator"></span> Tipos de Usuario <span class="separator"></span> <a href="principal.php?accion=tipoUsuario&tipo=modificar"> Administrar Tipos de Usuarios</a></li><?php
				}if($_GET["accion"]=="historial" && $_GET["tipo"]=="consultar"){
					?><li><span class="separator"></span> Historial <span class="separator"></span> <a href="principal.php?accion=historial&tipo=consultar"> Ver Historial </a></li><?php
				}
			}
		?>
			<li class="right">
                <a href="" data-toggle="dropdown" class="dropdown-toggle"><i class="icon-user"></i>
                	<?php echo $_SESSION['nombres']; echo " "; echo $_SESSION['apellidos']; ?></a>
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
								if($_GET["accion"]=="info"){
									include("informacionUsuario2.php");
								}
								if($_GET["accion"]=="cuentas" && $_GET['tipo']=="nuevo"){
									include("nuevoUsuario.php");
								}
								if($_GET["accion"]=="cuentas" && $_GET['tipo']=="modificar"){
									include("modificarUsuarios.php");
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
							}else{
								?>
							
							<h4 class="widgettitle title-primary">Información sobre la Acciones</h4><br />
							<div class="accordion accordion-inverse">
                            <h3><a href="#">Section 1</a></h3>
                            <div>
                            	<a class="btn btn-danger alertdanger"><small>Alert Danger</small></a>
                                <p>
                                    Mauris mauris ante, blandit et, ultrices a, suscipit eget, quam. Integer
                                    ut neque. Vivamus nisi metus, molestie vel, gravida in, condimentum sit
                                    amet, nunc. Nam a nibh. Donec suscipit eros. Nam mi. Proin viverra leo ut
                                    odio. Curabitur malesuada. Vestibulum a velit eu ante scelerisque vulputate.
                                </p>
                            </div>
                            <h3><a href="#">Section 2</a></h3>
                            <div>
                                <p>
                                    Sed non urna. Donec et ante. Phasellus eu ligula. Vestibulum sit amet
                                    purus. Vivamus hendrerit, dolor at aliquet laoreet, mauris turpis porttitor
                                    velit, faucibus interdum tellus libero ac justo. Vivamus non quam. In
                                    suscipit faucibus urna.
                                </p>
                            </div>
                            <h3><a href="#">Section 3</a></h3>
                            <div>
                                <p>
                                    Nam enim risus, molestie et, porta ac, aliquam ac, risus. Quisque lobortis.
                                    Phasellus pellentesque purus in massa. Aenean in pede. Phasellus ac libero
                                    ac tellus pellentesque semper. Sed ac felis. Sed commodo, magna quis
                                    lacinia ornare, quam ante aliquam nisi, eu iaculis leo purus venenatis dui.
                                </p>
                            </div>
                            <h3><a href="#">Section 4</a></h3>
                            <div>
                                <p>
                                    Cras dictum. Pellentesque habitant morbi tristique senectus et netus
                                    et malesuada fames ac turpis egestas. Vestibulum ante ipsum primis in
                                    faucibus orci luctus et ultrices posuere cubilia Curae; Aenean lacinia
                                    mauris vel est.
                                </p>
                            </div>
                        </div>
                        <?php }	?> 
                    </div>
                </div><!--row-fluid-->
                
                <div class="footer">
                    <div class="footer-left">
                       <span>Proyecto de IHC</span>
                    </div>
                    <div class="footer-right">
                       <?php 
                       date_default_timezone_set('UTC');
                       echo date('l jS \of F Y');
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
