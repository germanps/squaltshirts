<?php 
	/*$sale_query = "select v.id_venta, v.fecha, v.monto_final, v.descuento, v.usuario_id_usuario, d.detalle_id_venta, d.detalle_id_camiseta, d.cantidad, d.precio from venta v, venta_detalle d where  v.id_venta = d.detalle_id_venta group by v.id_venta order by v.id_venta;";*/
	$sale_query = "select * from usuario u inner join venta v on u.id_usuario = v.usuario_id_usuario where v.monto_final = (select max(monto_final) from venta);";
	$sale_resul = $conexion->query($sale_query);
	$sale_rows = $sale_resul->num_rows;
	if($sale_rows == 0) {
		echo "No se encuentras productos en la base de datos";
	}else{
		while ($fila = $sale_resul->fetch_array()) {
			extract($fila);
			
			echo "
				<li class='lifetime-total-sales'>
					<span>$nombre</span>
					<span>$apellido</span>
					<span>$dni</span>
				</li>
				<li class='lifetime-total-sales'>$monto_final</li>									
			";
		}
	}

?>