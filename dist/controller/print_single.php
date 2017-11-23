<?php 
	$id = $_POST['id-tee'];
	$query = "select * from camiseta where id_camiseta=$id;";
	$tee_resul = $conexion->query($query);
	$tee_rows = $tee_resul->num_rows;
	$contador = 1;
	if ($tee_rows == 0) {
		echo "<h4 class='bg-error'>No se encuentras camisetas en la base de datos</h4>";
	}else{
			
		while ($fila = $tee_resul->fetch_array()) {
			extract($fila);
			echo "
				<div class='tee-wrapper single-page'>
					<ul class='product-single-list'>
						<li>$nombre</li>
						<li>$descripcion</li>
						<li>$cantidad</li>
						<li>
							<img src='../src/imgcamisetas/$imagen' alt='camiseta'>
						</li>
						<li>$precio</li>
						<li>$color</li>
						<li>$talla</span>
						<li class='add-to-form'>
							<form action='../controller/agregar_carrito.php' method='post'>
								<input type='hidden' name='id-tee' value='$id_camiseta'>
								<input type='hidden' name='nombre-tee' value='$fila[1]'>
								<input type='hidden' name='descripcion-tee' value='$descripcion'>
								<input type='hidden' name='stock-tee' value='$cantidad'>
								<input type='hidden' name='precio-tee' value='$precio'>
								<input type='hidden' name='color-tee' value='$color'>
								<input type='hidden' name='talla-tee' value='$talla'>
								<input type='hidden' name='imagen-tee' value='$imagen'>
								<input type='hidden' name='nombre-cat-tee' value='$nombre'>
								<input type='number' name='cantidad-compra' value='1'>
								<input id='addCart' type='submit' value='Añadir al carrito'>
							</form>
		
						</li>
					</ul>
				</div>
				";
			$contador++;
		}
	}

	//echo "detalle camiseta: $id";

?>