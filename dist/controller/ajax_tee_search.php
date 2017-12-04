<?php 
	require "conexion.php";
	if (!isset($_POST['search'])) exit('No se han recibido datos');

	$search = $conexion->real_escape_string($_POST['search']);
	$query = "select * from camiseta where nombre like '%$search%' ";
	$usu_resul = $conexion->query($query);
	$usu_rows = $usu_resul->num_rows;
	$contador = 1;
	if ($usu_rows == 0) {
		echo "<tr><td class='bg-error'>No se encuentras camisetas en la base de datos</td></tr>";
	}else{
		echo "<h4>Resultados de búsqueda</h4>";
		echo "
			<tr>
				<th class='item-num'>Item nº</th>
                <th>ID camiseta</th>
                <th>Nombre</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Color</th>
                <th>Talla</th>		                                
			</th>";
		while ($fila = $usu_resul->fetch_array()) {
			extract($fila);
			echo "
				<tr>
					<td>$contador</td>
					<td>$id_camiseta</td>
					<td>$nombre</td>
					<td>$cantidad</td>
					<td>$precio</td>
					<td>$color</td>
					<td>$talla</td>
				 </tr>";
			$contador++;
		}
	}
 ?>