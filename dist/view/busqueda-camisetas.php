<?php 
    session_start();
    include 'header.php';
    //include 'slider.html';
    $palabra_clave = $_POST['search'];
 ?>



<?php echo $palabra_clave; ?>





<?php 
    include 'footer.php';
?>