<?php 
    session_start();
    include 'header.php';
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

					    	//$_SESSION['items_carrito'] = count($carrito);

					    	//echo "<p>NºItems: " . count($carrito) . "<p>";

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
					    	echo "<article class='buy-basket'>";
					    	foreach ($carrito as $key => $value) {
					    		foreach ($value as $num_item => $valor) {
					    			echo "<p>" . $num_item . " => " . $valor . "</p>";
					    		}
					    	}
					    	echo "<p>TOTAL:</p>";
					    	echo "<p>$total_pedido</p>";


				    		echo "</article>";
				    	} // END if isset($_SESSION['carrito'])
					?>
				</div> <!-- .buy-shop -->
			</div> <!-- .show-basket -->


			<aside class="show-basket-aside wrapper">
				<div class="detall-shop">
					<form action="" method="post">
						<input type="text" placeholder="Tengo un cupón">
						<p>Gastos de invío <span> 5.90</span> €</p>
						<hr>
						<p>Total: <span><?php echo $total_pedido ?></span> €</p>
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