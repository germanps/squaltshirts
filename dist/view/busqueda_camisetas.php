<?php 
    session_start();
    include 'header.php';
    require('../controller/conexion.php');    
 ?>

<div class="prueba-busqueda-camiseta">
	<table class="results">
		<?php 
			$product_query = "select p.id_camiseta, p.nombre, p.descripcion, p.cantidad, p.imagen, p.precio, p.color, p.talla, c.nombre FROM camiseta p, categoria c where c.id_categoria = p.categoria_id_categoria order by id_camiseta;";
			$product_resul = $conexion->query($product_query);
			$product_rows = $product_resul->num_rows;
			$contador_camiseta = 1;
			if ($product_rows == 0) {
			    echo "No se encuentras productos en la base de datos";
			}else{
			    while ($fila_product = $product_resul->fetch_array()) {
			        extract($fila_product);

			        echo "<ul class='product-single-list'>
			                <li>$contador_camiseta</li>
			                <li>$id_camiseta</li>
			                <li>$fila_product[1]</li>
			                <li>$descripcion</li>
			                <li>$cantidad</li>
			                <li>$precio</li>
			                <li>$color</li>
			                <li>$talla</li>
			                <li>$imagen</li>
			                <li>$nombre</li>
			                <li> 
			                    <form action='../controller/agregar_carrito.php' method='post'>
			                    	<input type='hidden' name='id-tee' value='$id_camiseta'>
			                    	<input type='hidden' name='nombre-tee' value='$fila_product[1]'>
			                    	<input type='hidden' name='descripcion-tee' value='$descripcion'>
			                    	<input type='hidden' name='stock-tee' value='$cantidad'>
			                    	<input type='hidden' name='precio-tee' value='$precio'>
			                    	<input type='hidden' name='color-tee' value='$color'>
			                    	<input type='hidden' name='talla-tee' value='$talla'>
			                    	<input type='hidden' name='imagen-tee' value='$imagen'>
			                    	<input type='hidden' name='nombre-cat-tee' value='$nombre'>
			                    	<input type='number' name='cantidad-compra'>
			                    	<input type='submit' value='Añadir al carrito'>
			                    </form>
			                </li>
			             </ul>";
			             $contador_camiseta++;
			        }
			    }
		 ?>
	</table>
</div>
<div class="prueba-busqueda-camiseta">
	<div class="results">
	<?php 
		 if (isset($_SESSION['carrito'])) {
	    	$carrito = $_SESSION['carrito'];
	    	//$items = $_SESSION['items'];

	    	echo "<h5>Listado compra</h5>";
	    	$_SESSION['items_carrito'] = count($carrito);
	    	echo "<h5>Items</h5>";
	    	//print_r($carrito);
	    	$total_pedido = 0;
	    	foreach ($carrito as $row => $value) {
	    		echo "<article>";
	    			foreach ($carrito[$row] as $keyItem => $valueItem) {

	    				echo "<div>";
		    				//echo "<span>$keyItem => $valueItem</span>";
		    				//echo "<span>$valueItem</span>";
	    				if ($keyItem == 'nombre_camiseta') {
	    					echo "<span>Nombre: </span>";
	    					echo "<span>$valueItem</span>";
	    				}
	    				if ($keyItem == 'descripcion') {
	    					echo "<span>Descripción: </span>";
	    					echo "<span>$valueItem</span>";
	    				}
	    				if ($keyItem == 'color') {
	    					echo "<span>Color: </span>";
	    					echo "<span>$valueItem</span>";
	    				}
	    				if ($keyItem == 'talla') {
	    					echo "<span>Talla: </span>";
	    					echo "<span>$valueItem</span>";
	    				}
	    				if ($keyItem == 'cantidad_comprar') {
	    					echo "<span>Cantidad: </span>";
	    					echo "<span>$valueItem</span>";
	    				}
	    				if ($keyItem == 'imagen') {
	    					//echo "<img src='../src/img/camisetas/$valueItem'>";
	    				}
	    				if ($keyItem == 'total_monto_registro') {
	    					echo "<span>Subtotal:</span>";
	    					echo "<span>$valueItem</span>";
	    					$total_pedido += $valueItem;
	    				}
	    				
	    				
	    				echo "</div>";
	    			}
	    		echo "</article>";
	    	}
	    	echo "<span>TOTAL:</span>";
	    	echo "<span>$total_pedido</span>";
	    }

    	/* Para crear una venta (mysql)
			-crear venta (-actualizar el total de la venta (id))
			-rescatar la última venta (id)
			-hacer los inserts en el detalle venta
	
    	*/

	 ?>
	 </div>
</div>


<?php 
    include 'footer.php';
?>