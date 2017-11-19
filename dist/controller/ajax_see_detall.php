<?php 
	require "conexion.php";
	if (!isset($_POST['search'])) exit('No se han recibido datos');
	$search = $conexion->real_escape_string($_POST['search']);
	$detall_query = "select * from camiseta c inner join venta_detalle d on c.id_camiseta = d.detalle_id_camiseta where detalle_id_venta=$search;";
	$detall_resul = $conexion->query($detall_query);
	$detall_rows = $detall_resul->num_rows;
	$contador_detall = 1;
	$monto_final = 0;
	$control = 0;
	if($detall_rows == 0) {
		echo "No se encuentras productos en la base de datos";
	}else{
		while($fila_detall = $detall_resul->fetch_array()){
			extract($fila_detall);
			echo "
			
			<article class='detalle-sale-result'>
				<h4>Artículo $contador_detall</h4>
				<p class='detall-name'>
					<span>Producto: </span>
					<span>$nombre</span>
				</p>
				<p class='detall-prize'>
					<span>Precio unidad:</span>
					<span> $precio</span>
				</p>
				<p class='detall-units'>
					<span>Cantidad:</span>
					<span> $cantidad</span>
				</p>
				<p class='detall-size'>
					<span>Talla:</span>
					<span> $talla</span>
				</p>
				<p class='detall-color'>
					<span>Color</span>
					<span> $color</span>
				</p>

				<span class='detall-img'>
					<img src='../src/img/camisetas/$imagen' alt='Imagen'>
				</span>
			</article>
			
			";
	        $contador_detall++;
	        $monto_final += $precio;
        }
	}
 ?>