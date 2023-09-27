
<?php
    $conexion = mysqli_connect('localhost','root','','itzadata');

//check conexion

if($conexion -> connect_error) {
    die("Error to connected: " . $conexion -> connect_error);
}



