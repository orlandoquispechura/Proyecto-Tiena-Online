<?php if (isset($edit) && isset($prod) && is_object($prod)) : ?>
    <h1>Editar Producto <strong><?= $prod->nombreProducto ?></strong></h1>
    <?php $url_action = base_url . "producto/save&id=" . $prod->id; ?>
<?php else : ?>
    <h1>Crear Nuevo Producto</h1>
    <?php $url_action = base_url . "producto/save"; ?>
<?php endif; ?>
<div class="form">
    <form action="<?= $url_action ?>" method="POST" enctype="multipart/form-data">

        <label for="categoria_id">Categoria</label>
        <?php $categorias = Utilidades::showCategorias(); ?>
        <select name="categoria_id" id="categoria_id">
            <option value="" selected disabled>Seleccione la categoría</option>
            <?php while ($categoria = $categorias->fetch_object()) : ?>
                <option value="<?=$categoria->id ?>"<?= isset($prod) && is_object($prod) && $categoria->id == $prod->categoria_id ? 'selected' : '';?>><?=$categoria->nombre?></option>
            <?php endwhile; ?>
        </select>

        <label for="nombreProducto">Nombre Producto</label>
        <input type="text" name="nombreProducto" id="nombreProducto" value="<?= isset($prod) && is_object($prod) ? $prod->nombreProducto : '' ?>" required>

        <label for="descripcion">Descripción</label>
        <textarea name="descripcion" id="descripcion"><?= isset($prod) && is_object($prod) ? $prod->descripcion : '' ?></textarea>

        <label for="precio">Precio</label>
        <input type="number" name="precio" id="precio" value="<?= isset($prod) && is_object($prod) ? $prod->precio : '' ?>" required>

        <label for="stock">Stock</label>
        <input type="number" name="stock" id="stock" value="<?= isset($prod) && is_object($prod) ? $prod->stock : '' ?>" required>

        <!-- <label for="oferta">Oferta</label>
    <input type="number" name="oferta" id="oferta"> -->

        <label for="imagen">Imagen</label>
        
        <?php if (isset($prod) && is_object($prod) && !empty($prod->imagen)) : ?>
            <img src="<?=base_url?>uploads/images/<?=$prod->imagen?>" alt="imagen del producto" class="img-producto"/>
        <?php endif; ?>
        <input type="file" name="imagen" id="imagen"/>
        <input type="submit" value="Registrar">
    </form>
</div>