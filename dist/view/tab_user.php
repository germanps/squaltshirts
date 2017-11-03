<?php 

	$user_query = "select * from usuario order by id_usuario limit 2";
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
					<td>$email</td>
				 </tr>";
				$contador_usuarios++;
		}
	}
 ?>