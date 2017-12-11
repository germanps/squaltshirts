<?php 
	session_start();
	require "../controller/conexion.php";

	if (isset($_SESSION['carrito']) && isset($_SESSION['usu_user'])) {	
		$carrito = $_SESSION['carrito'];
		$usuario = $_SESSION['usu_user'];
		$usu_correo = $_SESSION['usu_mail'];
		$total_compra = 0;
		//print_r($carrito);
		foreach ($carrito as $key => $value) {
			foreach ($value as $num_item => $valor) {
				//echo $valor . "<br>";
				if ($num_item == 'total_monto_registro') {
					$total_compra += $valor;
				}
			}
		}
		//Capturamos el id del usuario que está comprando
		$user_query = "select * from usuario where email='$usu_correo';";
		$usu_resul = $conexion->query($user_query);
		$usu_rows = $usu_resul->num_rows;
		while ($fila = $usu_resul->fetch_array()) {
			extract($fila);
		}

		//Hacemos el insert de la venta
		$insert_venta = "insert into venta (id_venta, fecha, monto_final, descuento, usuario_id_usuario) values('null', CURRENT_TIMESTAMP, $total_compra, 0, $id_usuario);";
		$insert_venta_resul = $conexion->query($insert_venta);

		//Cogemos el id del último insert de la tabla venta
		$id_de_la_venta = mysqli_insert_id($conexion);

		//Hacemos un insert en la tabla venta_detalle por cada registro del array $carrito
		foreach ($carrito as $key => $value) {
			foreach ($value as $num_item => $valor) {
				//Guardamos los valores que necesitamos para el insert final
				if ($num_item == "id_camiseta") {
					$id_de_la_camiseta = $valor;
				}

				if ($num_item == "cantidad_comprar") {
					$la_cantidad = $valor;
				}

				if ($num_item == "precio") {
					$el_precio = $valor;
				}
			}
			//inserts por cada camiseta que hay en la venta
			$insert_detalle_camiseta = "insert into venta_detalle (detalle_id_venta, detalle_id_usuario, detalle_id_camiseta, cantidad, precio) values($id_de_la_venta, $id_usuario, $id_de_la_camiseta, $la_cantidad, $el_precio); ";
			$insert_detalle_camiseta_resul = $conexion->query($insert_detalle_camiseta);

			//Extraemos la cantidad principal de cada camiseta
			$cantidad_query = "select cantidad from camiseta where id_camiseta = $id_de_la_camiseta;";
			$cantidad_resul = $conexion->query($cantidad_query);
			$cantidad_rows = $cantidad_resul->num_rows;
			while ($fila = $cantidad_resul->fetch_array()) {
				extract($fila);
				
			}
			//Restamos las camisetas compradas
			$cantidad_retirar = ($cantidad - $la_cantidad);

			//update de la tabla camiseta (según la cantidad comprada)
			$update_camiseta = "update camiseta set cantidad = $cantidad_retirar where id_camiseta = $id_de_la_camiseta;";
			$insert_update_camiseta = $conexion->query($update_camiseta);
		}
		
		$conexion->close();	
		//Vaciamos el carrito
		$_SESSION['carrito'] = null;
		$_SESSION['items_carrito'] = null;

		echo '<script type="text/javascript">
					window.location.assign("../view/store.php");
			  </script>';
		
	}else{
		if (!isset($_SESSION['carrito'])) {
			echo "Debes ingresar algún articulo al carrito";
			//Vaciamos el carrito
			//$_SESSION['carrito'] = null;
			//$_SESSION['items_carrito'] = null;
			header("Refresh: 3; url=".$_SERVER['HTTP_REFERER']);//volvemos atrás
		}
		if (!isset($_SESSION['usu_user'])) {
			echo "Debes iniciar sesión con tu usuario";
			//Vaciamos el carrito
			//$_SESSION['carrito'] = null;
			//$_SESSION['items_carrito'] = null;
			header("Refresh: 3; url=".$_SERVER['HTTP_REFERER']);//volvemos atrás
		}
	}

?>