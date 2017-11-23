<?php 
	require "conexion.php";
	if (!isset($_POST['search'])) exit('No se han recibido datos');

	$cat = $conexion->real_escape_string($_POST['search']);
	$query = "select * from camiseta where categoria_id_categoria=$cat;";
	$cat_tee_resul = $conexion->query($query);
	$cat_tee_rows = $cat_tee_resul->num_rows;
	$contador = 1;
	if ($cat_tee_rows == 0) {
		echo "<h4 class='bg-error'>No se encuentras camisetas en la base de datos</h4>";
	}else{
			
		while ($fila = $cat_tee_resul->fetch_array()) {
			extract($fila);
			echo "
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
						<li>
							<form action='../view/tee_detall.php' method='post'>
								<input type='hidden' name='id-tee' value='$id_camiseta'>
								<input type='submit' value='Ver detalles'>
							</form>
							
						</li>
					</ul>
				";
			$contador++;
		}
	}

 ?>