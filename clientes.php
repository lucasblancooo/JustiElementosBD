<link rel="stylesheet" href="estilo.css">

<?php include("menu.php") ?>
<?php include("bd.php") ?>

<div class="page">
    <div class="page-header">
        <span class="icon">👤</span>
        <h2>Nuevo Cliente</h2>
    </div>

    <div class="card">
        <form method="POST">
            <div class="form-group">
                <label class="titulo">Nombre</label>
                <input type="text" name="nombre" required>
            </div>
            <div class="form-group">
                <label class="titulo">Apellido</label>
                <input type="text" name="apellido" required>
            </div>
            <div class="form-group">
                <label class="titulo">Teléfono</label>
                <input type="number" name="telefono" required>
            </div>

            <hr>

            <div class="form-group">
                <label class="titulo">Nombre del destino</label>
                <input type="text" name="Nom_destino" required>
            </div>
            <div class="form-group">
                <label class="titulo">Código postal</label>
                <input type="number" min=0 name="cod_postal" required>
            </div>
            <div class="form-group">
                <label class="titulo">Dirección</label>
                <input type="text" name="direccion" required>
            </div>

            <button type="submit">Guardar cliente</button>
        </form>

        <?php
        if ($_POST) {
            $nombre      = $_POST['nombre'];
            $apellido    = $_POST['apellido'];
            $telefono    = $_POST['telefono'];
            $nom_destino = $_POST['Nom_destino'];
            $cod_postal  = $_POST['cod_postal'];
            $direccion   = $_POST['direccion'];

            $sql_destino = "INSERT INTO destino(Nom_destino, cod_postal, direccion) VALUES ('$nom_destino', '$cod_postal','$direccion')";
            $conexion->query($sql_destino);
            $id_destino = $conexion->insert_id;

            $sql_cliente = "INSERT INTO Clientes (Nombre, Apellido, Telefono, ID_destino) VALUES ('$nombre', '$apellido', '$telefono', '$id_destino')";
            $conexion->query($sql_cliente);

            echo '<div class="alert alert-success">✔ Cliente registrado correctamente.</div>';
        }
        ?>
    </div>

    <hr>

    <?php
    $resultado = $conexion->query("SELECT * FROM Clientes");
    ?>

    <table class="prod-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Teléfono</th>
            </tr>
        </thead>
        <tbody>
        <?php
        while ($fila = $resultado->fetch_assoc()) {
            echo "
            <tr>
                <td style='color:var(--text-dim)'>{$fila['ID_cliente']}</td>
                <td>{$fila['Nombre']}</td>
                <td>{$fila['Apellido']}</td>
                <td>{$fila['Telefono']}</td>
            </tr>
            ";
        }
        ?>
        </tbody>
    </table>

</div>
