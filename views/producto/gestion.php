<h1>Gestion de Productos</h1>

<a class="button boton-crear" href="<?=base_url?>producto/crear">Crear Producto</a>


<?php if(isset($_SESSION['producto']) && $_SESSION['producto'] == 'completado'): ?>
<strong class="alerta-verde">Se Registro el producto correctamente..</strong>

<?php elseif(isset($_SESSION['producto']) && $_SESSION['producto'] != 'completado'): ?>
    <strong class="alerta-rojo">No se pudo registrar el producto!!! </strong>
<?php endif; ?>

<?php Utilidades::eliminarSession('producto'); ?>
<?php if(isset($_SESSION['delete']) && $_SESSION['delete'] == 'completado'): ?>
<strong class="alerta-verde">Se eliminó el producto..</strong>

<?php elseif(isset($_SESSION['delete']) && $_SESSION['delete'] != 'completado'): ?>
    <strong class="alerta-rojo">No se pudo eliminar el producto!!! </strong>
<?php endif; ?>
<?php Utilidades::eliminarSession('delete'); ?>
<table>
    <thead>
        <tr>
            <th>Nombre Producto </th>
            <th>Precio</th>
            <th>Stock</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
        <?php while ($producto = $productos->fetch_object()) : ?>
            <tr>
                <td><?= $producto->nombreProducto ?></td>
                <td><?= $producto->precio ?></td>
                <td><?= $producto->stock ?></td>
                <td><a href="<?=base_url?>producto/editar&id=<?=$producto->id?>" class="button boton-editar">Editar</a>
                <a href="<?=base_url?>producto/eliminar&id=<?=$producto->id?>" class="button boton-eliminar">Elminar</a></td>
            </tr>
        <?php endwhile; ?>
    </tbody>

</table>