<?php
	if(!isset($_SESSION['userid'])){
		echo "<script type='text/javascript'>window.location.href='../error/404.html'</script>";
	}
	if($_SESSION['tusuario'] != $_SESSION['tiusuario']){
		echo "<script type='text/javascript'>window.location.href='../error/no_user.html'</script>";
	}
?>