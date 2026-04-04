<link rel="stylesheet" href="estilo.css">
<br><br><br><br>

<?php include("bd.php")
?>
<?php include("menu.php")
?>


<form method="POST">
    <label class="titulo"> Nombre del producto: </label> <input type="text" name="nom_prod" required>
    <br><br>
    <label class="titulo"> Precio: </label> <input type="number" step=0.1 min=0 name="precio" required>
    <br><br>
    <label class="titulo"> ¿Está disponible?: </label> <input type="checkbox" name="disponibilidad" required>
    <br><br>
    <button type="submit"> Enviar </button>
</form>

<?php 
    if ($_POST){
        $nom_prod=$_POST['nom_prod'];
        $precio=$_POST['precio'];
        $disponibilidad=$_POST['disponibilidad'];
        $sql="INSERT INTO producto(nom_prod, precio, disponibilidad) VALUES ('$nom_prod', '$precio','$disponibilidad')";
        $conexion->query($sql);
        echo "Se mando correctamente";
    }
?>