<?php

require "conexion.php";

$idOrtodonciaSeleccionado = $_GET['idOrtodonciaSeleccionado'];
$idOrtodonciaSeleccionado = (int)$idOrtodonciaSeleccionado;

$resultadoBD = mysqli_query($con, "SELECT * FROM ortodoncias WHERE id = $idOrtodonciaSeleccionado");


while($consulta = mysqli_fetch_array($resultadoBD))
{
echo
"
<table width = \"100$\" border=\"1\">
<tr>
    <td><b><center>Documento</center></b></td>
    <td><b><center>Nombre</center></b></td>
    <td><b><center>Direccion</center></b></td>
    <td><b><center>Telefono</center></b></td>
</tr>
<tr>
    <td>".$consulta['id']."</td>
    <td>".$consulta['nombre']."</td>
    <td>".$consulta['descripcion']."</td>
    <td>".$consulta['precio_recomendado']."</td>
</tr>
</table>
"
}

mysqli_close($con);
?>
