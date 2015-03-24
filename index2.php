<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Lab. César Sánchez Font</title>
    <style type="text/css">
        body.loginpage { background: #0866c6; }
        input,select,
        textarea,button { outline: none; font-size: 13px; font-family: 'RobotoRegular', 'Helvetica Neue', Helvetica, sans-serif; }
        label, input, textarea, select, button { font-size: 13px; }


        /*** LOGIN PAGE ***/

        .loginpanel { position: absolute; top: 50%; left: 50%; height: 300px; }
        .loginpanelinner { position: relative; top: -150px; left: -50%; }
        .loginpanelinner .logo { text-align: center; padding: 20px 0; }

        .inputwrapper input { border: 0; padding: 10px; background: #fff; width: 250px; }
        .inputwrapper input:active, .inputwrapper input:focus { background: #fff; border: 0; }
        .inputwrapper button {
                  display: block; border: 1px solid #0c57a3; padding: 10px; background: #0972dd; width: 100%;
                  color: #fff; text-transform: uppercase; }
        .inputwrapper button:focus, .inputwrapper button:active, .inputwrapper button:hover { background: #1e82e8; }
        .inputwrapper label {
                  display: inline-block; margin-top: 10px; color: rgba(255,255,255,0.8); font-size: 11px; vertical-align: middle; }
        .inputwrapper label input { width: auto; margin: -3px 5px 0 0; vertical-align: middle; }
        .inputwrapper .remember { padding: 0; background: none; }

        .login-alert { display: none; }
        .login-alert .alert { font-size: 11px; text-align: center; padding: 5px 0; border: 0; }

        .loginfooter {
                  font-size: 11px; color: rgba(255,255,255,0.5); position: absolute; position: fixed; bottom: 0; left: 0;
                  width: 100%; text-align: center; font-family: arial, sans-serif !important; padding: 5px 0; }
    </style>
</head>

<body class="loginpage">



<?php 
session_start(); //session_start() crea una sesión para ser usada mediante una petición GET o POST, o pasado por una cookie  
include_once "web/conexbd.php"; //es la sentencia q usaremos para incluir el archivo de conexión a la base de datos que creamos anteriormente. 
/*Función verificar_login() --> Vamos a crear una función llamada verificar_login, esta se encargara de hacer una consulta a la base de datos para saber si el usuario ingresado es correcto o no.*/ 

function verificar_login($user,$password,&$result) 
    { 
        $sql = "SELECT * FROM usuario WHERE nombre_usuario = '$user' and clave = '$password'"; 
        $rec = mysql_query($sql); 
        $count = 0; 
        while($row = mysql_fetch_object($rec)) 
        { 
            $count++; 
            $result = $row; 
        } 
        if($count == 1) 
        { 
			
			return 1; 
        } 
        else 
        { 
            return 0; 
        } 
    } 

function verificar_usuario($user,$password)
{
	$a = "SELECT tipo_usuario FROM usuario WHERE nombre_usuario = '$user' and clave = '$password'"; 
	$b = mysql_query($a);
	$c = mysql_result($b,0);
	echo ($c);
	if($c == 1)
	{
		 header("location:admin/principal.php"); 
	}
	if($c == 2)
	{
		 header("location:web/principal.php"); 
	}
	if($c == 3)
	{
		 header("location:personaContacto/contacto.php"); 
	}
	if($c == 4)
	{
		 header("location:personaContacto/afiliado.php"); 
	}
	
}

/*Luego haremos una serie de condicionales que identificaran el momento en el boton de login es presionado y cuando este sea presionado llamaremos a la función verificar_login() pasandole los parámetros ingresados:*/ 

if(!isset($_SESSION['userid'])) //para saber si existe o no ya la variable de sesión que se va a crear cuando el usuario se logee 
{ 
    if(isset($_POST['login'])) //Si la primera condición no pasa, haremos otra preguntando si el boton de login fue presionado 
    { 
		$num_login = verificar_login($_POST['user'],$_POST['password'],$result);
        if($num_login > 0) //Si el boton fue presionado llamamos a la función verificar_login() dentro de otra condición preguntando si resulta verdadero y le pasamos los valores ingresados como parámetros. 
        { 
            /*Si el login fue correcto, registramos la variable de sesión y al mismo tiempo refrescamos la pagina index.php.*/ 
            $_SESSION['userid'] = $result->nombre_usuario; 
			verificar_usuario($_POST['user'],$_POST['password']);
			
        } 
        else 
        { 
            echo '<div class="error">Su usuario es incorrecto, intente nuevamente.</div>'; //Si la función verificar_login() no pasa, que se muestre un mensaje de error. 
        } 
    } 
?> 
<div class="loginpanel">
    <div class="loginpanelinner">
        <div class="logo_"><img src="web/archivos/images/logo.png" alt="" width="250" /></div>
        <form id="login" action="" method="post">
            <div class="inputwrapper">
                <input type="text" name="user" id="username" placeholder="Usuario" />
            </div>
            <div style="margin-top: 10px" class="inputwrapper">
                <input type="password" name="password" id="password" placeholder="Clave" />
            </div>
            <div style="margin-top: 10px" class="inputwrapper">
                <button name="submit">ENTRAR</button>
                <input name="login" type="submit" value="Ingresar" style="width:270px;">
            </div>           
        </form>
    </div><!--loginpanelinner-->
</div><!--loginpanel-->

<?php 
} else { 
    // Si la variable de sesión 'userid' ya existe, que muestre el mensaje de saludo. 
    echo 'Su usuario ingreso correctamente.'; 
    echo '<a href="secretaria/logout.php">Logout</a>'; 
} 
?> 

</body>
</html>
