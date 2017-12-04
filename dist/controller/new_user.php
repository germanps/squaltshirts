<?php 
	session_start();
	require("conexion.php");
	$nombre = $_POST["nameUser"];
	$apellido = $_POST["apellidoUser"];
	$dni = $_POST["dniUser"];
	$dir = $_POST["dirUser"];
	$email = $_POST["emailUser"]; 
	$password = $_POST["passwordUser"];
	$tipo = $_POST["tipoUser"];


	$insert_user_query = "insert into usuario(id_usuario, nombre, apellido, dni, direccion, email, password, tipo_usuario) values('null','$nombre', '$apellido', '$dni', '$dir', '$email', '$password','$tipo')";
	$insert_user_resul = $conexion->query($insert_user_query);
	$conexion->close();	
	header("Location: ../view/admin.php");
 ?>