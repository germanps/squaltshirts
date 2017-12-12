<?php 
  session_start();
  include 'header.php';
  include 'slider.html';
  	/*if (!isset($_SESSION['enter_ok'])) {
        //header('Location:../index.php');
        echo '<script type="text/javascript">
				window.location.assign("../index.php");
		  </script>';
    }*/
 ?>

 <div id="mainContent" class="home main-content">
 	<div class="container">
 		<h2 class="home-slogan"><span>{ <?php include '../controller/tee_counter.php' ?> }</span> Camisetas para regalar a tus amigos y familiares!</h2>
 		<div class="grid-wrapper">
		  	<div class="grid-box a"><h3 id="destacado">Destacado</h3></div>
		  	<div class="grid-box b"><h3 id="outlet">Outlet</h3></div>
		  	<div class="grid-box c"><h3 id="ofertaDia">Oferta del día</h3></div>
		  	<div class="grid-box d"><h3 id="teInteresa">Te interesa</h3></div>
		</div>
 	</div>
 </div>
<?php 
 include 'login.php';
 ?>


<?php 
 include 'footer.php';
?>