<?php 
    session_start();
    include 'header.php';
    require "../controller/conexion.php";
 ?>

<div id="mainGrid" class="main-grid container">
	
	<section id="mainContent" class="main-content basket-shop">
		<h2>Cesta de la compra segura</h2>
		<div class="flex-container">
			<div class="show-basket-content wrapper">
				<div id="buyShop" class='buy-shop'>
					
					<?php 
						//Si no hay items en el carrito, redireccionamos al home	
						if (!isset($_SESSION['carrito'])) {
							echo '<script type="text/javascript">
										window.location.assign("store.php");
								  </script>';
						}

						if (isset($_SESSION['carrito'])) {	
					    	$carrito = $_SESSION['carrito'];
					    	//Calculamos el importe final para poder hacer directamente el insert en la tabla venta
					    	$total_pedido = 0;
					    	foreach ($carrito as $row => $value) {
				    			foreach ($value as $keyItem => $valueItem) {
				    				if ($keyItem == 'total_monto_registro') {
				    					$total_pedido += $valueItem;
				    				}	
				    			}
					    	}
					?>
					<?php

					    	foreach ($carrito as $key => $value) {
					    		echo "<article class='buy-basket-item'>";
					    		foreach ($value as $num_item => $valor) {
					    			if ($num_item == 'id_camiseta') {
										$query = "select * from camiseta where id_camiseta=$valor";
										$usu_resul = $conexion->query($query);
										$usu_rows = $usu_resul->num_rows;
										$contador = 1;
										if ($usu_rows == 0) {
											echo "<p>Error, no se encuentran items</p>";
										}else{
											while ($fila = $usu_resul->fetch_array()) {
												extract($fila);
												echo "
													<div class='detal-img'>
							    						<img src='../src/imgcamisetas/$imagen' alt='$imagen'>
							    					</div>
							    					<div class='detall-center'>
														<p>$nombre</p>
														<p>$descripcion</p>
														<p>$precio</p>
							    					</div>
												";
											}
										}
					    			}
				    				if ($num_item == 'talla') {
				    					echo "<div class='detall-left'>";
				    						echo "<p>Talla: $valor</p>";
				    				}
				    				if ($num_item == 'total_monto_registro') {
				    						echo "<p>Total registro: $valor</p>";
				    				}
				    				if ($num_item == 'cantidad_comprar') {
				    						echo "<p>Cantidad a comprar: $valor</p>";
				    						echo "<span>En stock!</span>";
				    					echo "</div>";
				    				}

					    		}
					    		echo "</article>";
					    	}
					    	echo "<p>TOTAL DEL PEDIDO: <span class='total-order'>$total_pedido<span></p>";

				    	} // END if isset($_SESSION['carrito'])

					?>
				</div> <!-- .buy-shop -->
			</div> <!-- .show-basket -->

			<aside class="show-basket-aside wrapper">
				<div class="detall-shop">
					<form action="../controller/confirmar_pedido.php" method="post">
						<input type="text" placeholder="Tengo un cupón">
						<p>Gastos de invío <span> 5.90</span> €</p>
						<hr>
						<p>Total del pedido: <span class='total-order'><?php echo $total_pedido ?></span> €</p>
						<input type="submit" value="Confirmar pedido">
					</form>
				</div>
			</aside>

		</div> <!-- .flex-container -->
	</section>
</div>



 <?php 
 	include 'login.php';
 ?>

<?php 
    include 'footer.php';
?>