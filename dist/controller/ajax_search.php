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
		while ($fila = $usu_resul->fetch_array()) {
			extract($fila);
			echo "
				<h4>Resultados de búsqueda</h4>
				<tr>
					<td class='text-muted'>$contador_usuarios</td>
					<td>$id_usuario</td>
					<td>$nombre</td>
					<td>$apellido</td>
					<td>$email</td>
					<td>$password</td>
					<td>$tipo_usuario</td>
					<td>
						<a id='editUser' class='btn btn-danger btn-sm open-modal edit-usu'>Edit</a>
						<a id='dropUser' class='btn btn-danger btn-sm open-modal delete-usu'>Delete</a>
                    </td>
				 </tr>";
			$contador_usuarios++;
		}
	}
 ?>