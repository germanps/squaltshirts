<?php 
	session_start();
	//include('../view/header.php');
	echo "Cerrando sesion...";
	session_destroy();
	header('Refresh: 3; url="../view/store.php"');
 ?>