<?php 
    session_start();
    include 'header.php';
    require "../controller/conexion.php";
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

<div id="mainGrid" class="main-grid container">
	
	<section id="mainContent" class="main-content order-shop">
		<div class="flex-container">
			<div class="show-send-content">
				<h2>Dirección de entrega</h2>
				<div class="flex-column">
					<div id="sendDirecction" class='send-direction wrapper'>
						<?php
							if (isset($_SESSION['usu_user'])) {	
								$usuario = $_SESSION['usu_user'];
								$usu_correo = $_SESSION['usu_mail'];

								$user_query = "select * from usuario where email='$usu_correo';";
								$usu_resul = $conexion->query($user_query);
								$usu_rows = $usu_resul->num_rows;
								while ($fila = $usu_resul->fetch_array()) {
									extract($fila);
									
								}
							}else{
								echo "<h3>Debes iniciar sesión con tu usuario</h3>";
								echo '<script type="text/javascript">
											window.location.assign("basket.php");
											alert("Debes hacer login para hacer un pedido");
									  </script>';
																
							}

						?>
						<ul class="send-list">
							<li><h3><?php echo $nombre ?> <?php echo $apellido ?></h3></li>
							<li><p><?php echo $dni ?></p></li>
							<li><p><?php echo $direccion ?></p></li>
							<li><p><?php echo $email ?></p></li>
						</ul>
						
					</div> 

					<div class="total-order-container">
						<form action="../controller/confirmar_pedido.php" method="post">
							<p>Gastos de invío <span class="shipping"> 5.90€</span> </p>
							<p>Total del pedido: <span class='total-order'><?php echo $total_pedido+5.9 ?> €</span></p>
							<span class="iva">(IVA incluido)</span>
							<input type="submit" value="Confirmar pedido">
						</form>
					</div>
				</div>
			</div> 

			<aside class="aside-resume">
				<div class="resume-order">
				<h2>Resumen del pedido</h2>
					
					<?php 
						    	
				    	foreach ($carrito as $key => $value) {
				    		echo "<article class='buy-resume-item clearfix'>";
				    		$indice_array = $key;
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
						    						<img src='../src/img/camisetas/$imagen' alt='$imagen'>
						    					</div>
						    					<div class='detall-center'>
													<h3>$nombre</h3>
													<p>$descripcion</p>
													<p class='value'>$precio €</p>
						    					
											";
										}
									}
				    			}
			    				if ($num_item == 'talla') {
					    					 echo "<p>Talla: $valor</p>";
			    				}
			    				if ($num_item == 'total_monto_registro') {
			    					echo "<span class='value'> $valor €</span>";
			    					echo "<span class='stock'>En stock!</span>";
			    					echo "</div>";
			    				}
			    				if ($num_item == 'cantidad_comprar') {
			    					/*echo "<div class='subtotal'>";*/
			    					echo "<span class='items'>$precio € X $valor =</span>";
			    					
			    				}

				    		}
				    		echo "</article>";
				    	}

					?>
					
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