<?php 
	session_start();
	require('../controller/conexion.php');
    if (!isset($_SESSION['admin_user'])) {
        //echo "No existe el usuario...";
        header('Location:../index.php');
    }
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
    	<div class="admin-flex-container">
			<aside class="admin-aside">
				<ul class="admin-list">
					<li class="admin-options dashboard">
						<div class="admin-options-content">
							<i class="fa fa-dashboard"></i>
							<p>Dashboard</p>
						</div>
					</li>
					<li class="admin-options users">
						<div class="admin-options-content">
							<i class="fa fa-users"></i>
							<p>Usuarios</p>
						</div>
					</li>
					<li class="admin-options products">
						<div class="admin-options-content">
							<i class="fa fa-product-hunt"></i>
							<p>Productos</p>
						</div>
					</li>
					<li class="admin-options categories">
						<div class="admin-options-content">
							<i class="fa fa-quora"></i>
							<p>Categorias</p>
						</div>
					</li>
					<li class="admin-options sales">
						<div class="admin-options-content">
							<i class="fa fa-eur"></i>
							<p>Ventas</p>
						</div>
					</li>
				</ul>
			</aside>
			<div class="admin-main">
				<header class="admin-header">
					<ul class="admin-header-list">
						<li>
							<h2 class="admin-title">SQUALTSHIRT</h2>
						</li>
						<li>
							<div class="admin-info-header">
								<i class="fa fa-user"></i>
								<span class="admin-name"><?php echo $_SESSION['admin_user'] ?></span>
								<span id="signOut" class="sign-out">Desconectar</span>
							</div>
						</li>
					</ul>
				</header>
				<section id="adminMaincontent" class="admin-main-content">
					<div class="dashboard">
						dashboard
					</div>
					<div class="users">
						<header class="users-header">
							<h2>Usuarios</h2>
							<a id="addUser" href='#' class='open-modal btn btn-danger btn-sm'>Agregar usuario</a>
						</header>
						<table class="results">
							<thead>
			            		<tr>
			            			<th class='text-muted'>Item nº</th>
			            			<th>ID usuario</th>
			            			<th>Nombre</th>
			            			<th>Apellido</th>
			            			<th>Email</th>
			            			<th>Password</th>
			            			<th>Tipo usuario</th>
			            			<th class="text-right">Acciones</th>
			            		</tr>
			            	</thead>
			            	<tbody>
			            		<?php 
			            			$user_query = "select * from usuario order by id_usuario";
			            			$usu_resul = $conexion->query($user_query);
									$usu_rows = $usu_resul->num_rows;
									$contador_usuarios = 1;
									if ($usu_rows == 0) {
										echo "No se encuentras usuarios en la base de datos";
									}else{
										while ($fila = $usu_resul->fetch_array()) {
											extract($fila);
											echo "<tr>
													<td class='text-muted'>$contador_usuarios</td>
													<td>$id_usuario</td>
													<td>$nombre</td>
													<td>$apellido</td>
													<td>$email</td>
													<td>$password</td>
													<td>$tipo_usuario</td>
													<td>
														<a href='edit_usu.php?item=$id_usuario' class='btn btn-danger btn-sm'>Edit</a>
														<a href='drop_usu.php?item=$id_usuario' class='btn btn-danger btn-sm'>Delete</a>
	                                                </td>
												 </tr>";
												 $contador_usuarios++;
										}
									}
			            		 ?>
			            	</tbody>
						</table>
					</div>
					<div class="products">
						<header class="users-header">
							<h2>Productos</h2>
							<a id="addProduct" href='#' class='open-modal btn btn-danger btn-sm'>Agregar producto</a>
						</header>
						<table class="results">
	                        <thead>
	                            <tr>
	                                <th class='text-muted'>Item nº</th>
	                                <th>ID producto</th>
	                                <th>Nombre</th>
	                                <th>Descripción</th>
	                                <th>Cantidad</th>
	                                <th>Precio</th>
	                                <th>Color</th>
	                                <th>Talla</th>		                                
	                                <th>Imagen</th>
	                                <th>Categoria</th>
	                                <th class="text-right">Acciones</th>
	                            </tr>
	                        </thead>
	                        <tbody>
                            <?php 
                                //$product_query = "select * from productos";
                                $product_query = "select p.id_camiseta, p.nombre_camiseta, p.descripcion, p.cantidad, p.imagen, p.precio, p.color, p.talla, c.nombre FROM camiseta p, categoria c where c.id_categoria = p.categoria_id_categoria order by id_camiseta;";
                                $product_resul = $conexion->query($product_query);
                                $product_rows = $product_resul->num_rows;
                                $contador_camiseta = 1;
                                if ($product_rows == 0) {
                                    echo "No se encuentras productos en la base de datos";
                                }else{
                                    while ($fila_product = $product_resul->fetch_array()) {
                                        extract($fila_product);

                                        echo "<tr>
                                                <td class='text-muted'>$contador_camiseta</td>
                                                <td>$id_camiseta</td>
                                                <td>$nombre_camiseta</td>
                                                <td>$descripcion</td>
                                                <td>$cantidad</td>
                                                <td>$precio</td>
                                                <td>$color</td>
                                                <td>$talla</td>
                                                <td>$imagen</td>
                                                <td>$nombre</td>
                                                <td> 
                                                    <a href='edit_product.php?item=$id_camiseta' class='btn btn-danger btn-sm'>Edit</a>
                                                    <a href='drop_product.php?item=$id_camiseta' class='btn btn-danger btn-sm'>Delete</a>
                                                </td>
                                             </tr>";
                                             $contador_camiseta++;
	                                    }
	                                }
	                             ?>
	                        </tbody>
						</table>
					</div>
					<div class="categories">
						<header class="users-header">
							<h2>Categorias</h2>
							<a id="addCategory" href='#' class='open-modal btn btn-danger btn-sm'>Agregar categoria</a>
						</header>
						<table class="results">
	                        <thead>
	                            <tr>
	                                <th class='text-muted'>Item nº</th>
	                                <th>ID categoria</th>
	                                <th>Nombre</th>
	                                <th class="text-right">Acciones</th>
	                            </tr>
	                        </thead>
	                        <tbody>
	                            <?php 
	                                $cat_query = "select * from categoria order by id_categoria";
	                                $cat_resul = $conexion->query($cat_query);
	                                $cat_rows = $cat_resul->num_rows;
	                                $contador_cat = 1;
	                                if ($cat_rows == 0) {
	                                    echo "No se encuentras categorias en la base de datos";
	                                }else{
	                                    while ($fila_cat = $cat_resul->fetch_array()) {
	                                        extract($fila_cat);
	                                        echo "<tr>
	                                                <td class='text-muted'>$contador_cat</td>
	                                                <td>$id_categoria</td>
	                                                <td>$nombre</td>
	                                                <td>
	                                                	<a href='edit_cat.php?item=$id_categoria' class='btn btn-danger btn-sm'>Edit</a>
	                                                	<a href='drop_cat.php?item=$id_categoria' class='btn btn-danger btn-sm'>Delete</a>
	                                                </td>
	                                             </tr>";
	                                             $contador_cat++;
	                                    }
	                                }
	                             ?>
	                        </tbody>
	                        
	                    </table>
					</div>
					<div class="sales">
						<h2>Ventas</h2>
						
					</div>

				</section>
			</div>
		</div>

		<!--================================================ MODALS ================================================-->
		<!--=========== Add User ===========-->
		<div id="userModal" class="user-modal modal">
			<div class="modal-content">
				<div class="modal-header">
					<h2>Añadir usuario</h2>
					<i class="fa fa-times" id="cerrar-modal"></i>
				</div>
				<form method='post' action='../controller/new_user.php' role="form" >
	                <div class="modal-body">
	                    <div class="form-group">
	                        <label for="nameUserId">Nombre</label>
	                        <input name="nameUser" type="text" id="nameUserId" placeholder="Nombre" class="form-control" required/>
	                    </div>

	                    <div class="form-group">
	                        <label for="passwordUserId">Password</label>
	                        <input name="passwordUser" type="text" id="passwordUserId" placeholder="Password" class="form-control" required/>
	                    </div>

	                    <div class="form-group">
	                        <label for="tipoUserId">Tipo usuario => (0:admin # 1:normal)</label>
	                        <input name="tipoUser" type="text" id="tipoUserId" placeholder="Tipo usuario" class="form-control" required/>
	                    </div>

	                </div>
	                <div class="modal-footer">
	                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
	                    <button type="submit" class="btn btn-primary">Añadir usuario</button>
	                </div>
	            </form>
			</div>
		</div>

		<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
        <script>window.jQuery || document.write('<script src="../src/js/vendor/jquery-1.12.0.min.js"><\/script>')</script>
        <script src="../src/js/plugins.js"></script>
        <script src="../src/js/main.js"></script>
	</body>
</html>
