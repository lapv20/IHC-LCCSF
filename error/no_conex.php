<?php
	if(!isset($_SESSION['userid'])){
		echo "<script type='text/javascript'>window.location.href='../error/404.html'</script>";
	}
?>