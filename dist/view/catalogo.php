<?php 
    session_start();
    include 'header.php';
    /*if (!isset($_SESSION['enter_ok'])) {
        //header('Location:../index.php');
        echo '<script type="text/javascript">
				window.location.assign("../index.php");
		  </script>';
    }*/
 ?>


<div id="mainGrid" class="main-grid container">
	<aside id="leftContent" class="left-content">
		<div class="cat-wrapper wrapper">
			<div class="cat-container">
				<h4>Filtrar</h4>
				<div class="cat-categories">
					<ul id="catList" class="cat-list">
					<?php 
						include 'print_categories.php';
					?>
					</ul>
				</div>
			</div>
		</div>
	</aside>
	<section id="mainContent" class="main-content">
		<div class="show-tee-by-cat">
		<h3 class="show-title">{ Aqui tienes nuestro catálogo de camisetas }</h3>
			<div id="printTees" class='print-tees wrapper'>
				<?php 
					include 'show_all_tee.php';
				?>
			<div>
		</div>
		
	</section>
</div>

<div class="prueba-busqueda-camiseta">
	<div class="results">
	<?php 
		 if (isset($_SESSION['carrito'])) {
	    	$carrito = $_SESSION['carrito'];

	    	//$_SESSION['items_carrito'] = count($carrito);

	    	//echo count($carrito);

	    	$total_pedido = 0;
	    	foreach ($carrito as $row => $value) {
    			foreach ($carrito[$row] as $keyItem => $valueItem) {
    				if ($keyItem == 'total_monto_registro') {
    					$total_pedido += $valueItem;
    				}
    				
    			}
	    	}
	    }

	 ?>
	 </div>
</div>

<?php 
 	include 'login.php';
 ?>

<?php 
    include 'footer.php';
?>