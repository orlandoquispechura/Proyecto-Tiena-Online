<?php if (isset($prod)) : ?>
    <h1><?= $prod->nombreProducto ?></h1>
    <div class="detalle-producto">
        <div class="imagen">
            <?php if ($prod->imagen != null) : ?>
                <img src="<?= base_url ?>uploads/images/<?= $prod->imagen ?>" alt="camiseta-producto">
            <?php else : ?>
                <img src="<?= base_url ?>uploads/images/default.png" alt="camiseta-producto">
            <?php endif; ?>
        </div>
        <div class="data">
            <h2><?= $prod->descripcion ?></h2>
            </a>
            <p><?= $prod->precio ?></p>
            <a href="<?=base_url?>carrito/add&id=<?=$prod->id?>" class="comprar">Comprar</a>
        </div>
    </div>
<?php else : ?>
    <h1>El producto no existe</h1>
<?php endif; ?>