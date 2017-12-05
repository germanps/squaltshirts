<?php 
	session_start();
	require "../controller/conexion.php";

	if (isset($_SESSION['carrito']) && isset($_SESSION['usu_user'])) {	
		$carrito = $_SESSION['carrito'];
		$usuario = $_SESSION['usu_user'];
		//print_r($carrito);
		foreach ($carrito as $key => $value) {
			foreach ($value as $num_item => $valor) {
				echo $valor . "<br>";
				if ($num_item == 'total_monto_registro') {
					$total_compra = $valor;
				}
			}
		}

		//Capturamos el id del usuario que está comprando
		$user_query = "select * from usuario where nombre='$usuario';";
		$usu_resul = $conexion->query($user_query);
		$usu_rows = $usu_resul->num_rows;

		while ($fila = $usu_resul->fetch_array()) {
			extract($fila);
		}
		
		echo $total_compra;
		echo $usuario;
		echo $id_usuario;
	}
	

?>