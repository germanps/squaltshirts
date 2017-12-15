<?php 
	session_start();
	require("conexion.php");

	$id_camiseta = $_POST['id-tee'];
	$nombre_camiseta = $_POST['nombre-tee'];
	$descripcion = $_POST['descripcion-tee'];
	$stock = $_POST['stock-tee'];
	$precio = $_POST['precio-tee'];
	$color = $_POST['color-tee'];
	$talla = $_POST['talla-tee'];
	$imagen = $_POST['imagen-tee'];
	$nombre_cat = $_POST['nombre-cat-tee'];
	$cantidad_comprar = $_POST['cantidad-compra'];
	$total_monto_registro = $precio*$cantidad_comprar;

	/*
		Añadir el producto al carrito y redirigir hacia index (store)
	*/
	if (isset($_SESSION['enter_ok'])) {
		if (isset($_SESSION['items'])) {
			$items = $_SESSION['items'];
		}else{
			if (!$cantidad_comprar == 0 || !$cantidad_comprar == null) {	
			
				$items = array(
					'id_camiseta' => $id_camiseta,
					'nombre_camiseta' => $nombre_camiseta,
					'descripcion' => $descripcion,
					'stock' => $stock,
					'precio' => $precio,
					'color' => $color,
					'talla' => $talla,
					'imagen' => $imagen,
					'nombre_cat' => $nombre_cat,
					'cantidad_comprar' => $cantidad_comprar,
					'total_monto_registro' => $total_monto_registro
				);

				//Array multidimensional de arrays de registros de compra
				array_push($registro, $items);

				if (isset($_SESSION['carrito'])) {
					$carrito = $_SESSION['carrito'];
				}else{
					$carrito = array();
				}
				array_push($carrito, $items);
				//Array con el carrito de compra
				$_SESSION['carrito'] = $carrito;
				//contador para la cesta del header
				$_SESSION['items_carrito'] = count($carrito);
			}
		}

		header("location: ../view/catalogo.php");
	}else{
		echo "Has llegado aqui de manera extraña...";
		header('Refresh: 3; url="../index.php"');
	}
?>