<?php 
	session_start();
	require('../controller/conexion.php');
    if (!isset($_SESSION['admin_user'])) {
        //echo "No existe el usuario...";
        header('Location:../index.php');
    }
 ?>