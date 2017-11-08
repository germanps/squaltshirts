<?php 
	$user_query = "select * from usuario order by id_usuario";
	$usu_resul = $conexion->query($user_query);
	$usu_rows = $usu_resul->num_rows;
	$contador_usuarios = 1;
	if ($usu_rows == 0) {
		echo "No se encuentras usuarios en la base de datos";
	}else{
		while ($fila = $usu_resul->fetch_array()) {
			extract($fila);
			echo "<tr>
					<td class='text-muted'>$contador_usuarios</td>
					<td>$id_usuario</td>
					<td>$nombre</td>
					<td>$apellido</td>
					<td>$dni</td>
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