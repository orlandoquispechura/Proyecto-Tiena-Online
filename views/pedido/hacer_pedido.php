<?php if (isset($_SESSION['identificar'])) : ?>
    <h1>Hacer pedido</h1>
    <a href="<?= base_url ?>carrito/index">Ver los productos y el precio de tus compras</a>
    <br>
    <br>
    <h3>Dirección para el envio</h3>
    <form action="<?= base_url ?>pedido/add" method="post">
        <label for="provincia">Provincia</label>
        <input type="text" name="provincia" id="provincia" required>

        <label for="localidad">Ciudad</label>
        <input type="text" name="localidad" id="localidad" required>

        <label for="direccion">Dirección</label>
        <textarea name="direccion"></textarea>

        <input type="submit" value="Confirmar pedido">
    </form>
<?php else : ?>
    <h1>Necesitas identificarte</h1>
    <p>Para segurir con tus compras registrese e ingrese con su cuenta </p>
<?php endif; ?>