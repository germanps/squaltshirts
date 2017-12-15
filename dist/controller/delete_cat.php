<?php 
	session_start();
	require('conexion.php');
	if (isset($_SESSION['enter_ok'])) {	
		$id = $_GET['item'];
		$delete_query = "delete from categoria where id_categoria = $id";
		$conexion->query($delete_query);
		$conexion->close();
		echo "Borrando categoria...";
		header('Refresh: 3; url="../view/admin.php"');
	}else{
		echo "Has llegado aqui de manera extraña...";
		header('Refresh: 3; url="../index.php"');
	}

 ?>