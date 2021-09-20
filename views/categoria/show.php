<?php if (isset($categorias)) : ?>
    <h1><?= $categorias->nombre ?></h1>
    <?php if ($productos->num_rows == 0) : ?>
        <p>No hay Productos para mostrar</p>
    <?php else : ?>
        <?php while ($producto = $productos->fetch_object()) : ?>
            <div class="producto">
                <a href="<?= base_url ?>producto/show&id=<?= $producto->id ?>">
                    <?php if ($producto->imagen != null) : ?>
                        <img src="<?= base_url ?>uploads/images/<?= $producto->imagen ?>" alt="camiseta-producto">
                    <?php else : ?>
                        <img src="<?= base_url ?>uploads/images/default.png" alt="camiseta-producto">
                    <?php endif; ?>
                    <h2><?= $producto->nombreProducto ?></h2>
                </a>
                <p><?= $producto->precio ?></p>
                <a href="<?=base_url?>carrito/add&id=<?=$producto->id?>" class="comprar">Comprar</a>
            </div>
        <?php endwhile; ?>
    <?php endif; ?>
<?php else : ?>
    <h1>La Categoría no existe</h1>
<?php endif; ?>