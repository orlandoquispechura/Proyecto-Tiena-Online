<!-- Barra lateral -->
<aside id="lateral">
<div id="login" class="bloque">
    <h3 class="entrar"> Mis Compras</h3>
    <ul>
        <?php $contarProductos = Utilidades::contarProductos(); ?>
    <li><a href="<?=base_url?>carrito/index">Producto (<?=$contarProductos['count']?>)</a></li>
    <li><a href="<?=base_url?>carrito/index">Total: <?=$contarProductos['total']?>Bs</a></li>
    <li><a href="<?=base_url?>carrito/index">Ver carrito</a></li>
    </ul>
</div>
    <div id="login" class="bloque">

        <?php if (!isset($_SESSION['identificar'])) : ?>

            <h3 class="entrar">Entrar a la Web</h3>
            <form action="<?=base_url?>usuario/login" method="post">
                <label for="email">Email</label>
                <input type="email" name="email" id="email">
                <label for="contrasena">Password</label>
                <input type="password" name="contrasena" id="contrasena">

                <input type="submit" value="Ingresar">

            </form>
        <?php else: ?>
            <h3 class="entrar"><?= $_SESSION['identificar']->nombre ?> <?= $_SESSION['identificar']->apellidos ?></h3>
        <?php endif; ?>
        <ul>
            <?php if(isset($_SESSION['admin'])): ?>
            <li><a href="<?=base_url?>categoria/index">Gestionar Categorías</a></li>
            <li><a href="<?=base_url?>producto/gestion">Gestionar Productos</a></li>
            <li><a href="<?=base_url?>pedido/gestion">Gestionar Pedidos</a></li>
            <?php endif; ?>

            <?php if(isset($_SESSION['identificar'])): ?>
            <li><a href="<?=base_url?>pedido/mis_pedidos">Mis Pedidos</a></li>
            <li><a href="<?=base_url?>usuario/cerrar">Cerrar Sesión</a></li>
            <?php else: ?>
            <li><a href="<?=base_url?>usuario/registro">Registrarse</a></li>
            <?php endif; ?>
        </ul>
    </div>
</aside>

<!-- Contenido Principal -->

<div id="principal">