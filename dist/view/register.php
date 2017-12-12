<?php 
  session_start();
  include 'header.php';

 ?>

 <div id="mainContent" class="home main-content">
 	<div class="container">
 		<h2 class="home-slogan">Formulario de registro</h2>
 		<div class="register-wrapper">
			<div class="header-login-wrapper">
            	<h3>Join us!</h3>
        	</div>
        	<form method="post" action="../controller/new_user.php">         
        		<div class="form-container">
          			<div class="form-input">
            			<input type="text" placeholder="Nombre*" name="nombre">
          			</div>
          		</div>
          		<div class="form-container">
		            <div class="form-input">
		                <input type="text" placeholder="Apellidos*" name="apellidos">
		            </div>
        		</div>
        		<div class="form-container">
		            <div class="form-input">
		                <input type="text" placeholder="Dni*" name="dni">
		            </div>
        		</div>
        		<div class="form-container">
         			<div class="form-input">
            			<input type="text" placeholder="Dirección*" name="dir">
          			</div>
        		</div>
        		<div class="form-container">
         			<div class="form-input">
            			<input type="text" placeholder="Email*" name="email">
          			</div>
        		</div>
        		<div class="form-container">
          			<div class="form-input">
            			<input type="password" placeholder="Contraseña*" name="password">
          			</div>
        		</div>
        		<div class="form-container">
          			<div class="form-input">
            			<input type="submit" value="Crear cuenta" name="submit">
          			</div>
        		</div>
        	</form>
		</div>
 	</div>
 </div>


 <?php 
 include 'login.php';
 ?>


<?php 
 include 'footer.php';
?>