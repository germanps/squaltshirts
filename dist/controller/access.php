<?php 
	session_start();
	echo "Entra access <br>";
	require('conexion.php');
	$nom_usu = $_POST['nombre'];
	$ape_usu = $_POST['apellido'];
	$email = $_POST['email'];
	$pwd = $_POST['password'];

	echo $nom_usu . " - " .
		 $ape_usu . " - " .
		 $email . " - " .
		 $pwd . " - ";

	/*Nuevo commit en develop*/
	
	$usu_resul = $conexion->query($user_query);
	$usu_rows = $usu_resul->num_rows;
	if (!empty($nom_usu) && !empty($ape_usu) && !empty($email) && !empty($pwd)) {
		while($fila = $usu_resul->fetch_array()){
			extract($fila);
			if ($nombre == $nom_usu && $apellido == $apellido && $email == $email && $password == $pwd) {
				echo "coincide usuario<br>";
				if ($tipo_usuario == 1) {
					header('Location:../view/view_admin.php');
				}else{;
					header('Location:../view/view_usu.php');
				}
				
			}else{
				echo "<p>Error, datos introducidos incorrectos</p>";
				echo "<p>Redireccionando...</p>";
				header("Refresh: 3; url=".$_SERVER['HTTP_REFERER']);//volvemos atrás
			}
			
		}
	}else{
		echo "<p>Redireccionando...</p>";
		header("Refresh: 1; url=".$_SERVER['HTTP_REFERER']);//volvemos atrás
	}
?>