<?php 
	require "conexion.php";
	if (!isset($_POST['search'])) exit('No se han recibido datos');

	$search = $conexion->real_escape_string($_POST['search']);
	$query = "select * from usuario where nombre like '%$search%' ";
	$usu_resul = $conexion->query($query);
	$usu_rows = $usu_resul->num_rows;
	$contador_usuarios = 1;
	if ($usu_rows == 0) {
		echo "<tr><td class='bg-error'>No se encuentras usuarios en la base de datos</td></tr>";
	}else{
		echo "<h4>Resultados de búsqueda</h4>";
		echo "
			<tr>
				<th>Nombre</th>
				<th>Apellido</th>
				<th>Email</th>
				<th>Password</th>
				<th>Tipo usuari</th>
			</th>";
		while ($fila = $usu_resul->fetch_array()) {
			extract($fila);
			echo "
				<tr>
					<td>$nombre</td>
					<td>$apellido</td>
					<td>$email</td>
					<td>$password</td>
					<td>$tipo_usuario</td>
				 </tr>";
			$contador_usuarios++;
		}
	}
 ?>