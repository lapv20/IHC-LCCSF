
<?php
	include("../admin/conexion.php");
	session_start();

	//echo "tipo del archivo ".$_FILES['uploadFile'] ['type']; //viendo el tipo del archivo (creo que solo usaremos .txt)
	//echo "<br>";
	$error;
	
	if ($_FILES['archivo']["error"] > 0)
 	 {

  		echo "Error: " . $_FILES['archivo']['error'] . "<br>";

 	 }

	else
  	{

 		if($_FILES['archivo']['type'] == 'text/plain')
		{
			$sesionid = $_SESSION['userid'];
			$persontac = "SELECT idempresa FROM usuario WHERE nombre_usuario = '$sesionid'";
			$resultp = mysql_query($persontac);
			$idemp = mysql_result($resultp,0);	
			
			$nombreArchivo = $idemp."".'notas.txt';
			//$nombreArchivoC = $_FILES['archivo']['name'];
			$rutaDestino = "subidas/$nombreArchivo";
			//echo $rutaDestino;
			//move_uploaded_file($_FILES['archivo']['tmp_name'],'subidas/'.$_FILES['archivo']['name']);
			move_uploaded_file($_FILES['archivo']['tmp_name'],'subidas/'.$nombreArchivo);
			
			////
			
			//$file = fopen('subidas/'.$nombreArchivo,"r");
			
			$file = file('subidas/'.$nombreArchivo); // se abre el archivo y se crea un vector donde cada pos del vector tiene una linea del archivo
			//print_r( $file); //imprime el vector
			//echo "<br>"; //un salto de linea xs
			$palabra = array(); // creo un vector
			$i = 0; //variable xs
	
			//echo "empieza a imprimir cada pos del arreglo <br>"; //mensajito
	
			//la funcion count(array) dice la longitud del array
			$b=0;
			$posicion=0;
			$persona=1;
			//for($i=0;$i<count($file);$i++)
			while($i<count($file))
			{
				$palabra = explode(" ",$file[$i]);
				//echo $palabra[0];
				if($palabra[0]==$persona)
				{
					$i=$i+1;
					$palabra = explode(" ",$file[$i]);
					$posicion=0;
					//for($j=0;$j<count($palabra);$j++)
					//{
						
						if($posicion==0)
						{
							
							if($palabra[0]=='Cedula:'){
								$posicion=1;
								$i=$i+1;
								$palabra = explode(" ",$file[$i]);
							}
							else
							{
								$error = $i;
								$i = count($file)+2;
								$b=1;
								//echo "cedula";
								//echo $persona;
							}
						}if($posicion==1)
						{
							if($palabra[0]=='Nombre:'){
								$posicion=2;
								$i=$i+1;
								$palabra = explode(" ",$file[$i]);
							}
							else
							{
								$error = $i;
								$i = count($file)+2;
								$b=1;
							}
						}
						if($posicion==2)
						{
							if($palabra[0]=='Apellido:'){
								$posicion=3;
								$i=$i+1;
								$palabra = explode(" ",$file[$i]);
							}
							else
							{
								$error = $i;
								$i = count($file)+2;
								$b=1;
							}
						}
						if($posicion==3)
						{
							if($palabra[0]=='Fecha_nac:'){
								$posicion=4;
								$i=$i+1;
								$palabra = explode(" ",$file[$i]);
							}
							else
							{
								$error = $i;
								$i = count($file)+2;
								$b=1;

							}
						}
						if($posicion==4)
						{
							if($palabra[0]=='Genero:'){
								//echo $palabra[1];
								//if($palabra[1]=="F"){ //Validar que solo pueda ser M o F
								$posicion=5;
								$i=$i+1;
								$palabra = explode(" ",$file[$i]);
								//}
								//else{
									//$i = count($file)+2;
									//$b=1;
								//}
							}
							else
							{
								$error = $i;
								$i = count($file)+2;
								$b=1;
							}
						}
						if($posicion==5)
						{
							if($palabra[0]=='Telefono:'){
								$posicion=6;
								$i=$i+1;
								$palabra = explode(" ",$file[$i]);
							}
							else
							{
								$error = $i;
								$i = count($file)+2;
								$b=1;
							}
						}
						$persona=$persona+1;
					//}
				}
				else{
					$i = count($file)+2;
								$b=1;
				}
				
		
		
				//echo "<br>";			//salto de linea
			}
			//EL archivo esta bien
			$posicion=0;
			$persona=1;
			$error = $error +1;
			$i=0;
			if($b==0)
			{
				while($i<count($file))
				{
					$i=$i+1;
					if($i!=0)
					{
						
						if($posicion==0)
						{
							$palabra = explode(" ",$file[$i]);
							$cedula = $palabra[1];
							$i=$i+1;
							$posicion=1;
						}
						if($posicion==1)
						{
							$palabra = explode(" ",$file[$i]);
							$j=count($palabra);
							if($j==2)
							{
								$nombres = $palabra[1];
							}
							else
							{
								$nombres = $palabra[1] ." ". $palabra[2];
							}

							$i=$i+1;
							$posicion=2;
						}
						if($posicion==2)
						{
							$palabra = explode(" ",$file[$i]);
							$j=count($palabra);
							if($j==2)
							{
								$apellidos = $palabra[1];
							}
							else
							{
								$apellidos = $palabra[1] ." ". $palabra[2];
							}
	
							$i=$i+1;
							$posicion=3;
						}
						if($posicion==3)
						{
							$palabra = explode(" ",$file[$i]);
							$fecha_nacimiento = $palabra[1];
							$i=$i+1;
							$posicion=4;

						}
						if($posicion==4)
						{
							$palabra = explode(" ",$file[$i]);
							$genero = $palabra[1];
							$i=$i+1;
							$posicion=5;

						}
						if($posicion==5)
						{
							$palabra = explode(" ",$file[$i]);
							$j=count($palabra);
							if($j==2)
							{
								$telefonos = $palabra[1];
							}
							else
							{
								$telefonos = $palabra[1] ." ". $palabra[2];
							}
	
							$i=$i+1;
							$posicion=0;
						}
					}
	
				//Guardar en BD
				$wsql="INSERT INTO paciente (cedula,nombres,apellidos,fecha_nac,genero,telefono) VALUES 					('$cedula','$nombres','$apellidos','$fecha_nacimiento','$genero','$telefonos')";
				
				$resultado = mysql_query("SELECT idpaciente FROM paciente WHERE cedula='$cedula'",$link);
				$numero_filas = mysql_num_rows($resultado);
				if($numero_filas == 0)
				{
					$result = mysql_query($wsql,$link);
					echo mysql_error($link);
				
					//Historial
					$wsql3="SELECT idactividad FROM actividades WHERE nombre_actividad='Agregar paciente'";
					$result3 = mysql_query($wsql3,$link);
					$row3 = mysql_fetch_array($result3);
					$idactividad=$row3['idactividad'];
					echo mysql_error($link);
					$nombreusuario = $_SESSION['userid'];
					$fecha=date("Y-m-d");
					$wsql4="INSERT INTO historial (idactividad,nombre_usuario,fecha) VALUES ('$idactividad','$nombreusuario','$fecha')";
					$result4 = mysql_query($wsql4,$link);
					echo mysql_error($link);	
				
				}
				else
				{
					$wsql="UPDATE paciente SET nombres='$nombres', apellidos='$apellidos', fecha_nac='$fecha_nacimiento', genero='$genero', telefono='$telefonos' WHERE cedula='$cedula'";
					$result = mysql_query($wsql,$link);
					echo mysql_error($link);
				
					//Historial
					$wsql3="SELECT idactividad FROM actividades WHERE nombre_actividad='Modificar paciente'";
					$result3 = mysql_query($wsql3,$link);
					$row3 = mysql_fetch_array($result3);
					$idactividad=$row3['idactividad'];
					echo mysql_error($link);
					$nombreusuario = $_SESSION['userid'];
					$fecha=date("Y-m-d");
					$wsql4="INSERT INTO historial (idactividad,nombre_usuario,fecha) VALUES ('$idactividad','$nombreusuario','$fecha')";
					$result4 = mysql_query($wsql4,$link);
					echo mysql_error($link);	
				
				}	
			
				$sesionid = $_SESSION['userid'];
			
				$persontac = "SELECT idempresa FROM usuario WHERE nombre_usuario = '$sesionid'";
				$resultp = mysql_query($persontac);
				$idemp = mysql_result($resultp,0);
			
				$wsql = mysql_query("SELECT idpaciente FROM paciente WHERE cedula='$cedula'",$link);
				$idp = mysql_result($wsql,0);
			
				$verificar = mysql_query("SELECT idconvenio FROM convenio_paciente WHERE idpaciente = '$idp' AND idempresa = '$idemp'");
				$numero_filas = mysql_num_rows($verificar);
			
				if($numero_filas == 0)
				{
					$wsql="INSERT INTO convenio_paciente (idpaciente, idempresa) VALUES ('$idp','$idemp')";
					$result = mysql_query($wsql);
					
					//Historial
					$wsql3="SELECT idactividad FROM actividades WHERE nombre_actividad='Actualizar afiliados'";
					$result3 = mysql_query($wsql3,$link);
					$row3 = mysql_fetch_array($result3);
					$idactividad=$row3['idactividad'];
					echo mysql_error($link);
					$nombreusuario = $_SESSION['userid'];
					$fecha=date("Y-m-d");
					$wsql4="INSERT INTO historial (idactividad,nombre_usuario,fecha) VALUES ('$idactividad','$nombreusuario','$fecha')";
					$result4 = mysql_query($wsql4,$link);
					echo mysql_error($link);	
				}
			
				//header("location:afiliado.php");
					
					
					
				}
				
			//// Final IF
			echo("<script>alert('Archivo cargado con exito'); window.location.href ='afiliado.php'; </script>");
			}
			else
			{
				echo("<script>alert('Existe un error en el archivo, por favor verifique la linea $error'); window.location.href ='afiliado.php?pag=adde&&acc=pac&&tipo=sadde'; </script>");
			}
			
			////
		}
		else
		{
			echo("<script>alert('Debe seleccionar un archivo TXT'); window.location.href ='afiliado.php?pag=adde&&acc=pac&&tipo=sadde'; </script>");	
		}

 	 }
	 
?>