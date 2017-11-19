<?php 
 	
	$sale_query = "select * from venta;";
	$sale_resul = $conexion->query($sale_query);
	$sale_rows = $sale_resul->num_rows;
	$total_ventas = 0;
	if($sale_rows == 0) {
		echo "No se encuentras productos en la base de datos";
	}else{
		while ($fila = $sale_resul->fetch_array()) {
			extract($fila);
			$total_ventas += $monto_final;
		}
		echo "<span class='lifetime-total-sales'>$total_ventas</span>";		
			
	}
?>