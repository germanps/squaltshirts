<?php 
    session_start();
    include 'header.php';
 ?>


<div id="mainGrid" class="main-grid container">
	<aside id="leftContent" class="left-content">
		<div class="cat-wrapper wrapper">
			<div class="cat-container">
				<h4>Filtrar</h4>
				<div class="cat-categories">
					<ul id="catList" class="cat-list">
					<?php 
						include '../controller/print_categories.php';
					?>
					</ul>
				</div>
			</div>
		</div>
	</aside>
	<section id="mainContent" class="main-content">
		<div class="show-tee-by-cat">
		<!-- <h4>Catalogo</h4> -->
			<div id="printTees" class='print-tees wrapper'>
				<?php 
					include '../controller/show_all_tee.php';
				?>
			<div>
		</div>
		
	</section>
</div>


<!-- ==== comprobar que el articulo va al array del carrito (refoactorizar y luego borrar html) ==== -->
<div class="prueba-busqueda-camiseta">
	<div class="results">
	<?php 
		 if (isset($_SESSION['carrito'])) {
	    	$carrito = $_SESSION['carrito'];
	    	//$items = $_SESSION['items'];

	    	$_SESSION['items_carrito'] = count($carrito);

	    	echo count($carrito);
	    	print_r($carrito);
	    	$total_pedido = 0;
	    	foreach ($carrito as $row => $value) {
    			foreach ($carrito[$row] as $keyItem => $valueItem) {
    				if ($keyItem == 'total_monto_registro') {
    					$total_pedido += $valueItem;
    				}
    				
    			}
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
 	include 'login.php';
 ?>

<?php 
    include 'footer.php';
?>