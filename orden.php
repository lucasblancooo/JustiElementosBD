<link rel="stylesheet" href="estilo.css">

<?php include("menu.php") ?>
<?php include("bd.php") ?>

<div class="page">
    <div class="page-header">
        <span class="icon">📦</span>
        <h2>Nueva Orden</h2>
    </div>

    <div class="card">
        <form method="POST">
            <div class="form-group">
                <label class="titulo"> Producto: </label> 
                    <table border="1">
                        <tr>
                            <th>Seleccionar</th>
                            <th>Producto</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                        </tr>
                        <?php
                        $producto = $conexion->query("SELECT * FROM producto");
                        while ($p = $producto->fetch_assoc()) {
                            echo "
                            <tr>
                                <td><input type='checkbox' name='productos[]' value='{$p['ID_prod']}'></td>
                                <td>{$p['nom_prod']}</td>
                                <td>\${$p['precio']}</td>
                                <td><input type='number' name='cantidades[{$p['ID_prod']}]' min='1' value='1'></td>
                            </tr>";
                        }
                        ?>
                </table>
            </div>

            <div class="form-group">
                <label class="titulo">Cliente comprador</label>
                <select name="cliente">
                    <?php
                    $cliente = $conexion->query("SELECT * FROM clientes");
                    while ($c = $cliente->fetch_assoc()) {
                        echo "<option value='{$c['ID_cliente']}'>{$c['Nombre']} {$c['Apellido']}</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label class="titulo">Método de pago</label>
                <select name="met_pago">
                    <?php
                    $met_pago = $conexion->query("SELECT * FROM metodo_de_pago");
                    while ($mp = $met_pago->fetch_assoc()) {
                        echo "<option value='{$mp['ID_metodo']}'>{$mp['nom_metodo']} ({$mp['descuento']}% desc.)</option>";
                    }
                    ?>
                </select>
            </div>

            <button type="submit">Confirmar orden</button>
        </form>

    <?php
    if ($_POST){
        if (isset($_POST['productos'])) {
            $productos = $_POST['productos'];
        } else {
            $productos = [];
        }
        $cantidades=$_POST['cantidades'];
        $cliente=$_POST['cliente'];
        $met_pago=$_POST['met_pago'];

        $sql_descuento =  "SELECT descuento FROM metodo_de_pago WHERE ID_metodo = $met_pago";

        $resultado2 = $conexion->query($sql_descuento);
        $fila = $resultado2->fetch_assoc();
        $descuento = $fila['descuento'];
 
        $monto_total = 0;
        foreach ($productos as $id_prod) {
            $cantidad = $cantidades[$id_prod] ?? 1;
            $sql_precio = "SELECT precio FROM producto WHERE ID_prod = $id_prod";
            $resultado2 = $conexion->query($sql_precio);
            $fila2 = $resultado2->fetch_assoc();
            $precio = $fila2['precio'];
            $monto_total += ($precio * $cantidad) - ($precio * $cantidad * $descuento / 100);
        }

        $sql = "INSERT INTO orden(Fecha_inicio, Fecha_term, monto_total, ID_cliente, ID_metodo)
                VALUES (CURDATE(), DATE_ADD(CURDATE(), INTERVAL 1 WEEK), '$monto_total', '$cliente', '$met_pago')";
        $conexion->query($sql);
        $id_orden = $conexion->insert_id;

        foreach ($productos as $id_prod) {
            $cantidad = $cantidades[$id_prod] ?? 1;
            $sql_precio = "SELECT precio FROM producto WHERE ID_prod = $id_prod";
            $resultado3 = $conexion->query($sql_precio);
            $fila3 = $resultado3->fetch_assoc();
            $precio_unitario = $fila3['precio'];

            $sql_detalle = "INSERT INTO detalle_orden(ID_orden, ID_prod, cantidad, precio_unitario)
                            VALUES ('$id_orden', '$id_prod', '$cantidad', '$precio_unitario')";
            $conexion->query($sql_detalle);
        }

        echo '<div class="alert alert-success">✔ Orden registrada. Monto total: $' . number_format($monto_total, 2) . '</div>';
    }
    ?>
    </div>

    <hr>

    <?php
    $resultado = $conexion->query("SELECT orden.ID_orden, orden.Fecha_inicio, orden.Fecha_term, orden.monto_total, clientes.Nombre, clientes.Apellido FROM orden JOIN clientes ON orden.ID_cliente = clientes.ID_cliente");
    ?>

    <table class="prod-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Cliente</th>
                <th>Fecha inicio</th>
                <th>Fecha entrega</th>
                <th>Monto total</th>
            </tr>
        </thead>
        <tbody>
        <?php
        while ($fila = $resultado->fetch_assoc()) {
            echo "
            <tr>
                <td style='color:var(--text-dim)'>{$fila['ID_orden']}</td>
                <td>{$fila['Nombre']} {$fila['Apellido']}</td>
                <td>{$fila['Fecha_inicio']}</td>
                <td>{$fila['Fecha_term']}</td>
                <td>$" . number_format($fila['monto_total'], 2) . "</td>
            </tr>
            ";
        }
        ?>
        </tbody>
    </table>

</div>
