<?php if (isset($gestion)) : ?>
    <h1>Gestionar pedidos</h1>
<?php else : ?>
    <h1>Mis pedidos</h1>
<?php endif; ?>
<table>
    <thead>
        <tr>
            <th>N pedido </th>
            <th>Coste </th>
            <th>Fecha</th>
            <th>Estado</th>
        </tr>
    </thead>

    <tbody>
        <?php while ($pedido = $pedidos->fetch_object()) : ?>

            <tr>
                <td><a href="<?= base_url ?>pedido/detalle&id=<?= $pedido->id ?>"><?= $pedido->id ?></a></td>
                <td><?= $pedido->coste ?> Bs</td>
                <td><?= $pedido->fecha ?></td>
               <td> <?= Utilidades::showEstado($pedido->estado) ?></td>
            </tr>
        <?php endwhile; ?>
    </tbody>

</table>