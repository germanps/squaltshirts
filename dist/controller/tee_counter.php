<?php 
	require "conexion.php";

	if (isset($_SESSION['enter_ok'])) {	
		$query = "select * from camiseta;";
		$count = $conexion->query($query);
		$items_rows = $count->num_rows;
		if ($items_rows == 0) {
			echo "<p>Error, no se encuentran items</p>";
		}else{
			echo $items_rows;
		}
	}else{
		echo "Has llegado aqui de manera extraña...";
		header('Refresh: 3; url="../index.php"');
	}
 ?>