<?php 
	session_start();
	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];
	$pass = $_POST['password'];

	if (isset($nombre) && isset($apellido) && isset($pass)) {

		if ($nombre == "gps" && $apellido == "" && $pass == 10203040) {
			$_SESSION['enter_ok'] = true;
			header('Location:../view/store.php');
		}else{
			echo "Datos erroneos";
			header('Location:../index.php');
		}
	}else{
		echo "Lo sentimos pero parece que has accedido a este sitio de manera erronea";
	}
 ?>