<h1>Carrito de la compra</h1>
<?php if (isset($_SESSION['carrito']) && isset($_SESSION['carrito']) >= 1) : ?>
    <table>
        <thead>
            <tr>
                <th>Imagen </th>
                <th>Nombre </th>
                <th>Unidades</th>
                <th>Precio</th>

                <th>X</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($carrito as $indice => $elemento) :
                $producto = $elemento['producto'];
            ?>

                <tr>
                    <td>
                        <?php if ($producto->imagen != null) : ?>
                            <img src="<?= base_url ?>uploads/images/<?= $producto->imagen ?>" alt="camiseta-producto" class="img-carrito">
                        <?php else : ?>
                            <img src="<?= base_url ?>uploads/images/default.png" alt="camiseta-producto" class="img-carrito">
                        <?php endif; ?>
                    </td>
                    <td><a href="<?= base_url ?>producto/show&id=<?= $producto->id ?>" class="enlace-carrito"><?= $producto->nombreProducto ?></a></td>
                     <div class="unidades">
                        <td><?= $elemento['unidades'] ?>
                            <a href="<?= base_url ?>carrito/menos&index=<?= $indice ?>" class="btn-unidades">-</a>
                            <a href="<?= base_url ?>carrito/mas&index=<?= $indice ?>" class="btn-unidades">+</a>
                        </div>

                    </td>
                    <td><?= $producto->precio ?></td>
                    <td><a href="<?= base_url ?>carrito/remove&index=<?= $indice ?>" class="btn-eliminar">x</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>

    </table>
    <div class="delete-carrito">
        <a href="<?= base_url ?>carrito/deleteAll" class="boton-vaciar">Vaciar carrito</a>
    </div>
    <div class="total-carrito">
        <?php $contarProductos = Utilidades::contarProductos(); ?>
        <h3>Precio Total: <?= $contarProductos['total'] ?>Bs</h3>
        <a href="<?= base_url ?>pedido/hacer_pedido" class="boton-pedido">Hacer pedido</a>
    </div>
<?php else : ?>
    <p>El carrito esta vacío, añade algún producto</p>
<?php endif; ?>