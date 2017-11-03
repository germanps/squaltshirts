<?php 
	$cat_query = "select * from categoria order by id_categoria";
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
                    <td>
                    	<a id='editCat' class='btn btn-danger btn-sm open-modal edit-cat'>Edit</a>
                    	<a id='dropCat' class='btn btn-danger btn-sm open-modal delete-cat'>Delete</a>
                    </td>
                 </tr>";
                 $contador_cat++;
        }
    }
 ?>