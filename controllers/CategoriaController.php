<?php
require_once 'models/categoria.php';
require_once 'models/producto.php';

class categoriaController
{

    public function index()
    {
        Utilidades::isAdmin();
        $categoria = new Categoria();
        $categorias = $categoria->getAll();

        require_once 'views/categoria/index.php';
    }
    public function show()
    {

        if (isset($_GET['id'])) {

            $id = $_GET['id'];
            // conseguir categorias
            $categoria = new Categoria();
            $categoria->setId($id);
            $categorias = $categoria->getOne();

            //  conseguir productos 
            $producto = new Producto();
            $producto->setCategoria_id($id);
            $productos = $producto->getAllCategoria();

        }
        require_once 'views/categoria/show.php';
    }
    public function crear()
    {
        Utilidades::isAdmin();
        require_once 'views/categoria/crear.php';
    }

    public function save()
    {
        Utilidades::isAdmin();
        // guardar la categoria en la bd 
        if (isset($_POST) && isset($_POST['nombre'])) {
            $categoria = new Categoria();
            $nombre = $_POST['nombre'];
            $categoria->setNombre(ucwords($nombre));

            $save = $categoria->save();
        }

        header("Location:" . base_url . "categoria/index");
    }
}
