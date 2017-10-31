<?php 
	session_start();
	require("conexion.php");
	$nombre = $_POST["nameCat"];

	$insert_user_query = "insert into categoria(id_categoria, nombre) values('null','$nombre')";
	$insert_user_resul = $conexion->query($insert_user_query);
	$conexion->close();	
	header("Location: ../view/admin.php");
 ?>
