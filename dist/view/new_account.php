<?php 
	session_start();
  	include 'header.php';
	$nombre = $_POST['nombre'];
	$apellidos = $_POST['apellidos'];
	$dni = $_POST['dni'];
	$dir = $_POST['dir'];
	$email = $_POST['email'];
	$pass = $_POST['password'];

	$insert_user_query = "insert into usuario(id_usuario, nombre, apellido, dni, direccion, email, password, tipo_usuario) values('null','$nombre', '$apellidos', '$dni', '$dir', '$email', '$pass', 0)";
	$insert_user_resul = $conexion->query($insert_user_query);
	$conexion->close();	
	//Iniciamos sesion
	$_SESSION['usu_user'] = $nombre;
	$_SESSION['usu_mail'] = $email;
?>

<div id="mainContent" class="home main-content register">
 	<div class="container">
 		<h2>Formulario de registro</h2>
 		<div class="register-wrapper">
			<div class="header-login-wrapper">
            	<h3>Usuario creado con éxito!</h3>
            	<h4>Bienvenido a SqüalTshirts <?php echo $nombre . " " . $apellidos ?></h4>
            	<p>Puedes iniciar tus compras en cualquier momento</p>
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