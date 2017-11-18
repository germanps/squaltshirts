<?php 
	$detall_query = "select * from camiseta c inner join venta_detalle d on c.id_camiseta = d.detalle_id_camiseta;";
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
					<span>Cantidad</span>
					<span> $cantidad</span>
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
	
	//Update del monto final en la tabla venta
	//$update_monto = "update venta set monto_final=$monto_final where id_venta=$detalle_id_venta;";
	//$update = $conexion->query($update_monto);
	


	$conexion->close();
	/*
	<td> 
	    <a id='editTee' class='btn btn-danger btn-sm open-modal edit-tee'>Edit</a>
	    <a id='dropTee' class='btn btn-danger btn-sm open-modal delete-tee'>Delete</a>
	</td>
	*/
?>