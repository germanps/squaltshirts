<?php 
	session_start();
  	include 'header.php';

	$nombre = $_POST['nombre'];
	$apellidos = $_POST['apellidos'];
	$dni = $_POST['dni'];
	$dir = $_POST['dir'];
	$mail = $_POST['email'];
	$pass = $_POST['password'];

	//comporbar que el email no se repita en la base de datos
	$email_user_query = "select email from usuario;";
	$email_resul = $conexion->query($email_user_query);
	$email_rows = $email_resul->num_rows;
	while ($fila = $email_resul->fetch_array()) {
		extract($fila);
		if ($fila[0] == $mail) {
			echo '<script type="text/javascript">
					alert("El email ya está registrado, vuelve a probar")
					window.location.assign("register.php");
			     </script>';
		}
	}

	//verificar formulario
	$control = true;
	if (isset($_POST['creaNuevoUser'])) {
  		if ($nombre == '') {
  			$control = false;
  		}elseif ($apellidos == '') {
  			$control = false;
  		}elseif ($dni == '') {
  			$control = false;
  		}elseif ($dir == '') {
  			$control = false;
  		}elseif ($mail == '' or !preg_match("/^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/",$_POST['email'])) {
  			$control = false;
  		}elseif ($pass == '') {
  			$control = false;
  		}

  		if ($control) {
			$insert_user_query = "insert into usuario(id_usuario, nombre, apellido, dni, direccion, email, password, tipo_usuario) values('null','$nombre', '$apellidos', '$dni', '$dir', '$mail', '$pass', 0)";
			$insert_user_resul = $conexion->query($insert_user_query);
			$conexion->close();	
			//Iniciamos sesion
			$_SESSION['usu_user'] = $nombre;
			$_SESSION['usu_mail'] = $mail;
		}else{
			echo '<script type="text/javascript">
					window.location.assign("register_error.php");
			     </script>';
		}
  	}

?>

<div id="mainContent" class="home main-content register">
 	<div class="container">
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