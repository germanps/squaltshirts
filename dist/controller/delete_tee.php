<?php 
	session_start();
	require('conexion.php');
	if (isset($_SESSION['enter_ok'])) {
		$teeDelete = $_GET['item'];
		$delete_query = "delete from camiseta where id_camiseta = $teeDelete";
		$conexion->query($delete_query);
		$conexion->close();
		echo "Borrando producto...";
		header('Refresh: 3; url="../view/admin.php"');
	}else{
		echo "Has llegado aqui de manera extraña...";
		header('Refresh: 3; url="../index.php"');
	}

 ?>