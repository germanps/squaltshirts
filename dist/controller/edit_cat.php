<?php 
	session_start();
	require("conexion.php");
	$id = $_POST["set_catId"];
	$nombre = $_POST["set_catName"];

	$update_cat_query = "update categoria set nombre='$nombre' where id_categoria=$id";
	$update_cat_resul = $conexion->query($update_cat_query);
	$conexion->close();	
	header("Location: ../view/admin.php");
 ?>