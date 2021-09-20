<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Tienda-Online de Camisetas</title>
</head>

<body>
    <div id="container">
        <!-- cabecera -->
        <header id="cabecera">
            <div id="logo">
                <img src="assets/img/camiseta.png" alt="Logo-camiseta">
                <a href="index.php">Tienda de Camisetas</a>
            </div>
        </header>
        <!-- menu -->
        <nav id="menu">
            <ul>
                <li><a href="#">Inicio</a></li>
                <li><a href="#">Categoria 1</a></li>
                <li><a href="#">Categoria 2</a></li>
                <li><a href="#">Categoria 2</a></li>
                <li><a href="#">Categoria 3</a></li>
            </ul>
        </nav>

        <div id="contenido">
            <!-- Barra lateral -->
            <aside id="lateral">
                <div id="login" class="bloque">
                    <h3 class="entrar">Entrar a la Web</h3>
                    <form action="#" method="post">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password">

                        <input type="submit" value="Ingresar">

                    </form>
                    <ul>
                        <li><a href="#">Mis Pedidos</a></li>
                        <li><a href="#">Gestionar Pedidos</a></li>
                        <li><a href="#">Gestionar Categorías</a></li>
                    </ul>
                </div>
            </aside>

            <!-- Contenido Principal -->

            <div id="principal">
                <h1>Productos destacados</h1>
                <div class="producto">
                    <img src="assets/img/camiseta.png" alt="camiseta-producto">
                    <h2>Camiseta Azul Ancha</h2>
                    <p>50 Bs</p>
                    <a href="" class="comprar">Comprar</a>
                </div>
                <div class="producto">
                    <img src="assets/img/camiseta.png" alt="camiseta-producto">
                    <h2>Camiseta Azul Ancha</h2>
                    <p>50 Bs</p>
                    <a href="" class="comprar">Comprar</a>
                </div>
                <div class="producto">
                    <img src="assets/img/camiseta.png" alt="camiseta-producto">
                    <h2>Camiseta Azul Ancha</h2>
                    <p>50 Bs</p>
                    <a href="" class="comprar">Comprar</a>
                </div>
                <div class="producto">
                    <img src="assets/img/camiseta.png" alt="camiseta-producto">
                    <h2>Camiseta Azul Ancha</h2>
                    <p>50 Bs</p>
                    <a href="" class="comprar">Comprar</a>
                </div>
                <div class="producto">
                    <img src="assets/img/camiseta.png" alt="camiseta-producto">
                    <h2>Camiseta Azul Ancha</h2>
                    <p>50 Bs</p>
                    <a href="" class="comprar">Comprar</a>
                </div>
                <div class="producto">
                    <img src="assets/img/camiseta.png" alt="camiseta-producto">
                    <h2>Camiseta Azul Ancha</h2>
                    <p>50 Bs</p>
                    <a href="" class="comprar">Comprar</a>
                </div>
            </div>
        </div> <!-- Pie de Página -->
        <footer id="footer">
            <p>Desarrollado por Ing Orlando &copy; <?= date('Y') ?></p>
        </footer>

    </div>
</body>

</html>