<?php 
	$cat_query = "select * from categoria order by id_categoria limit 2";
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
                    <td>$id_categoria</td>
                    <td>$nombre</td>
                 </tr>";
                 $contador_cat++;
        }
    }

 ?>