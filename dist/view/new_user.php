<?php 
	session_start();
  	include 'header.php';
	$nom = $_POST['nombre'];
	$apellidos = $_POST['apellidos'];
?>

<div id="mainContent" class="home main-content register">
 	<div class="container">
 		<h2>Formulario de registro</h2>
 		<div class="register-wrapper">
			<div class="header-login-wrapper">
            	<h3>Usuario creado con éxito!</h3>
            	<h4>Bienvenido a SqüalTshirts</h4>
        	</div>
		</div>
 	</div>
 </div>


<?php 
 include 'login.php';
 ?>


<?php 
 include 'footer.php';
?>