<h1>Gestionar las Categorías</h1>



<a class="button boton" href="<?=base_url?>categoria/crear">Crear Categoria</a>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre de la Categoría </th>
        </tr>
    </thead>

    <tbody>
        <?php while ($categoria = $categorias->fetch_object()) : ?>
            <tr>
                <td><?= $categoria->id ?></td>
                <td><?= $categoria->nombre ?></td>
            </tr>
        <?php endwhile; ?>
    </tbody>

</table>