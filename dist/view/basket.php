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
	<section id="mainContent" class="main-content single-tee">
		<div class="show-tee-by-cat">
		<!-- <h4>Catalogo</h4> -->
			<div id="printTees" class='print-tees wrapper'>
					

				<?php 
					if (isset($_SESSION['carrito'])) {
			    	$carrito = $_SESSION['carrito'];

			    	//$_SESSION['items_carrito'] = count($carrito);

			    	echo count($carrito);

			    	$total_pedido = 0;
			    	foreach ($carrito as $row => $value) {
		    			foreach ($carrito[$row] as $keyItem => $valueItem) {
		    				if ($keyItem == 'total_monto_registro') {
		    					$total_pedido += $valueItem;
		    				}
		    				
		    			}
			    	}
			    	print_r($carrito);
			    	echo "<span>TOTAL:</span>";
			    	echo "<span>$total_pedido</span>";
			    }
				?>
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