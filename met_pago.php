<link rel="stylesheet" href="estilo.css">

<?php include("menu.php") ?>
<?php include("bd.php") ?>

<div class="page">
    <div class="page-header">
        <span class="icon">💳</span>
        <h2>Método de pago</h2>
    </div>

    <div class="card">
        <form method="POST">
            <div class="form-group">
                <label class="titulo">Nombre del método</label>
                <input type="text" name="nom_metodo" required>
            </div>
            <div class="form-group">
                <label class="titulo">Descuento (%)</label>
                <input type="number" step="1" min="0" max="100" name="descuento" required>
            </div>
            <button type="submit">Guardar método</button>
        </form>

        <?php
        if ($_POST) {
            $nom_metodo = $_POST['nom_metodo'];
            $descuento  = $_POST['descuento'];
            $sql = "INSERT INTO metodo_de_pago(nom_metodo, descuento) VALUES ('$nom_metodo', '$descuento')";
            $conexion->query($sql);
            echo '<div class="alert alert-success">✔ Método de pago registrado.</div>';
        }
        ?>
    </div>

    <hr>

    <?php
    $resultado = $conexion->query("SELECT * FROM metodo_de_pago");
    ?>

    <table class="prod-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Método</th>
                <th>Descuento</th>
            </tr>
        </thead>
        <tbody>
        <?php
        while ($fila = $resultado->fetch_assoc()) {
            echo "
            <tr>
                <td style='color:var(--text-dim)'>{$fila['ID_metodo']}</td>
                <td>{$fila['nom_metodo']}</td>
                <td>{$fila['descuento']}%</td>
            </tr>
            ";
        }
        ?>
        </tbody>
    </table>

</div>
