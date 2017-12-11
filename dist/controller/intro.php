<?php 
	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];
	$pass = $_POST['password'];

	if (isset($nombre) && isset($apellido) && isset($pass)) {
		if ($nombre == "gps" && $apellido == "" && $pass == 10203040) {
			header('Location:../view/store.php');
		}else{
			echo "Datos erroneos";
		}
	}else{
		echo "Lo sentimos pero parece que has accedido a este sitio de manera erronea";
	}
 ?>