<?php 
    $cat_query = "SELECT * FROM venta v inner join usuario u on v.usuario_id_usuario = u.id_usuario WHERE RAND()<(SELECT ((3/COUNT(*))*10) FROM venta) ORDER BY RAND() LIMIT 4";
	//$cat_query = "select * from categoria order by id_categoria limit 2";
    $cat_resul = $conexion->query($cat_query);
    $cat_rows = $cat_resul->num_rows;
    $contador_cat = 1;
    if ($cat_rows == 0) {
        echo "No se encuentras categorias en la base de datos";
    }else{
        while ($fila_cat = $cat_resul->fetch_array()) {
            extract($fila_cat);
            echo "<tr>
                    <td class='text-muted'>$contador_cat</td>
                    <td>$id_venta</td>
                    <td>$nombre</td>
                    <td>$fecha</td>
                    <td>$descuento</td>
                    <td>$monto_final</td>
                 </tr>";
                 $contador_cat++;
        }
    }

 ?>