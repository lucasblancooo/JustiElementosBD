<link rel="stylesheet" href="estilo.css">

<?php
$ubicacion = "localhost";
$usuario = "root";
$clave = "";
$base="justi_elementos";
$conexion=new mysqli($ubicacion, $usuario, $clave, $base);
if($conexion->connect_error){
    die("Error".$conexion->connect_error);
}

?>
