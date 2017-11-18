<?php 
	session_start();
	require("conexion.php");
	$id = $_POST["set_userId"];
	$nombre = $_POST["set_userName"];
	$apellido = $_POST['set_userApellido'];
	$dni = $_POST['set_userDni'];
	$dir = $_POST['set_userDir'];
	$password = $_POST["set_userPassword"];
	$email = $_POST["set_userEmail"];
	$tipo = $_POST["set_userTipo"];

	$update_user_query = "update usuario set nombre='$nombre', apellido='$apellido', dni='$dni', direccion='$dir', email='$email', password='$password', tipo_usuario=$tipo WHERE id_usuario=$id";
	$update_user_resul = $conexion->query($update_user_query);
	
	$conexion->close();	
	header("Location: ../view/admin.php");

 ?>