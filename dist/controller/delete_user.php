<?php 
	session_start();
	require('conexion.php');
	$usuDelete = $_GET['item'];
	$delete_query = "delete from usuario where id_usuario = $usuDelete";
	$conexion->query($delete_query);
	$conexion->close();
	echo "<p id='viewDelete' class='text-warning'>Borrando usuario...<p>";
	header('Refresh: 3; url="../view/admin.php"');

 ?>