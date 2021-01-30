<?php

$mysql_host = 'localhost';
$mysql_usuario = 'root';
$mysql_clave = '';
$mysql_BD = 'peluq';

$con = mysqli_connect($mysql_host, $mysql_usuario, $mysql_clave, $mysql_BD);

if(mysqli_connect_errno()){
    echo "ERROR AL CONECTAR LA BD: " . mysqli_connect_error();
}


/*else {
    echo "CONECTADO CORRECTAMENTE";
}*/


?>