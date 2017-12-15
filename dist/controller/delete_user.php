<?php 
	session_start();
	require('conexion.php');
	if (isset($_SESSION['enter_ok'])) {
		$usuDelete = $_GET['item'];
		$delete_query = "delete from usuario where id_usuario = $usuDelete";
		$conexion->query($delete_query);
		$conexion->close();
		echo "<p id='viewDelete' class='text-warning'>Borrando usuario...<p>";
		header('Refresh: 3; url="../view/admin.php"');
	}else{
		echo "Has llegado aqui de manera extraña...";
		header('Refresh: 3; url="../index.php"');
	}
 ?>