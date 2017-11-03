<?php 
 //$product_query = "select * from productos";
	$product_query = "select p.id_camiseta, p.nombre_camiseta, p.descripcion, p.cantidad, p.imagen, p.precio, p.color, p.talla, c.nombre FROM camiseta p, categoria c where c.id_categoria = p.categoria_id_categoria order by id_camiseta;";
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
	                <td>$precio</td>
	                <td>$color</td>
	                <td>$talla</td>
	                <td>$imagen</td>
	                <td>$nombre</td>
	                <td> 
	                    <a id='editTee' class='btn btn-danger btn-sm open-modal edit-tee'>Edit</a>
	                    <a id='dropTee' class='btn btn-danger btn-sm open-modal delete-tee'>Delete</a>
	                </td>
	             </tr>";
	             $contador_camiseta++;
	        }
	    }
 ?>