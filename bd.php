<link rel="stylesheet" href="estilo.css">

<?php
$ubicacion = "localhost";
$usuario = "root";
$clave = "123456";
$base="justi_elementos_v2";
$conexion=new mysqli($ubicacion, $usuario, $clave, $base);
if($conexion->connect_error){
    die("Error".$conexion->connect_error);
}

?>
