<?php 
	require("conexion.php");
	$query = "select * from camiseta order by nombre;";
	$tee_resul = $conexion->query($query);
	$tee_rows = $tee_resul->num_rows;
	if ($tee_rows == 0) {
		echo "<h4 class='bg-error'>No se encuentras camisetas en la base de datos</h4>";
	}else{
			
		while ($fila = $tee_resul->fetch_array()) {
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
	                    	<input type='number' name='cantidad-compra'>
	                    	<input type='submit' value='Añadir al carrito'>
	                    </form>
					</li>
				</ul>
			";
		}
	}

 ?>