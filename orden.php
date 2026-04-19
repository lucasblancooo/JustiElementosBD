<link rel="stylesheet" href="estilo.css">
<br><br><br><br>

<?php include("menu.php")
?>
<?php include("bd.php")
?>


<form method="POST">
    <label class="titulo"> Producto: </label> 
    <select name="producto">
        <?php
        $producto = $conexion->query("SELECT * FROM producto");
        while ($p = $producto->fetch_assoc()) {
            echo "<option value='{$p['ID_prod']}'>{$p['nom_prod']} \${$p['precio']} </option>";
        }
        ?>
    </select>

    <br><br>

    <label class="titulo"> Cantidad: </label>

    <input type="number" name="cantidad" required>

    <br><br>

    <label class="titulo"> Cliente comprador: </label>

    <select name="cliente">
        <?php
        $cliente = $conexion->query("SELECT * FROM clientes");
        while ($c = $cliente->fetch_assoc()) {
            echo "<option value='{$c['ID_cliente']}'>{$c['Nombre']} {$c['Apellido']}</option>";
        }
        ?>
    </select>

    <br><br>
    
    <label class="titulo">Metodo de pago: </label> <select name="met_pago">
        <?php
        $met_pago = $conexion->query("SELECT * FROM metodo_pago");
        while ($mp = $met_pago->fetch_assoc()) {
            echo "<option value='{$mp['ID_metodo']}'>{$mp['nom_metodo']} %{$mp['descuento']} </option>";
        }
        ?>

    </select>

     <br><br>

     <button type="submit"> Enviar </button>

</form>

<?php
    if ($_POST){
        $producto=$_POST['producto'];
        $cantidad=$_POST['cantidad'];
        $cliente=$_POST['cliente'];
        $met_pago=$_POST['met_pago'];

        $sql_precio = "SELECT precio FROM producto WHERE ID_prod = $producto";
        $sql_descuento =  "SELECT descuento FROM metodo_pago WHERE ID_metodo = $met_pago";

        $resultado = $conexion->query($sql_precio);
        $fila = $resultado->fetch_assoc();
        $precio = $fila['precio'];

        $resultado2 = $conexion->query($sql_descuento);
        $fila = $resultado2->fetch_assoc();
        $descuento = $fila['descuento'];
 
        $monto_total = ($precio * $cantidad) - ($precio * $cantidad * $descuento/100);

        $sql="INSERT INTO orden(fecha_inicio, fecha_term, cantidad, monto_total, ID_cliente, ID_prod, ID_metodo)
                VALUES (CURDATE(), DATE_ADD(CURDATE(), INTERVAL 1 WEEK), '$cantidad', '$monto_total', '$cliente', '$producto', '$met_pago')";
        $conexion->query($sql);
        echo "Se mando correctamente.";
    }
?>

