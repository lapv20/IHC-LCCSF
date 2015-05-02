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
    
    <link rel="stylesheet" href="../admin/archivos/css/font-awesomeNEW.min.css">
    <link rel="stylesheet" href="../admin/archivos/css/font-awesomeNEW.css">

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
           <a href="afiliados.php"><img src="../admin/archivos/images/LogoLCCSF.png" alt="" /></a>
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
            <li><a href="principal.php"><i class="iconfa-home"></i></a> <span class="separator"></span> Inicio</li>
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

                        /** Clases necesarias */
                    require_once('Classes/PHPExcel.php');
                    require_once('Classes/PHPExcel/Reader/Excel2007.php');
                    require_once('Classes/PHPExcel/IOFactory.php');

                    extract($_POST);
                    if ($action == "upload") {
                        //cargamos el archivo al servidor con el mismo nombre
                        //solo le agregue el sufijo bak_ 
                        $archivo = $_FILES['excel']['name'];
                        $tipo = $_FILES['excel']['type'];

                        $sesionid = $_SESSION['userid'];   
                        $persontac = "SELECT idempresa FROM usuario WHERE nombre_usuario = '$sesionid'";
                        $resultp = mysql_query($persontac, $link);
                        $idemp = mysql_result($resultp,0);

                        $nombreArchivo = $idemp."_AFILIADOS_".$archivo;
                        $destino = "subidas/" . $nombreArchivo;
                        if ($archivo != NULL) {                              
                            if (copy($_FILES['excel']['tmp_name'], $destino))
                            {
                                echo '<div class="alert alert-success">
                                  <button data-dismiss="alert" class="close" type="button">×</button>
                                  <h4><strong>Excelente!</strong> Se ha cargado el archivo sin problemas.</h4>
                                </div>';
                            }
                        }
                        else{
                            echo '<div class="alert alert-error">
                              <button data-dismiss="alert" class="close" type="button">x</button>
                              <h4><strong>Ha ocurrido un error!</strong> Necesitas primero importar el archivo.</h4>
                            </div>';
                            echo("<script>alert('Error! Intentar nuevamente. '); window.location.href ='afiliado.php?pag=adde&&acc=pac&&tipo=sadde'; </script>");
                        }
                        if (file_exists("subidas/". $nombreArchivo)) 
                        {

                            $objPHPExcel = PHPExcel_IOFactory::load($destino);

                            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
                            $objWriter->save(str_replace('.php', '.xlsx', $destino));

                            // Cargando la hoja de cálculo
                            $objReader = new PHPExcel_Reader_Excel2007();  
                            $objPHPExcel = $objReader->load("subidas/". $nombreArchivo);
                            $objFecha = new PHPExcel_Shared_Date();
                            // Asignar hoja de excel activa
                            $objPHPExcel->setActiveSheetIndex(0);
                            
                            //Historial sin actualizar pacientes
                            $wsql3="SELECT idactividad FROM actividades WHERE nombre_actividad='Agregar paciente'";
                            $result3 = mysql_query($wsql3,$link);
                            $row3 = mysql_fetch_array($result3);
                            $idactividad=$row3['idactividad'];
                            echo mysql_error($link);
                            $nombreusuario = $_SESSION['userid'];
                            $fecha=date("Y-m-d");
                            
                            //Historial actualizando paciente
                            $wsql5="SELECT idactividad FROM actividades WHERE nombre_actividad='Modificar paciente'";
                            $result5 = mysql_query($wsql3,$link);
                            $row5 = mysql_fetch_array($result3);
                            $idactividad=$row5['idactividad'];
                            echo mysql_error($link);
                            $nombreusuario = $_SESSION['userid'];
                            $fecha=date("Y-m-d");
                            
                            //Historial actualizando afiliados
                            $wsql6="SELECT idactividad FROM actividades WHERE nombre_actividad='Actualizar afiliados'";
                            $result6 = mysql_query($wsql6,$link);
                            $row6 = mysql_fetch_array($result6);
                            $idactividad=$row6['idactividad'];
                            echo mysql_error($link);
                            $nombreusuario = $_SESSION['userid'];
                            $fecha=date("Y-m-d");
                            
                            

                            $i=1; //celda inicial en la cual empezara a realizar el barrido de la grilla de excel
                            $param=0;
                            $contador=0;
                            while($param==0) //mientras el parametro siga en 0 (iniciado antes) que quiere decir que no ha encontrado un NULL entonces siga metiendo datos
                            {                
                                $cedula = $objPHPExcel->getActiveSheet()->getCell('A' . $i)->getCalculatedValue();
                                $nombres = $objPHPExcel->getActiveSheet()->getCell('B' . $i)->getCalculatedValue();
                                $apellidos = $objPHPExcel->getActiveSheet()->getCell('C' . $i)->getCalculatedValue();
                                $fecha_nac = $objPHPExcel->getActiveSheet()->getCell('D' . $i)->getCalculatedValue();
                                $genero = $objPHPExcel->getActiveSheet()->getCell('E' . $i)->getCalculatedValue();
                                $telefono = $objPHPExcel->getActiveSheet()->getCell('F' . $i)->getCalculatedValue();
                                
                                //echo "Iteracion numero: " . $i. "<br>";

                                if (($contador!=0) && ($objPHPExcel->getActiveSheet()->getCell('A'.$i)->getCalculatedValue()!=NULL)) 
                                {                        
                                    $verificar = mysql_query("SELECT idpaciente FROM paciente WHERE cedula='$cedula'",$link);
                                    $numero_filas = mysql_num_rows($verificar);
                                    
                                    if($numero_filas == 0)
                                    {
                                    
                                        //echo "Iteracion numero: " . $i. "<br>";

                                        $consulta = "INSERT INTO paciente (cedula,nombres,apellidos,fecha_nac,genero,telefono) VALUES ('$cedula','$nombres','$apellidos','$fecha_nac','$genero','$telefono')";
                                        $result = mysql_query($consulta,$link);
                                            echo mysql_error($link);

                                        $wsql4="INSERT INTO historial (idactividad,nombre_usuario,fecha) VALUES ('$idactividad','$nombreusuario','$fecha')";
                                        $result4 = mysql_query($wsql4,$link);
                                        echo mysql_error($link);    

                                    }
                                    else
                                    {
                                        
                                        //echo "Iteracion numero: " . $i. "<br>";
                                        
                                        $wsql="UPDATE paciente SET nombres='$nombres', apellidos='$apellidos', fecha_nac='$fecha_nac', genero='$genero', telefono='$telefono' WHERE cedula='$cedula'";
                                        $result = mysql_query($wsql,$link);
                                        echo mysql_error($link);
                                    
                                        $wsql4="INSERT INTO historial (idactividad,nombre_usuario,fecha) VALUES ('$idactividad','$nombreusuario','$fecha')";
                                        $result4 = mysql_query($wsql4,$link);
                                        echo mysql_error($link);    
                                    
                                    }

                                    $sesionid = $_SESSION['userid'];
                            
                                    $persontac = "SELECT idempresa FROM usuario WHERE nombre_usuario = '$sesionid'";
                                    $resultp = mysql_query($persontac,$link);
                                    $idemp = mysql_result($resultp,0);
                                
                                    $wsql = mysql_query("SELECT idpaciente FROM paciente WHERE cedula='$cedula'",$link);
                                    $idp = mysql_result($wsql,0);
                                
                                    $verificar = mysql_query("SELECT idconvenio FROM convenio_paciente WHERE idpaciente = '$idp' AND idempresa = '$idemp'");
                                    $numero_filas = mysql_num_rows($verificar);
                                
                                    if($numero_filas == 0)
                                    {
                                        //echo "Iteracion numero: " . $i. "<br>";
                                    
                                        $wsql="INSERT INTO convenio_paciente (idpaciente, idempresa) VALUES ('$idp','$idemp')";
                                        $result = mysql_query($wsql);
                                        
                                        $wsql4="INSERT INTO historial (idactividad,nombre_usuario,fecha) VALUES ('$idactividad','$nombreusuario','$fecha')";
                                        $result4 = mysql_query($wsql4,$link);
                                        echo mysql_error($link);    
                                    }  




                                }
                                
                                if($objPHPExcel->getActiveSheet()->getCell('A'.$i)->getCalculatedValue()==NULL) //pregunto que si ha encontrado un valor null en una columna inicie un parametro en 1 que indicaria el fin del ciclo while
                                {
                                    
                                    //echo "Iteracion numero FINAL <br>";
                                    $param=1; //para detener el ciclo cuando haya encontrado un valor NULL
                                }
                                $i++;
                                $contador=$contador+1;
                            }
                            echo("<script>alert('Archivo cargado con exito'); window.location.href ='afiliado.php'; </script>");

                        }
                    }

                    echo '<div >
                              <center><h4><strong>Redireccionando...</strong> </h4> <i class="fa fa-spinner fa-pulse fa-5x"></i></center>
                            </div>'; 
                      ?> 

                     
                        
                    </div>
                </div><!--row-fluid-->
                
                <div class="footer">
                    <div class="footer-left">
                       <!-- <span>&copy; 2013. Shamcey Admin Template. All Rights Reserved.</span>-->
                    </div>
                    <div class="footer-right">
                       <!-- <span>Designed by: <a href="http://themepixels.com/">ThemePixels</a></span>-->
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

    
