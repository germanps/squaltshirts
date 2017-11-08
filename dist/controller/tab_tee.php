<?php 
	//$product_query = "select * from camiseta limit 2";
    $product_query = "SELECT * FROM camiseta WHERE RAND()<(SELECT ((3/COUNT(*))*10) FROM camiseta) ORDER BY RAND() LIMIT 2";
    $product_resul = $conexion->query($product_query);
    $product_rows = $product_resul->num_rows;
    $contador_camiseta = 1;
    if ($product_rows == 0) {
        echo "No se encuentras productos en la base de datos";
    }else{
        while ($fila_product = $product_resul->fetch_array()) {
            extract($fila_product);

            echo "<tr>
                    <td class='text-muted'>$contador_camiseta</td>
                    <td>$id_camiseta</td>
                    <td>$nombre_camiseta</td>
                    <td>$descripcion</td>
                    <td>$cantidad</td>
                 </tr>";
                 $contador_camiseta++;
            }
        }

 ?>