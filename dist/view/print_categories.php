<?php 
    require("../controller/conexion.php");
	$cat_query = "select * from categoria order by id_categoria";
    $cat_resul = $conexion->query($cat_query);
    $cat_rows = $cat_resul->num_rows;
    if ($cat_rows == 0) {
        echo "No se encuentras categorias en la base de datos";
    }else{
         echo "<li class='fa fa-arrow-right all-categories'><a href='catalogo.php'>Todas</a></li>";
        while ($fila_cat = $cat_resul->fetch_array()) {
            extract($fila_cat);
            echo "<li class='fa fa-arrow-right' data-name='$id_categoria'>$nombre</li>";
        }
    }

?>