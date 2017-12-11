<?php 
  session_start();

  //header('Location:view/store.php');
 ?>
  
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Access</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans|Oswald|PT+Sans" rel="stylesheet">
  <link rel="stylesheet" href="src/css/main.css">
</head>
<body>
	<div class="index-login">
		<h2>ACCESS</h2>
		<form method="post" action="controller/intro.php">         
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
    <!-- <a href="view/store.php">Acceder a la tienda</a> -->
</body>
</html>