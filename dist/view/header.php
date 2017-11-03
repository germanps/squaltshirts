<?php 
    //session_start();
    require('../controller/conexion.php');
?>

<!doctype html>
<html class="no-js" lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>SqüalTshirts -- Shopping</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="https://fonts.googleapis.com/css?family=Open+Sans|Oswald|PT+Sans" rel="stylesheet">
        <link rel="stylesheet" href="../src/css/main.css">
        <script src="../src/js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        
        <!-- Header -->
        <header class="header">
            <div id="topBar" class="top-bar">
                <div class="container">
                    <ul class="top-bar-list">
                        <li class="top-bar-items">
                            <img src="../src/img/camion.png" alt="envío gratis" title="envío gratis">
                        </li>
                        <li class="top-bar-items">
                            <img src="../src/img/time.png" alt="tiempo de entrega" title="tiempo de entrega">
                        </li>
                        <li class="top-bar-items">
                            <img src="../src/img/satisfaccion.png" alt="satisfaccion" title="tsatisfaccion">
                        </li>
                    </ul>
                </div>
            </div>
            <div class="container header-menu">
            	<div id="haderMenuToolbar" class="header-menu-toolbar">
                    <ul class="header-list">
                        <li class="header-list-item">
                            <div class="logo-wrapper">
                                <a href="store.php" class="logo">
                                    <!-- <img src="../src/img/logo-squalo.png" alt="logo"> -->
                                    <h1>SqüalTshirts</h1>
                                </a>
                            </div>
                        </li>
                        <li class="header-list-item">
                            <div class="search-wrapper">
                                <form action="" method="post">
                                    <input id="headerSearch" type="text" name="search" >
                                    <span class="input-search-btn">
                                        <i class="fa fa-search" aria-hidden="true"></i>
                                    </span>
                                </form>
                            </div>
                        </li>
                         <li class="header-list-item">
                            <div class="login-wrapper">
                                
                                <?php  
                                    if (isset($_SESSION['usu_user'])) {
                                        $usuario_registrado = $_SESSION['usu_user'];

                                        echo "
                                            <span class='login-name'>$usuario_registrado</span>
                                            <a href='../controller/disconnect.php' class='disconnect'>Desconectar</span>
                                        ";
                                    }else{
                                        $usuario_registrado = "";
                                        echo "<a id='logeate' href='#'' class='logeate'>Logéate</a>";
                                    }

                                 ?>
                                
                            </div>
                        </li>
                        <li class="header-list-item">
                            <div class="shopping-cart-wrapper">
                                <a href="basket.php" id="cartSubmit" class="cart">
                                    <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                                    <span class="basket-number">0</span>
                                </a>
                            </div>
                        </li>
                    </ul>
            	</div>
                <nav id="navBarMenu" class="nav-bar-menu">
                    <ul id="menu-categories" class="menu-categories">
                        
                    </ul>
                </nav>
            </div>
        </header> <!-- end header -->