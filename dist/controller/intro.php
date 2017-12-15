<?php 
	session_start();
	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];
	$pass = $_POST['password'];

	if (isset($_SESSION['enter_ok'])) {
		if (isset($nombre) && isset($apellido) && isset($pass)) {

			if ($nombre == "gps" && $apellido == "a" && $pass == "m12") {
				$_SESSION['enter_ok'] = true;
				header('Location:../view/store.php');
			}else{
				echo "Datos erroneos";
				header('Location:../index.php');
			}
		}else{
			echo "Lo sentimos pero parece que has accedido a este sitio de manera erronea";
		}
	}else{
		echo "Has llegado aqui de manera extraña...";
		header('Refresh: 3; url="../index.php"');
	}
 ?>