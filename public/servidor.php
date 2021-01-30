<?php

require "conexion.php";

$idOrtodonciaSeleccionado = $_GET['idOrtodonciaSeleccionado'];
$idOrtodonciaSeleccionado = (int)$idOrtodonciaSeleccionado;

//$resultadoBD = mysqli_query($con, "SELECT precio_recomendado FROM ortodoncias WHERE id = $idOrtodonciaSeleccionado");

$resultadoBD = mysqli_query($con, "SELECT * FROM ortodoncias WHERE id = $idOrtodonciaSeleccionado");
echo mysqli_fetch_assoc($resultadoBD)['precio_recomendado'];

mysqli_close($con);
?>
