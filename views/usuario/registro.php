<h1>Registrate</h1>

<?php if (isset($_SESSION['registro']) && $_SESSION['registro'] == 'completado') : ?>
    <strong class="alerta-verde">Se registro correctamente</strong>

<?php elseif (isset($_SESSION['registro']) && $_SESSION['registro'] == 'fallido') : ?>
    <strong class="alerta-rojo">No se pudo registrar falta llenar datos!!! </strong>
<?php endif; ?>

<?php Utilidades::eliminarSession('registro'); ?>

<form action="<?= base_url ?>usuario/save" method="post">
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" id="nombre" require>

    <label for="apellidos">Apellidos</label>
    <input type="text" name="apellidos" id="apellidos" require>

    <label for="email">Email</label>
    <input type="email" name="email" id="email" require>

    <label for="contrasena">Contraseña</label>
    <input type="password" name="contrasena" id="contrasena" require>

    <input type="submit" value="Registrarse">

</form>