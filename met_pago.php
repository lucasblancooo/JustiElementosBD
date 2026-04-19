<link rel="stylesheet" href="estilo.css">
<br><br><br><br>

<?php include("menu.php")
?>
<?php include("bd.php")
?>

<form method="POST">
    <label class="titulo"> Nombre del método de pago: </label> <input type="text" name="nom_metodo" required>
    <br><br>
    <label class="titulo"> Descuento: </label> <input type="number" step="1" name="descuento" required>
    <br><br>
    <button type="submit"> Enviar </button>
</form>
<?php
    if ($_POST){
        $nom_metodo=$_POST['nom_metodo'];
        $descuento=$_POST['descuento'];
        $sql="INSERT INTO metodo_pago(nom_metodo, descuento) VALUES ('$nom_metodo', '$descuento')";
        $conexion->query($sql);
        echo "Se mando correctamente";
    }
?>