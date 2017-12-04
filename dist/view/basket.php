<?php 
    session_start();
    include 'header.php';
 ?>

<div id="mainGrid" class="main-grid container">
	<!-- <aside id="leftContent" class="left-content">
		<div class="cat-wrapper wrapper">
			<div class="cat-container">
				<h4>Filtrar</h4>
				<div class="cat-categories">
					<ul id="catList" class="cat-list">
					<?php 
						//include '../controller/print_categories.php';
					?>
					</ul>
				</div>
			</div>
		</div>
	</aside> -->
	<section id="mainContent" class="main-content basket-shop">
		<div class="show-basket">
		<!-- <h4>Catalogo</h4> -->
			<div id="buyShop" class='buy-shop wrapper'>
				
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
				    	//print_r($carrito);
				?>

				<div class="buy-basket-container container">

					<?php
					    	echo "<article class='buy-basket'>";
					    	foreach ($carrito as $key => $value) {
					    		//echo $key;
					    		foreach ($value as $num_item => $valor) {
					    			echo "<p>" . $num_item . " => " . $valor . "</p>";
					    		}
					    	}
					    	echo "<p>TOTAL:</p>";
					    	echo "<p>$total_pedido</p>";
				    		echo "</article>";
				    	} // END if isset($_SESSION['carrito'])
					?>

				</div>
			<div>
		</div>
		
	</section>
</div>



 <?php 
 	include 'login.php';
 ?>

<?php 
    include 'footer.php';
?>