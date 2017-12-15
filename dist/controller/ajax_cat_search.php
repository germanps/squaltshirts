<?php 
	require "conexion.php";
	if (!isset($_POST['search'])) exit('No se han recibido datos');

	$search = $conexion->real_escape_string($_POST['search']);
	$query = "select * from categoria where nombre like '%$search%' ";
	$usu_resul = $conexion->query($query);
	$usu_rows = $usu_resul->num_rows;
	$contador = 1;
	if ($usu_rows == 0) {
		echo "<tr><td class='bg-error'>No se encuentras categorias en la base de datos</td></tr>";
	}else{
		echo "<h4>Resultados de búsqueda</h4>";
		echo "
			<tr>
				<th class='item-num'>Nº</th>
				<th>Id Categoria</th>
				<th>Nonbre Categoria</th>
			</th>";
		while ($fila = $usu_resul->fetch_array()) {
			extract($fila);
			echo "
				<tr>
					<td>$contador</td>
					<td>$id_categoria</td>
					<td>$nombre</td>
				</tr>";
		}
	}
 ?>