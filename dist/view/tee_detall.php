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
						$id = $_POST['id-tee'];
						echo "detalle camiseta: $id";

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