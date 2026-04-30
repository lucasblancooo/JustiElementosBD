<link rel="stylesheet" href="estilo.css">

<?php include("menu.php") ?>
<?php include("bd.php") ?>

<div class="page">
    <div class="hero">
        <p class="tagline">Panel de administración</p>
        <h1>⚙ Justi<span class="accent"> Elementos</span></h1>
        <p>Gestión interna de productos, clientes y órdenes.</p>
    </div>

    <div class="quick-nav">
        <a href="clientes.php">
            <span class="nav-icon">👤</span>
            <span class="nav-label">Clientes</span>
            <span class="nav-desc">Registrar nuevo cliente y destino</span>
        </a>
        <a href="prod.php">
            <span class="nav-icon">🔧</span>
            <span class="nav-label">Productos</span>
            <span class="nav-desc">Agregar, editar o eliminar ítems</span>
        </a>
        <a href="met_pago.php">
            <span class="nav-icon">💳</span>
            <span class="nav-label">Método de pago</span>
            <span class="nav-desc">Gestionar métodos y descuentos</span>
        </a>
        <a href="orden.php">
            <span class="nav-icon">📦</span>
            <span class="nav-label">Nueva orden</span>
            <span class="nav-desc">Registrar pedido de cliente</span>
        </a>
    </div>
</div>
