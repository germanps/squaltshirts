<?php 
	$host = 'localhost';
	$user = 'root';
	$pass = '';
	$db_name = 'teeshirts';

	$conexion = new mysqli($host, $user, $pass, $db_name) or die('Error de conexión con la base de datos');
	//Obligar a la base de datos aceptar caracteres especiales
	$conexion->set_charset("utf8");

	//Query para la conexión administradores
	$user_query = "select * from usuario";
 ?>