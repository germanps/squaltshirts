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
					<li class="admin-options no-hover">
						<div class="admin-options-content">
							<i class="fa fa-opencart"></i>
						</div>
					</li>
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
							<i class="fa fa-shirtsinbulk"></i>
							<p>Camisetas</p>
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
								<a id="signOut" class="sign-out" href="../controller/disconnect.php">Desconectar</a>
							</div>
						</li>
					</ul>
				</header>
				<section id="adminMaincontent" class="admin-main-content">
					<div class="dashboard">
						<div class="users-header">
							<h2>Dashboard</h2>
						</div>
						<div class="dashboard-content">
							<div class="left-info">
								<div class="lifetime-sales">
									<h4>Total Ventas</h4>
									<?php include "dashboard_sales.php"; ?>
								</div>
								<div class="best-order">
									<h4>Mejor Venta</h4>
									<ul>
										<?php include "dashboard_best_sell.php" ?>
									</ul>
								</div>
							</div>
							<div class="right-info">
								<div class="tab-bg-wrapper">
									<h4>Resumen</h4>
									<div id="tabMenu" class="tab-menu">
										<div class="tab-title active" data-tab="1">
											<h4>Usuarios</h4>
										</div>
										<div class="tab-title" data-tab="2">
											<h4>Camisetas</h4>
										</div>
										<div class="tab-title" data-tab="3">
											<h4>Categorias</h4>
										</div>
										<div class="tab-title" data-tab="4">
											<h4>Ventas</h4>
										</div>
									</div>
									<div id="tabContent" class="tab-content-wrapper">
										<div class="tab-content" data-tab="1">
											<table class="results">
						                        <thead>
						                            <tr>
								            			<th class='text-muted'>Item nº</th>
								            			<th>ID usuario</th>
								            			<th>Nombre</th>
								            			<th>Apellido</th>
								            			<th>Email</th>
								            		</tr>
						                        </thead>
						                        <tbody>
													<?php include "../controller/tab_user.php" ?>
												</tbody>
											</table>
										</div>
										<div class="tab-content" data-tab="2">
											<table class="results">
						                        <thead>
						                            <tr>
						                                <th class='text-muted'>Item nº</th>
						                                <th>ID camiseta</th>
						                                <th>Nombre</th>
						                                <th>Descripción</th>
						                                <th>Cantidad</th>                          
						                            </tr>
						                        </thead>
						                        <tbody>
						                        	<?php include "../controller/tab_tee.php" ?>
						                        </tbody>
						                    </table>
										</div>
										<div class="tab-content" data-tab="3">
											<table class="results">
						                        <thead>
						                            <tr>
						                                <th class='text-muted'>Item nº</th>
						                                <th>ID categoria</th>
						                                <th>Nombre categoria</th>
						                            </tr>
						                        </thead>
						                        <tbody>
						                            <?php include "../controller/tab_cat.php" ?>
						                        </tbody>
						                        
						                    </table>
										</div>
										<div class="tab-content" data-tab="4">
											<h4>ventas</h4>
											<p>Aqui saldrán las ventas</p>
										</div>
									</div>
								</div>
							</div>
						</div>

					</div>
					<div class="users">
						<header class="users-header">
							<h2>Usuarios</h2>
							<div class="header-actions">
								<input id="userSearch" name="search" class="search" type="text" placeholder="Buscar">
								<a id="addUser" href='#' class='open-modal btn btn-danger btn-sm'>Añadir usuario</a>
							</div>
						</header>
						<table id="resultAjaxUsu" class="results resultados-ajax">

						</table>
						<table class="results">
							<thead>
			            		<tr>
			            			<th class='text-muted'>Item nº</th>
			            			<th>ID usuario</th>
			            			<th>Usuario</th>
			            			<th>Dirección</th>
			            			<th>Email</th>
			            			<th>Password</th>
			            			<th>Tipo usuario</th>
			            			<th class="text-right">Acciones</th>
			            		</tr>
			            	</thead>
			            	<tbody>
			            		<?php include "admin_users_view.php" ?>
			            	</tbody>
						</table>
					</div>
					<div class="products">
						<header class="users-header">
							<h2>Camisetas</h2>
							<div class="header-actions">
								<input id="teeSearch" class="search" type="text" placeholder="Buscar">
								<a id="addTee" href='#' class='open-modal btn btn-danger btn-sm'>Añadir camiseta</a>
							</div>
						</header>
						<table id="resultAjaxTee" class="results resultados-ajax">

						</table>
						<table class="results">
	                        <thead>
	                            <tr>
	                                <th class='text-muted'>Item nº</th>
	                                <th>ID camiseta</th>
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
                            	<?php include "admin_tee_view.php" ?>
	                        </tbody>
						</table>
					</div>
					<div class="categories">
						<header class="users-header">
							<h2>Categorias</h2>
							<div class="header-actions">
								<input id="catSearch" class="search" type="text" placeholder="Buscar">
								<a id="addCat" href='#' class='open-modal btn btn-danger btn-sm'>Añadir categoria</a>
							</div>
						</header>
						<table id="resultAjaxCat" class="results resultados-ajax">

						</table>
						<table class="results">
	                        <thead>
	                            <tr>
	                                <th class='text-muted'>Item nº</th>
	                                <th>ID categoria</th>
	                                <th>Nombre categoria</th>
	                                <th class="text-right">Acciones</th>
	                            </tr>
	                        </thead>
	                        <tbody>
	                            <?php include "admin_cat_view.php" ?>
	                        </tbody>
	                        
	                    </table>
					</div>
					<div class="sales">
						<header class="users-header">
							<h2>Ventas</h2>
							<div class="header-actions">
								<input id="salesSearch" class="search" type="text" placeholder="Buscar">
								<a id="addSales" href='#' class='open-modal btn btn-danger btn-sm'>Añadir Venta</a>
							</div>
						</header>
						<!-- <table id="resultAjaxSales" class="results resultados-ajax">
						
						</table> -->
						<table class="results">
	                        <thead>
	                            <tr>
	                                <th class='text-muted'>Item nº</th>
	                                <th>ID venta</th>
	                                <th>Fecha</th>
	                                <th>ID Usuario</th>
	                                <th>Usuario</th>
	                                <th>Dirección</th>
	                                <th>Descuento</th>
	                                <th>Total a pagar</th>
	                                <th class="text-right">Acción</th>
	                            </tr>
	                        </thead>
	                        <tbody>
	                            <?php include "admin_sales_view.php" ?>
	                        </tbody>
	                    </table>
	                    <div id="resultAjaxSales" class="results resultados-ajax ajax-detalls">
							<div class="results-ajax">
								
							</div>
							<button id='closeDetall' type='button' class='btn btn-cancel' data-dismiss='modal'>Cerrar</button>
						</div>
					</div>

				</section>
			</div>
		</div>

		<!--=============== MODALS ===================-->
		<!--============= ADDS =============-->
		<!--=========== Add User ===========-->
		<div id="userModal" class="user-modal modal">
			<div class="modal-content">
				<div class="modal-header">
					<h2>Añadir usuario</h2>
				</div>
				<form class="form-modal" method='post' action='../controller/new_user.php' role="form" >
	                <div class="modal-body">
	                    <div class="form-group">
	                        <label for="nameUserId">Nombre</label>
	                        <input name="nameUser" type="text" id="nameUserId" placeholder="" class="form-control" required/>
	                    </div>
	                    <div class="form-group">
	                        <label for="apellidoUserId">Apellido</label>
	                        <input name="apellidoUser" type="text" id="apellidoUserId" placeholder="" class="form-control" required/>
	                    </div>
	                    <div class="form-group">
	                        <label for="dniUserId">Dni</label>
	                        <input name="dniUser" type="text" id="dniUserId" placeholder="" class="form-control" required/>
	                    </div>

	                    <div class="form-group">
	                        <label for="dirUserId">Dirección</label>
	                        <input name="dirUser" type="text" id="dirUserId" placeholder="" class="form-control" required/>
	                    </div>

	                    <div class="form-group">
	                        <label for="passwordUserId">Password</label>
	                        <input name="passwordUser" type="password" id="passwordUserId" placeholder="" class="form-control" required/>
	                    </div>

	                    <div class="form-group">
	                        <label for="emailUserId">Email</label>
	                        <input name="emailUser" type="text" id="emailUserId" placeholder="" class="form-control" required/>
	                    </div>

	                    <div class="form-group">
	                        <label for="tipoUserId">Tipo usuario</label>
	                        <input name="tipoUser" type="text" id="tipoUserId" placeholder="1 Admin 0 Usuario" class="form-control" required/>
	                    </div>

	                </div>
	                <div class="modal-footer">
	                    <button type="button" class="btn btn-cancel" data-dismiss="modal">Cancelar</button>
	                    <button type="submit" class="btn btn-success">Añadir usuario</button>
	                </div>
	            </form>
			</div>
		</div>


		<!--=========== Add Tee ===========-->
		<div id="teeModal" class="tee-modal modal">
			<div class="modal-content">
				<div class="modal-header">
					<h2>Añadir camiseta</h2>
				</div>
				<form class="form-modal" method='post' action='../controller/new_tee.php' role="form" enctype="multipart/form-data">
	                <div class="modal-body">
	                    <div class="form-group">
	                        <label for="nameTeeId">Nombre camiseta</label>
	                        <input name="nameTee" type="text" id="nameTeeId" placeholder="" class="form-control" required/>
	                    </div>
	                    <div class="form-group">
	                        <label for="descriptionId">Descripción</label>
	                        <textarea name="description" type="text" id="descriptionId" placeholder="" class="form-control" required/></textarea>
	                    </div>

	                    <div class="form-group">
	                        <label for="amountId">Cantidad</label>
	                        <input name="amount" type="text" id="amountId" placeholder="" class="form-control" required/>
	                    </div>

	                    <div class="form-group">
	                        <label for="imageId">Imagen</label>
	                        <input name="image" type="file" id="imageId" placeholder="Inferior a 1Mb" class="form-control" required/>
	                    </div>

	                    <div class="form-group">
	                        <label for="prizeId">Precio</label>
	                        <input name="prize" type="text" id="prizeId" placeholder="" class="form-control" required/>
	                    </div>

	                    <div class="form-group">
	                        <label for="colorId">Color</label>
	                        <input name="color" type="text" id="colorId" placeholder="" class="form-control" required/>
	                    </div>

	                    <div class="form-group">
	                        <label for="sizeId">Talla</label>
	                        <input name="size" type="text" id="sizeId" placeholder="" class="form-control" required/>
	                    </div>

	                    <div class="form-group">
	                        <label for="catId">Categoria</label>
	                        <select name="cat" id="catId" class="form-control">
	                        	<option selected>Categorias</option>
	                        	<?php 

	                        		$cat_query = "select nombre from categoria";
	                        		$cat_result = $conexion->query($cat_query);
	                        		$cat_rows = $cat_result->num_rows;
	                        		if ($cat_rows == 0) {
	                        			echo "No se encuentran categorias";
	                        		}else{
	                        			while ($fila_cat = $cat_result->fetch_array()) {
					            			extract($fila_cat);
					            			echo "<option value='$nombre'>$nombre</option>";
					            		}
	                        		}

	                        	?>
	                        </select>
	                    </div>

	                </div>
	                <div class="modal-footer">
	                    <button type="button" class="btn btn-cancel" data-dismiss="modal">Cancelar</button>
	                    <button type="submit" class="btn btn-success">Añadir Camiseta</button>
	                </div>
	            </form>
			</div>
		</div>

		<!--=========== Add Category ===========-->
		<div id="catModal" class="cat-modal modal">
			<div class="modal-content">
				<div class="modal-header">
					<h2>Añadir categoria</h2>
				</div>
				<form class="form-modal" method='post' action='../controller/new_cat.php' role="form" >
	                <div class="modal-body">
	                    <div class="form-group">
	                        <label for="nameCatId">Nombre categoria</label>
	                        <input name="nameCat" type="text" id="nameCatId" placeholder="" class="form-control" required/>
	                    </div>
	                </div>
	                <div class="modal-footer">
	                    <button type="button" class="btn btn-cancel" data-dismiss="modal">Cancelar</button>
	                    <button type="submit" class="btn btn-success">Añadir categoria</button>
	                </div>
	            </form>
			</div>
		</div>

		<!--============= EDITS =============-->
		<!--=========== Edit User ===========-->

		<div class="modal edit-modal" id="editUserModal">
		    <div class="modal-dialog" role="document">
		        <div class="modal-content">
		        	<h3>Editar Usuario</h3>
		            <form class="form-modal" method='post' action='../controller/edit_user.php' role="form" >
		                <div class="modal-body">
		                	<div class="form-group">
		                        <label for="set_userId">ID</label>
		                        <input name="set_userId" type="text" id="set_userId" placeholder="" class="form-control" required readonly />
		                    </div>
		                    <div class="form-group">
		                        <label for="set_userName">Nombre</label>
		                        <input name="set_userName" type="text" id="set_userName" placeholder="" class="form-control" required/>
		                    </div>
		                    <div class="form-group">
		                        <label for="set_userApellido">Apellido</label>
		                        <input name="set_userApellido" type="text" id="set_userApellido" placeholder="" class="form-control" required/>
		                    </div>
		                    <div class="form-group">
		                        <label for="set_userDni">Dni</label>
		                        <input name="set_userDni" type="text" id="set_userDni" placeholder="" class="form-control" required/>
		                    </div>
		                    <div class="form-group">
		                        <label for="set_userDir">Dirección</label>
		                        <input name="set_userDir" type="text" id="set_userDir" placeholder="" class="form-control" required/>
		                    </div>

		                    <div class="form-group">
		                        <label for="set_userPassword">Password</label>
		                        <input name="set_userPassword" type="text" id="set_userPassword" placeholder="" class="form-control" required/>
		                    </div>

		                    <div class="form-group">
		                        <label for="set_userEmail">Email</label>
		                        <input name="set_userEmail" type="text" id="set_userEmail" placeholder="" class="form-control" required/>
		                    </div>

		                    <div class="form-group">
		                        <label for="set_userTipo">Tipo usuario</label>
		                        <input name="set_userTipo" type="text" id="set_userTipo" placeholder="1 Admin 0 Usuario" class="form-control" required/>
		                    </div>

		                </div>
		                <div class="modal-footer">
		                    <button type="button" class="btn btn-cancel" data-dismiss="modal">Cancelar</button>
		                    <button type="submit" class="btn btn-success">Editar usuario</button>
		                </div>
		            </form>
		        </div>
		    </div>
		</div>

		<!--=========== Edit Tee ===========-->

		<div class="modal edit-modal" id="editTeeModal">
		    <div class="modal-dialog" role="document">
		        <div class="modal-content">
		            <form class="form-modal" method='post' action='../controller/edit_tee.php' role="form" enctype="multipart/form-data">
		                <div class="modal-body">
		                	<div class="form-group">
		                        <label for="set_teeId">ID</label>
		                        <input name="set_teeId" type="text" id="set_teeId" placeholder="" class="form-control" required readonly />
		                    </div>
		                    <div class="form-group">
		                        <label for="set_teeName">Nombre</label>
		                        <input name="set_teeName" type="text" id="set_teeName" placeholder="" class="form-control" required/>
		                    </div>
		                    <div class="form-group">
		                        <label for="set_teeDescripcion">Descripción</label>
		                        <input name="set_teeDescripcion" type="text" id="set_teeDescripcion" placeholder="" class="form-control" required/>
		                    </div>

		                    <div class="form-group">
		                        <label for="set_teeCantidad">Cantidad</label>
		                        <input name="set_teeCantidad" type="text" id="set_teeCantidad" placeholder="" class="form-control" required/>
		                    </div>

		                    <div class="form-group">
		                        <label for="set_teePrecio">Precio</label>
		                        <input name="set_teePrecio" type="text" id="set_teePrecio" placeholder="" class="form-control" required/>
		                    </div>

		                    <div class="form-group">
		                        <label for="set_teeColor">Color</label>
		                        <input name="set_teeColor" type="text" id="set_teeColor" placeholder="" class="form-control" required/>
		                    </div>
		                    <div class="form-group">
		                        <label for="set_teeTalla">Talla</label>
		                        <input name="set_teeTalla" type="text" id="set_teeTalla" placeholder="" class="form-control" required/>
		                    </div>
		                    <div class="form-group">
		                        <label for="set_teeImagen">Imagen</label>
		                        <input name="set_teeImagen" type="file" id="set_teeImagen" placeholder="" class="form-control"/>
		                    </div>
		                    <div class="form-group">
		                        <label for="set_teeCategoria">Categoria</label>
		                        <input name="set_teeCategoria" type="text" id="set_teeCategoria" placeholder="" class="form-control" required readonly />
		                    </div>

		                </div>
		                <div class="modal-footer">
		                    <button type="button" class="btn btn-cancel" data-dismiss="modal">Cancelar</button>
		                    <button type="submit" class="btn btn-success">Editar usuario</button>
		                </div>
		            </form>
		        </div>
		    </div>
		</div>


		<!--=========== Edit Category ===========-->

		<div class="modal edit-modal" id="editCatModal">
		    <div class="modal-dialog" role="document">
		        <div class="modal-content">
		            <form class="form-modal" method='post' action='../controller/edit_cat.php' role="form" >
		                <div class="modal-body">
		                	<div class="form-group">
		                        <label for="set_catId">ID</label>
		                        <input name="set_catId" type="text" id="set_catId" placeholder="" class="form-control" required readonly />
		                    </div>
		                    <div class="form-group">
		                        <label for="set_catName">Nombre</label>
		                        <input name="set_catName" type="text" id="set_catName" placeholder="" class="form-control" required/>
		                    </div>
		                </div>
		                <div class="modal-footer">
		                    <button type="button" class="btn btn-cancel" data-dismiss="modal">Cancelar</button>
		                    <button type="submit" class="btn btn-success">Editar categoria</button>
		                </div>
		            </form>
		        </div>
		    </div>
		</div>

		<!--============= DROPS =============-->
		<!-- Delete user -->
		<div class="modal drop-modal" id="dropUserModal">
		    <div class="modal-dialog" role="document">
		        <div class="modal-content">					
					<div id="deleteUser">
					<p>Seguro que quieres borrar al usuario con ID: <span id="deleteUserId"></span></p>
					<button type="button" class="btn btn-cancel" data-dismiss="modal">Cancelar</button>
					<a id="actionDeleteUser">Borrar</a>
					</div> 
		        </div>
		    </div>
		</div>

		<!-- Delete tee -->
		<div class="modal drop-modal" id="dropTeeModal">
		    <div class="modal-dialog" role="document">
		        <div class="modal-content">					
					<div id="deleteTee">
					<p>Seguro que quieres borrar la camiseta con ID: <span id="deleteTeeId"></span></p>
					<div class="btn-flex">
						<button type="button" class="btn btn-cancel" data-dismiss="modal">Cancelar</button>
						<a id="actionDeleteTee">Borrar</a>
					</div>
					</div> 
		        </div>
		    </div>
		</div>

		<!-- Delete category -->
		<div class="modal drop-modal" id="dropCatModal">
		    <div class="modal-dialog" role="document">
		        <div class="modal-content">					
					<div id="deleteCat">
					<p>Seguro que quieres borrar la categoria con ID: <span id="deleteCatId"></span></p>
					<button type="button" class="btn btn-cancel" data-dismiss="modal">Cancelar</button>
					<a id="actionDeleteCat">Borrar</a>
					</div> 
		        </div>
		    </div>
		</div>


		<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
        <script>window.jQuery || document.write('<script src="../src/js/vendor/jquery-1.12.0.min.js"><\/script>')</script>
        <script src="../src/js/plugins.js"></script>
        <script src="../src/js/main.js"></script>
	</body>
</html>
