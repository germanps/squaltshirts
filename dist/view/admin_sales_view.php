<?php 
	//$sale_query = "select v.id_venta, v.fecha, v.monto_final, v.descuento, v.usuario_id_usuario, d.detalle_id_venta, d.detalle_id_camiseta, d.cantidad, d.precio from venta v, venta_detalle d where  v.id_venta = d.detalle_id_venta group by v.id_venta order by v.id_venta;";
	$sale_query = "select * from usuario u inner join venta v on u.id_usuario = v.usuario_id_usuario;";

	$sale_resul = $conexion->query($sale_query);
	$sale_rows = $sale_resul->num_rows;

	$contador_ventas = 1;
	if($sale_rows == 0) {
		echo "No se encuentras productos en la base de datos";
	}else{
		//$user_query = "select * from usuario where id_usuario = $usuario_id_usuario;"
		$user_resul = $conexion->query($user_query);
		while($fila_sale = $sale_resul->fetch_array()){
			extract($fila_sale);
			$id_user = $usuario_id_usuario;
			echo "<tr>
	                <td class='text-muted'>$contador_ventas</td>
	                <td>$id_venta</td> 
	                <td>$fecha</td>
	                <td>$usuario_id_usuario</td>
	                <td>
	                	<span>$nombre</span>
	                	<span>$apellido</span>
	                	<span>$dni</span>
	                </td>
	                <td>$direccion</td>
	                <td>$descuento</td>
	                <td>$monto_final </td>
	             </tr>";
	             $contador_ventas++;
        }

	}
	
	/*
	<td> 
	    <a id='editTee' class='btn btn-danger btn-sm open-modal edit-tee'>Edit</a>
	    <a id='dropTee' class='btn btn-danger btn-sm open-modal delete-tee'>Delete</a>
	</td>
	*/
?>