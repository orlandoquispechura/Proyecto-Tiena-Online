<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=base_url?>assets/css/style.css">
    <title>Tienda-Online de Ropa</title>
</head>

<body>
    <div id="container">
        <!-- cabecera -->
        <header id="cabecera">
            <div id="logo">
                <img src="<?=base_url?>assets/img/camiseta.png" alt="Logo-camiseta">
                <a href="<?=base_url?>">Tienda de Ropas</a>
            </div>
        </header>

        <?php $categorias = Utilidades::showCategorias(); ?>
        <!-- menu -->
        <nav id="menu">
            <ul>
            <li><a href="<?=base_url?>">Inicio</a></li>
                <?php while ($categoria = $categorias->fetch_object()) : ?>
                    <li><a href="<?=base_url?>categoria/show&id=<?=$categoria->id?>"><?=$categoria->nombre?></a></li>
                <?php endwhile; ?>
            </ul>
        </nav>

        <div id="contenido">