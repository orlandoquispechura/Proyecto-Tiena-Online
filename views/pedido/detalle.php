<h1>Detalle del Pedido</h1>
<?php if (isset($pedidos)) : ?>
    <?php if (isset($_SESSION['admin'])) : ?>
        <h3>Estado del Pedido</h3>
        <form action="<?= base_url ?>pedido/estado" method="post">
        <input type="hidden" name="pedido_id" value="<?=$pedidos->id?>">
            <select name="estado">
                <option value="confirmado" <?=$pedidos->estado =='confirmado'? 'selected' : '';?>>Pendiente</option>
                <option value="preparation" <?=$pedidos->estado =='preparation'? 'selected' : '';?>>En preparación</option>
                <option value="ready" <?=$pedidos->estado =='ready'? 'selected' : '';?>>Preparado</option>
                <option value="sended" <?=$pedidos->estado =='sended'? 'selected' : '';?>>Enviado</option>
            </select>
            <input type="submit" value="Cambiar Estado">
        </form>
        <br>
    <?php endif; ?>
    <h3>Dirección del envio</h3>
    <strong>Provincia:</strong> <?= $pedidos->provincia ?> <br>
    <strong>Localidad:</strong> <?= $pedidos->localidad ?> <br>
    <strong>Dirección:</strong> <?= $pedidos->direccion ?> <br><br>

    <h3>Datos del Pedido:</h3>
    <?= Utilidades::showEstado($pedidos->estado) ?> <br>
    <strong>Número de pedido:</strong> <?= $pedidos->id ?> <br>
    <strong>Total a pagar:</strong> <?= $pedidos->coste ?> Bs<br>
    <strong>Productos:</strong>
    <table>
        <thead>
            <tr>
                <th>Imagen </th>
                <th>Nombre </th>
                <th>Unidades</th>
                <th>Precio</th>

            </tr>
        </thead>

        <tbody>
            <?php while ($producto = $productos->fetch_object()) : ?>
                <tr>
                    <td>
                        <?php if ($producto->imagen != null) : ?>
                            <img src="<?= base_url ?>uploads/images/<?= $producto->imagen ?>" alt="camiseta-producto" class="img-carrito">
                        <?php else : ?>
                            <img src="<?= base_url ?>uploads/images/default.png" alt="camiseta-producto" class="img-carrito">
                        <?php endif; ?>
                    </td>
                    <td><a href="<?= base_url ?>producto/show&id=<?= $producto->id ?>" class="enlace-carrito"><?= $producto->nombreProducto ?></a></td>
                    <td><?= $producto->unidades ?></td>
                    <td><?= $producto->precio ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>

    </table>
<?php endif; ?>