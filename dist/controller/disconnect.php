<?php 
	session_start();
	//include('../view/header.html');
	echo "Cerrando sesion...";
	session_destroy();
	header('Refresh: 3; url="../index.php"');
 ?>