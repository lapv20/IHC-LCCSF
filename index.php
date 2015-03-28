<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Laboratorio Clinico Cesar Sanchez Font</title>
<link rel="stylesheet" href="admin/archivos/css/style.default.css" type="text/css" />

<script type="text/javascript" src="admin/archivos/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="admin/archivos/js/jquery-migrate-1.1.1.min.js"></script>
<script type="text/javascript" src="admin/archivos/js/jquery-ui-1.9.2.min.js"></script>
<script type="text/javascript" src="admin/archivos/js/modernizr.min.js"></script>
<script type="text/javascript" src="admin/archivos/js/bootstrap.min.js"></script>
<script type="text/javascript" src="admin/archivos/js/jquery.cookie.js"></script>
<script type="text/javascript" src="admin/archivos/js/custom.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('#login').submit(function(){
            var u = jQuery('#username').val();
            var p = jQuery('#password').val();
            if(u == '' && p == '') {
                jQuery('.login-alert').fadeIn();
                return false;
            }
        });
    });
</script>

</head>
<body class="loginpage">
<?php 
session_start(); //session_start() crea una sesión para ser usada mediante una petición GET o POST, o pasado por una cookie  
include_once "web/conexbd.php"; //es la sentencia q usaremos para incluir el archivo de conexión a la base de datos que creamos anteriormente. 
/*Función verificar_login() --> Vamos a crear una función llamada verificar_login, esta se encargara de hacer una consulta a la base de datos para saber si el usuario ingresado es correcto o no.*/ 

function verificar_login($user,$password,&$result) 
    { 
        $sql = "SELECT * FROM usuario WHERE nombre_usuario = '$user' AND clave = '$password'"; 
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
        <div class="logo animate0 bounceIn"><img src="web/logo.png" alt="" width="250px;"/></div>
    <form action="" method="post" class="login"> 
        <div class="inputwrapper ">
            <input type="text" name="user" id="username" placeholder="Usuario" />
        </div>
        <div class="inputwrapper ">
            <input type="password" name="password" id="password" placeholder="Contraseña" />
        </div>
        <div class="inputwrapper ">
            <!--<button name="submit">Entrar</button>-->
            <input class="boton_login" name="login" type="submit" value="Ingresar" style="width:270px;">
            <br><p style="color: white; font-size: 13px;"><b>Usuarios:</b><br>
            allin1   /   1234    = Administrador<br>
            edy1192  /   1234    = Secretaria /principal<br>
            lapv1992 /   lapv1992 = Contacto Empresa</p>
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
