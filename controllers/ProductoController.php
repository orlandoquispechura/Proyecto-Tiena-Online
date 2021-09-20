<?php
require_once 'models/producto.php';

class productoController
{

    public function index()
    {
        $producto = new Producto();
        $productos = $producto->getRandom(6);
        require_once 'views/producto/destacado.php';
    }
    public function gestion()
    {
        Utilidades::isAdmin();
        $producto = new Producto();
        $productos = $producto->getAll();
        require_once 'views/producto/gestion.php';
    }
    public function show()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            $producto = new Producto();
            $producto->setId($id);
            $prod = $producto->getOne();
        }
        require_once 'views/producto/show.php';
    }
    public function crear()
    {
        Utilidades::isAdmin();
        require_once 'views/producto/crear.php';
    }

    public  function save()
    {
        Utilidades::isAdmin();
        if (isset($_POST)) {

            $categoria = isset($_POST['categoria_id']) ? $_POST['categoria_id'] : false;
            $nombreProducto = isset($_POST['nombreProducto']) ? $_POST['nombreProducto'] : false;
            $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : false;
            $precio = isset($_POST['precio']) ? $_POST['precio'] : false;
            $stock = isset($_POST['stock']) ? $_POST['stock'] : false;
            // $imagen = isset($_POST['imagen']) ? $_POST['imagen'] : false;

            if ($nombreProducto && $descripcion && $precio && $stock && $categoria) {

                $producto = new Producto();
                $producto->setNombreProducto(ucwords($nombreProducto));
                $producto->setDescripcion(ucwords($descripcion));
                $producto->setPrecio($precio);
                $producto->setStock($stock);
                $producto->setCategoria_id($categoria);

                // Guardar la imagen del producto
                if (isset($_FILES['imagen'])) {

                    $file = $_FILES['imagen'];
                    $filename = $file['name'];
                    $mimetype = $file['type'];

                    if ($mimetype == "image/jpg" || $mimetype == "image/png" || $mimetype == "image/jpeg" || $mimetype == "image/gif") {
                        if (!is_dir("uploads/images")) {
                            mkdir('uploads/images', 0777, true);
                        }
                        $producto->setImagen($filename);
                        move_uploaded_file($file['tmp_name'], 'uploads/images/' . $filename);
                    }
                }

                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $producto->setId($id);
                    $save = $producto->editar();
                } else {
                    $save = $producto->save();
                }
                if ($save) {
                    $_SESSION['producto'] = "completado";
                } else {
                    $_SESSION['producto'] = "fallido";
                }
            } else {
                $_SESSION['producto'] = "fallido";
            }
        } else {
            $_SESSION['producto'] = "fallido";
        }
        header("Location:" . base_url . "producto/gestion");
    }
    public function editar()
    {
        Utilidades::isAdmin();
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $edit = true;

            $producto = new Producto();
            $producto->setId($id);
            $prod = $producto->getOne();
            require_once 'views/producto/crear.php';
        } else {
            header("Location:" . base_url . "producto/gestion");
        }
    }
    public function eliminar()
    {
        Utilidades::isAdmin();
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $producto = new Producto();
            $producto->setId($id);
            $delete = $producto->delete();
            if ($delete) {
                $_SESSION['delete'] = "completado";
            } else {
                $_SESSION['delete'] = "fallido";
            }
        } else {
            $_SESSION['delete'] = "fallido";
        }
        header("Location:" . base_url . "producto/gestion");
    }
}
