<?php 
	session_start();
	require("conexion.php");
	$nombre = $_POST["nameUser"];
	$apellido = $_POST["apellidoUser"];
	$email = $_POST["emailUser"]; 
	$password = $_POST["passwordUser"];
	$tipo = $_POST["tipoUser"];


	$insert_user_query = "insert into usuario(id_usuario, nombre, apellido, email, password, tipo_usuario) values('null','$nombre', '$apellido', '$email', '$password','$tipo')";
	$insert_user_resul = $conexion->query($insert_user_query);
	$conexion->close();	
	header("Location: ../view/admin.php");
 ?>