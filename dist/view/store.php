<?php 
  session_start();
  include 'header.php';
  include 'slider.html';
 ?>

 <div id="mainContent-main-content">
 	<div class="container">
 		<div class="grid-wrapper">
		  	<div class="grid-box a">Destacado</div>
		  	<div class="grid-box b">Outlet</div>
		  	<div class="grid-box c">Oferta</div>
		  	<div class="grid-box d">Te interesa</div>
		</div>
 	</div>
 </div>

<!--=============== LOGIN MODAL ===================-->
<div id="loginModal" class="login-modal">
	<div class="admin-page">
    	<div class="container">
        	<div class="admin-form-wrapper">
	        	<div class="form-fade">
	        		<div class="header-login-wrapper">
		            	<h2>Sign In</h2>
		            	<i id="closeLogin" class="fa fa-close"></i>
	            	</div>
	            	<form method="post" action="../controller/access.php">         
	            		<div class="form-container form-double">
	              			<div class="form-input">
	                			<input type="text" placeholder="First Name*" name="nombre">
	              			</div>
				             <div class="form-input">
				                <input type="text" placeholder="Second Name*" name="apellido">
				            </div>
	            		</div>
	            		<div class="form-container">
	             			<div class="form-input">
	                			<input type="text" placeholder="Email Address*" name="email">
	              			</div>
	            		</div>
	            		<div class="form-container">
	              			<div class="form-input">
	                			<input type="password" placeholder="Set A Password*" name="password">
	              			</div>
	            		</div>
	            		<div class="form-container">
	              			<div class="form-input">
	                			<input type="submit" value="Get Started" name="submit">
	              			</div>
	            		</div>
	            	</form>
	            </div>
        	</div>
        </div>
    </div>
 </div>

<?php 
 include 'footer.php';
?>