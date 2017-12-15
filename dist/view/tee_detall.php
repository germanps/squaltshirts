<?php 
    session_start();
    include 'header.php';
 ?>

<div id="mainGrid" class="main-grid container">
	<section id="mainContent" class="main-content single-tee">
		<div class="show-tee-by-cat">
		<!-- <h3 class="show-title">{ Te gusta? }</h3> -->
			<div id="printTees" class='print-tees wrapper show-single'>
				
				<?php 
					include 'print_single.php';
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