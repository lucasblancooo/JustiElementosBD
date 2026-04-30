<?php
include("bd.php");

if (isset($_GET['eliminar'])) {
    $id = $_GET['eliminar'];
    $conexion->query("DELETE FROM Producto WHERE ID_prod=$id");
    header("Location: prod.php");
    exit;
}

if (isset($_POST['actualizar'])) {
    $id     = $_POST['ID_prod'];
    $nombre = $_POST['nom_prod'];
    $precio = $_POST['precio'];
    $conexion->query("UPDATE Producto SET nom_prod='$nombre', precio='$precio' WHERE ID_prod=$id");
    header("Location: prod.php");
    exit;
}
?>

<?php include("menu.php") ?>

<div class="page">
    <div class="page-header">
        <span class="icon">🔧</span>
        <h2>Productos</h2>
    </div>

    <!-- INGRESO -->
    <div class="card">
        <form method="POST">
            <div class="form-group">
                <label class="titulo">Nombre del producto</label>
                <input type="text" name="nom_prod" required>
            </div>
            <div class="form-group">
                <label class="titulo">Precio ($)</label>
                <input type="number" step="0.1" min="0" name="precio" required>
            </div>
            <button type="submit" name="enviar">Agregar producto</button>
        </form>

        <?php
        if (isset($_POST['enviar'])) {
            $nom_prod = $_POST['nom_prod'];
            $precio   = $_POST['precio'];
            $sql = "INSERT INTO producto(nom_prod, precio) VALUES ('$nom_prod', '$precio')";
            $conexion->query($sql);
            echo '<div class="alert alert-success">✔ Producto agregado.</div>';
        }
        ?>
    </div>

    <hr>

    <!-- BUSCADOR -->
    <form method="GET" class="search-row">
        <input type="text" name="buscar" placeholder="Buscar producto..." value="<?php echo isset($_GET['buscar']) ? htmlspecialchars($_GET['buscar']) : ''; ?>">
        <button type="submit">Buscar</button>
    </form>

    <!-- TABLA -->
    <?php
    if (isset($_GET['buscar'])) {
        $buscar = $_GET['buscar'];
        $sql = "SELECT * FROM Producto WHERE nom_prod LIKE '%$buscar%'";
    } else {
        $sql = "SELECT * FROM Producto";
    }
    $resultado = $conexion->query($sql);
    ?>

    <table class="prod-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Producto</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php while ($fila = $resultado->fetch_assoc()): ?>
            <tr>
                <td style="color:var(--text-dim)"><?php echo $fila['ID_prod']; ?></td>
                <td><?php echo htmlspecialchars($fila['nom_prod']); ?></td>
                <td>$<?php echo number_format($fila['precio'], 2); ?></td>
                <td>
                    <a href="prod.php?editar=<?php echo $fila['ID_prod']; ?>" class="action-edit">Editar</a>
                    <a href="prod.php?eliminar=<?php echo $fila['ID_prod']; ?>" class="action-delete" onclick="return confirm('¿Eliminar este producto?')">Eliminar</a>
                </td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>

    <!-- EDITAR -->
    <?php
    if (isset($_GET['editar'])) {
        $id       = $_GET['editar'];
        $resultado = $conexion->query("SELECT * FROM Producto WHERE ID_prod=$id");
        $producto  = $resultado->fetch_assoc();
    ?>

    <hr>

    <div class="page-header">
        <span class="icon">✏️</span>
        <h2>Editar producto</h2>
    </div>

    <div class="card">
        <form method="POST">
            <input type="hidden" name="ID_prod" value="<?php echo $producto['ID_prod']; ?>">
            <div class="form-group">
                <label class="titulo">Nombre</label>
                <input type="text" name="nom_prod" value="<?php echo htmlspecialchars($producto['nom_prod']); ?>" required>
            </div>
            <div class="form-group">
                <label class="titulo">Precio ($)</label>
                <input type="number" step="0.01" name="precio" value="<?php echo $producto['precio']; ?>" required>
            </div>
            <button type="submit" name="actualizar">Guardar cambios</button>
        </form>
    </div>

    <?php } ?>
</div>
