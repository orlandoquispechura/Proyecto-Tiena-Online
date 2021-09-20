<h1>Crear Nueva Categoría</h1>

<form action="<?= base_url ?>categoria/save" method="post">
    <label for="nombre">Nombre de la Categoría</label>
    <input type="text" name="nombre" id="nombre" required>

    <input type="submit" value="Guardar">
</form>