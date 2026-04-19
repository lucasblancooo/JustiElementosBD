<?php include("menu.php")
?>
<?php include("bd.php")
?>

<h2 style= "margin: auto;
    text-align: center;
    color: rgb(175, 154, 77);
    font-size: 300%;"> Ingreso de productos </h2>

<br><br>
<form method="POST">
    <label class="titulo"> Nombre del producto: </label> <input type="text" name="nom_prod" required>
    <br><br>
    <label class="titulo"> Precio: </label> <input type="number" step=0.1 min=0 name="precio" required>
    <br><br>
    <button type="submit" name="enviar"> Enviar </button>
</form>

<?php 
    if (isset($_POST['enviar'])){
        $nom_prod=$_POST['nom_prod'];
        $precio=$_POST['precio'];
        $sql="INSERT INTO producto(nom_prod, precio) VALUES ('$nom_prod', '$precio')";
        $conexion->query($sql);
        echo "Se mando correctamente";
    }
?>

<hr>
<br>
<h2 style= "margin: auto;
    text-align: center;
    color: rgb(175, 154, 77);
    font-size: 300%;" >Buscador de Productos</h2>
<br><br>
<form method="GET">
    <label class = "titulo">Nombre del producto: </label> <input type="text" name="buscar">
    <button type="submit">Buscar</button>
</form>

<?php
if (isset($_GET['buscar'])) {
    $buscar = $_GET['buscar'];
    $sql = "SELECT * FROM Producto WHERE nom_prod LIKE '%$buscar%'";
} else {
    $sql = "SELECT * FROM Producto";
}

$resultado = $conexion->query($sql);

?>

<hr>

<?php

while ($fila = $resultado->fetch_assoc()) {
echo "
<table border=2>
    <tr>
            <td>{$fila['ID_prod']}</td>
            <td>{$fila['nom_prod']}</td>
            <td>{$fila['precio']}</td>
    <td>
        <a href='prod.php?editar={$fila['ID_prod']}'> Editar</a>
        <br>
        <a href='prod.php?eliminar={$fila['ID_prod']}'> Eliminar</a>
    </td>
    </tr>
    </table>
    ";
}

?>

<?php
// ELIMINAR
if (isset($_GET['eliminar'])) {
    $id = $_GET['eliminar'];
    $conexion->query("DELETE FROM Producto WHERE ID_prod=$id");
    header("Location: prod.php");
}
?>

<?php

// FORMULARIO DE EDICIÓN
if (isset($_GET['editar'])) {
    $id = $_GET['editar'];
    $resultado = $conexion->query("SELECT * FROM Producto WHERE ID_prod=$id");
    $producto = $resultado->fetch_assoc();

?>
<br><br>
<h2 style= "margin: auto;
    text-align: center;
    color: rgb(175, 154, 77);
    font-size: 300%;">Editar Producto</h2>
<br>
<form method="POST">
    <input type="hidden" name="ID_prod" value="<?php echo $producto['ID_prod']; ?>">
    <label class="titulo"> Nombre: </label><input type="text" name="nom_prod" value="<?php echo $producto['nom_prod']; ?>" required>
    <label class="titulo"> Precio: </label><input type="number" step="0.01" name="precio" value="<?php echo $producto['precio']; ?>" required>
    <button type="submit" name="actualizar">Actualizar</button>
</form>

<?php


if (isset($_POST['actualizar'])) {
    $id = $_POST['ID_prod'];
    $nombre = $_POST['nom_prod'];
    $precio = $_POST['precio'];

    $conexion->query("UPDATE Producto
                      SET nom_prod='$nombre', precio='$precio'
                      WHERE ID_prod=$id");
    header("Location: prod.php");
}
}
?>