<?php 
	session_start();
	require("conexion.php");
	$id_camiseta = $_POST['sell_id'];
	$cantidad = $_POST['sell_cantidad'];

	$update_sell_tee_query = "update camiseta set cantidad=$cantidad where id_camiseta=$id_camiseta;";
	$update_sell_query = $conexion->query($update_sell_tee_query);
	$conexion->close();
	header("Location: ../view/admin.php");
 ?>