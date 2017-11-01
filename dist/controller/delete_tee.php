<?php 
	session_start();
	require('conexion.php');
	$teeDelete = $_GET['item'];
	$delete_query = "delete from camiseta where id_camiseta = $teeDelete";
	$conexion->query($delete_query);
	$conexion->close();
	echo "Borrando producto...";
	header('Refresh: 3; url="../view/admin.php"');

 ?>