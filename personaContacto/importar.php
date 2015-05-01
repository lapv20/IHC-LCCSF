    <?php

    include("conexbd.php");
    session_start();

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
        if (copy($_FILES['excel']['tmp_name'], $destino))
        {
            echo "Archivo Cargado Con Éxito";
        }
        else{
            echo "Error Al Cargar el Archivo";
        }
        if (file_exists("subidas/". $nombreArchivo)) 
        {
            /** Clases necesarias */
            require_once('Classes/PHPExcel.php');
            require_once('Classes/PHPExcel/Reader/Excel2007.php');
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

            header("location:afiliado.php");
           // echo("<script>alert('Archivo cargado con exito'); window.location.href ='afiliado.php'; </script>");
        }
        //si por algo no cargo el archivo bak_ 
        else {
            echo "Necesitas primero importar el archivo";
        }
        $errores = 0;
        //recorremos el arreglo multidimensional 
        //para ir recuperando los datos obtenidos
        //del excel e ir insertandolos en la BD
       
        //echo "<strong><center>ARCHIVO IMPORTADO CON EXITO, EN TOTAL $campo REGISTROS Y $errores ERRORES</center></strong>";
        //una vez terminado el proceso borramos el archivo que esta en el servidor el bak_
    }
?>
