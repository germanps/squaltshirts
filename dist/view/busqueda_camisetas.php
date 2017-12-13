<?php 
    session_start();
    include 'header.php';
    require('../controller/conexion.php');
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
		<h3 class="show-title">{ Aqui tienes tu búsqueda }</h3>
			<div id="printTees" class='print-tees wrapper'>
				<?php 
				if (isset($_POST['main-submit'])) {

				
					$busqueda = $_POST['main-search'];
					$query = "select * from camiseta where nombre like '%$busqueda%' order by nombre;";
					$tee_resul = $conexion->query($query);
					$tee_rows = $tee_resul->num_rows;
					if ($tee_rows == 0) {
						echo "<h4 class='bg-error'>No se encuentras camisetas en la base de datos</h4>";
					}else{
							
						while ($fila = $tee_resul->fetch_array()) {
							extract($fila);
							echo "
								<div class='tee-wrapper'>
									<ul class='product-single-list'>
										<li>
											<img src='../src/img/camisetas/$imagen' alt='camiseta'>
										</li>
										<li>$nombre</li>
										<li>$precio</li>
										<li class='ghost-button'>
											<form action='tee_detall.php' method='post'>
												<input type='hidden' name='id-tee' value='$id_camiseta'>
												<input type='submit' value='Ver detalles'>
											</form>						
										</li>
									</ul>
								</div>
							";
						}
					}
				}else{
					echo '<script type="text/javascript">
							window.location.assign("register_error.php");
					     </script>';
				}
				?>
			<div>
		</div>
		
	</section>
</div>

<?php 
    include 'footer.php';
?>