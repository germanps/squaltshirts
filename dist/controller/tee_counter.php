<?php 
	require "conexion.php";
	$query = "select * from camiseta;";
	$count = $conexion->query($query);
	$items_rows = $count->num_rows;
	if ($items_rows == 0) {
		echo "<p>Error, no se encuentran items</p>";
	}else{
		echo $items_rows;
	}

 ?>