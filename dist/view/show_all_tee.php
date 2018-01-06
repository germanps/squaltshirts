<?php 
	require("../controller/conexion.php");
	if (isset($_SESSION['enter_ok'])) {
		$query = "select * from camiseta where cantidad > 0 order by nombre;";
		$tee_resul = $conexion->query($query);
		$tee_rows = $tee_resul->num_rows;
		if ($tee_rows == 0) {
			echo "<h4 class='bg-error'>No se encuentras camisetas en la base de datos</h4>";
		}else{
				
			while ($fila = $tee_resul->fetch_array()) {
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
	}else{
		echo "Has llegado aqui de manera extraña...";
        header('Refresh: 3; url="../index.php"');
	}

 ?>