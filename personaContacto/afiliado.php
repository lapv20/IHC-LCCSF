<?php 
	 session_start();
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

<link rel="shortcut icon" href="logo.png">


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
           <a href="afiliado.php"><img src="../admin/archivos/images/LogoLCCSF.png" alt="" /></a>
        </div>
    </div>
    <div class="leftpanel">
        <div class="leftmenu">        
            <ul class="nav nav-tabs nav-stacked">
            	<li class="nav-header">Menu</li>
                <li class=""><a href="afiliado.php"><span class="iconfa-home"></span> Inicio</a></li>
                <?php 
                    $afiliados="";
                    $ayuda="";
                    if(isset($_GET['pag']) && isset($_GET['acc'])){
                        $pag= $_GET['pag'];
                        $acc = $_GET["acc"];
                        switch($pag){
                            case "adde" : 
                                $afiliados="active";
                            break;
                            case 'ay':
                                $ayuda="active";
                            break;
                        }
                    }
                ?>
                <li class="dropdown <?php if($afiliados!=""){ echo $afiliados;}?>"><a href=""><span class="iconfa-user"></span>Afiliados</a>
                	<ul <?php if ($afiliados!=""){?>style="display: block" <?php  } ?>>                    	
                    	<li><a href="afiliado.php?pag=adde&&acc=pac&&tipo=sadde"><span class="icon-refresh"></span> Actualizar Afiliados</a></li>
                                          
                    </ul>
                </li>
                <li class="<?php if($ayuda!=""){ echo $ayuda;}?>"><a href="afiliado.php?pag=ay&acc=ay&tipo=ay"><span class="iconfa-info-sign"></span> Ayuda</a></li>
                <li class=""><a href="../web/logout.php"><span class="iconfa-off"></span>Salir</a></li>
              </li>    
        </div><!--leftmenu-->
        
    </div><!-- leftpanel -->
    
    <div class="rightpanel">
        
        <ul class="breadcrumbs">
            <li><a href="afiliado.php"><i class="iconfa-home"></i></a> <span class="separator"></span> Inicio</li>
            <?php 							
			if(isset($_GET["pag"])){
				if($_GET["pag"]=="adde"){?>
					<li><span class="separator"></span> Afiliados <span class="separator"></span> <a href="afiliado.php?pag=adde"> Actualizar Afiliados</a></li><?php
				}
				if ($_GET["pag"]=="ay") {
                    ?><li><span class="separator"></span> Ayuda<?php
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
									include("addafiliado.php"); 
								}
								if($_GET['pag']=="ay"){
									include("ayuda2.php");
								}
								
							}
							else{
								include("verafiliados.php");
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
