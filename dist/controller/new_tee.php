<?php
	session_start();
	require("conexion.php");
	$nombreCamiseta = $_POST["nameTee"];
	$descripcion = $_POST["description"];
	$cantidad = $_POST["amount"];
	$precio = $_POST["prize"];
	$color = $_POST["color"];
	$talla = $_POST['size'];
	$categoria = $_POST['cat'];

	//imagen
	$imagen = $_FILES['image']['name']; 
	$tipoImagen = $_FILES['image']['type']; 
	$tamanyoImagen = $_FILES['image']['size']; 

	//Comprobamos el tamaño de la imagen (menor a 1Mb)
	if ($tamanyoImagen <= 1000000) {
		//Ruta carpeta imagenes (se mueve la imagen desde el directorio temporal)
		$carpetaImagenes = $_SERVER['DOCUMENT_ROOT'] . '/squaltshirts/dist/src/img/camisetas/';
		move_uploaded_file($_FILES['image']['tmp_name'], $carpetaImagenes . $imagen);
	}else{
		echo "El tamaño es demasiado grande";
	}

	//Antes de la inserción comprobamos el id de la categoria
	$cat_query = "select id_categoria from categoria where nombre='$categoria'";
	$cat_resul = $conexion->query($cat_query);
	while ($fila = $cat_resul->fetch_array()) {
		extract($fila);
		$id_cat = $id_categoria;
	}

	$insert_user_query = "insert into camiseta(id_camiseta, nombre, descripcion, cantidad, imagen, precio, color, talla, categoria_id_categoria) values('null','$nombreCamiseta', '$descripcion', '$cantidad', '$imagen','$precio', '$color', '$talla', '$id_cat')";
	$insert_user_resul = $conexion->query($insert_user_query);
	$conexion->close();	
	header("Location: ../view/admin.php");

  ?>