<?php 
	session_start();
	require("conexion.php");
	$id = $_POST["set_teeId"];
	$nombre = $_POST["set_teeName"];
	$descripcion = $_POST['set_teeDescripcion'];
	$cantidad = $_POST["set_teeCantidad"];
	$precio = $_POST["set_teePrecio"];
	$color = $_POST["set_teeColor"];
	$talla = $_POST["set_teeTalla"];
	$cat = $_POST["set_teeCategoria"];

	$imagen = $_FILES["set_teeImagen"]['name'];
	$tipoImagen = $_FILES['set_teeImagen']['type']; 
	$tamanyoImagen = $_FILES['set_teeImagen']['size']; 

	if (isset($_SESSION['enter_ok'])) {
		if (!empty($imagen)) {
			//Comprobamos el tamaño de la imagen (menor a 1Mb)
			if ($tamanyoImagen <= 1000000) {
				//Ruta carpeta imagenes (se mueve la imagen desde el directorio temporal)
				$carpetaImagenes = $_SERVER['DOCUMENT_ROOT'] . '/squaltshirts/dist/src/img/camisetas/';
				move_uploaded_file($_FILES['set_teeImagen']['tmp_name'], $carpetaImagenes . $imagen);
			}else{
				echo "El tamaño es demasiado grande";
			}

			//Hacemos la query del update
			$update_user_query = "update camiseta set nombre_camiseta='$nombre', descripcion='$descripcion', cantidad='$cantidad', imagen='$imagen', precio=$precio, color='$color', talla='$talla'  WHERE id_camiseta=$id";
		}else{
			//si el campo imagen viene vacio hacemos la query del update sin cambiar la imagen
			$update_user_query = "update camiseta set nombre_camiseta='$nombre', descripcion='$descripcion', cantidad='$cantidad', precio=$precio, color='$color', talla='$talla'  WHERE id_camiseta=$id";
		}

		$update_user_resul = $conexion->query($update_user_query);
		
		$conexion->close();	
		header("Location: ../view/admin.php");
	}else{
		echo "Has llegado aqui de manera extraña...";
		header('Refresh: 3; url="../index.php"');
	}

 ?>