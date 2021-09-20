<?php if (isset($_SESSION['pedido']) && $_SESSION['pedido'] == "completado") : ?>

    <h1>Pedido Confirmado</h1>

    <p>Tu pedido se guardo con éxito, una vez que realices la transferencia bancaria con
        el costo del pedido, sera procesado y enviado a su dirección</p>

    <br>
    <?php if (isset($pedidos)) : ?>
        <h3>Datos del Pedido:</h3>

        Número de pedido: <?= $pedidos->id ?> <br>
        Total a pagar: <?= $pedidos->coste ?> <br>
        Productos:
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

<?php elseif (isset($_SESSION['pedido']) && $_SESSION['pedido'] != "completado") : ?>

    <h1>Tu pedido No ha podido procesarse</h1>

<?php endif; ?>