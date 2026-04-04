<link rel="stylesheet" href="estilo.css">
<br><br><br><br>

<?php include("bd.php")
?>
<?php include("menu.php")
?>

<form method="POST">
    <label class="titulo"> Nombre: </label> <input type="text" name="nombre" required>
    <br><br>
    <label class="titulo">Apellido: </label> <input type="text" step=0.1 min=0 name="apellido" required>
    <br><br>
    <label class="titulo"> Teléfono: </label> <input type="number" name="telefono" required>
    <br><br>
    <label class="titulo"> Nombre del destino: </label> <input type="text" name="Nom_destino" required>
    <br><br>
    <label class="titulo"> Código postal: </label> <input type="number" min=0 name="cod_postal" required>
    <br><br>
    <label class="titulo"> Dirección: </label> <input type="text" name="direccion" required>
    <br><br>

    <button type="submit"> Enviar </button>
</form>

<?php 
    if ($_POST){
        $nombre=$_POST['nombre'];
        $apellido=$_POST['apellido'];
        $telefono=$_POST['telefono'];
        $nom_destino = $_POST['Nom_destino'];
        $cod_postal = $_POST['cod_postal'];
        $direccion = $_POST['direccion'];

        $sql_destino="INSERT INTO destino(Nom_destino, cod_postal, direccion) VALUES ('$nom_destino', '$cod_postal','$direccion')";
        $conexion->query($sql_destino);

        $id_destino = $conexion->insert_id;

        $sql_cliente = "INSERT INTO Clientes (Nombre, Apellido, Telefono, ID_destino) VALUES ('$nombre', '$apellido', '$telefono', '$id_destino')";
        $conexion->query($sql_cliente);
        echo "Se mando correctamente";
    }
?>