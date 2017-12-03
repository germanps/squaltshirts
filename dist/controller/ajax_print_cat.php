<?php 
	require "conexion.php";
	if (!isset($_POST['search'])) exit('No se han recibido datos');

	$cat = $conexion->real_escape_string($_POST['search']);
	$query = "select * from camiseta where categoria_id_categoria=$cat;";
	$cat_tee_resul = $conexion->query($query);
	$cat_tee_rows = $cat_tee_resul->num_rows;
	if ($cat_tee_rows == 0) {
		echo "<h4 class='bg-error'>No se encuentras camisetas en la base de datos</h4>";
	}else{
			
		while ($fila = $cat_tee_resul->fetch_array()) {
			extract($fila);
			echo "
				<div class='tee-wrapper'>
					<ul class='product-single-list'>
						<li>
							<img src='../src/img/camisetas/$imagen' alt='camiseta'>
						</li>
						<li>$nombre</li>
						<li>$precio</li>
						<li class='ghost-button'>
							<form action='tee_detall.php' method='post'>
								<input type='hidden' name='id-tee' value='$id_camiseta'>
								<input type='submit' value='Ver detalles'>
							</form>
							
						</li>
					</ul>
				</div>
			";
		}
	}

 ?>