<h1>Algunos de nuestros productos</h1>

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