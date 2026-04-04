<link rel="stylesheet" href="estilo.css">
<br><br><br><br>

<?php include("bd.php")
?>
<?php include("menu.php")
?>

<form method="POST">
    <label class="titulo"> Nombre del método de pago: </label> <input type="text" name="nom_metodo" required>
    <br><br>
    <button type="submit"> Enviar </button>
</form>
<?php
    if ($_POST){
        $nom_metodo=$_POST['nom_metodo'];
        $sql="INSERT INTO metodo_pago(nom_metodo) VALUES ('$nom_metodo')";
        $conexion->query($sql);
        echo "Se mando correctamente";
    }
?>