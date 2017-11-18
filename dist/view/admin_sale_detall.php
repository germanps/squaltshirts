<?php 
	$detall_query = "select * from camiseta c inner join venta_detalle d on c.id_camiseta = d.detalle_id_camiseta;";
	$detall_resul = $conexion->query($detall_query);
	$detall_rows = $detall_resul->num_rows;
	$contador_detall = 1;
	if($detall_rows == 0) {
		echo "No se encuentras productos en la base de datos";
	}else{
		while($fila_detall = $detall_resul->fetch_array()){
			extract($fila_detall);
			echo "
			
			<article class='detall-sale-result'>
				<span class='detall-name'>$nombre</span>
				<span class='detall-prize'>Precio unidad: $precio</span>
				<span class='detall-units'>Cantidad: $cantidad</span>
				<span class='detall-img'>
					<img src='../src/img/camisetas/$imagen' alt='Imagen'>
				</span>
			</article>
				

			";
	        $contador_detall++;
        }
	}

	/*
	<td> 
	    <a id='editTee' class='btn btn-danger btn-sm open-modal edit-tee'>Edit</a>
	    <a id='dropTee' class='btn btn-danger btn-sm open-modal delete-tee'>Delete</a>
	</td>
	*/
?>