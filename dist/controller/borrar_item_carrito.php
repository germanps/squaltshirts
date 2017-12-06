<?php 
	session_start();
	$camiseta = $_POST['id-tee'];
	echo $camiseta;
	$carrito = $_SESSION['carrito'];

	echo "<p>Borrando</p>";
	unset($carrito[$camiseta]);
	$_SESSION['carrito'] = $carrito;
	//contador para la cesta del header
	$_SESSION['items_carrito'] = count($carrito);

	header("Location: ../view/basket.php");
 ?>