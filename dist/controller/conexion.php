<?php 
	$host = 'localhost';
	$user = 'root';
	$pass = '';
	$db_name = 'squal_tshirts';

	$conexion = new mysqli($host, $user, $pass, $db_name) or die('Error de conexión con la base de datos');

	//Query para la conexión administradores
	$user_query = "select * from usuario";
 ?>