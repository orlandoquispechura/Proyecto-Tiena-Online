<?php
require_once 'models/producto.php';
class carritoController{

    public function index(){
        if(isset($_SESSION['carrito']) && isset($_SESSION['carrito']) >=1){
            $carrito = ($_SESSION['carrito']);
        }else {
            $carrito = array();
        }
        

        require_once 'views/carrito/index.php';
    }
    public function add(){
        if (isset($_GET['id'])) {
            $producto_id = $_GET['id'];
        }else {
            header("Location:". base_url);
        }

        if (isset($_SESSION['carrito'])) {
            $contador = 0;
            foreach ($_SESSION['carrito'] as $indice => $elemento) {
                if ($elemento['id_producto'] == $producto_id) {
                    $_SESSION['carrito'][$indice]['unidades']++;
                    $contador++;
                }
            }
        }
        if(!isset($contador) || $contador == 0) {
            // conseguir el producto 
            $producto = new Producto();
            $producto->setId($producto_id);
            $productos = $producto->getOne();

            // añadir al carrito 
            if (is_object($productos)) {
                $_SESSION['carrito'][] = array(
                    "id_producto" => $productos->id,
                    "precio" => $productos->precio,
                    "unidades" => 1,
                    "producto" => $productos
                );
            }     
        }
        header("Location:".base_url."carrito/index");
    }
    public  function remove(){
        if (isset($_GET['index'])) {
            $index  = $_GET['index'];
            unset($_SESSION['carrito'][$index]);
        }
        header("Location:". base_url."carrito/index");
    }
    public function deleteAll(){
        unset($_SESSION['carrito']);
        header("Location:".base_url."carrito/index");
    }
    public  function mas(){
        if (isset($_GET['index'])) {
            $index  = $_GET['index'];
            $_SESSION['carrito'][$index]['unidades']++;
        }
        header("Location:". base_url."carrito/index");
    }
    public  function menos(){
        if (isset($_GET['index'])) {
            $index  = $_GET['index'];
            $_SESSION['carrito'][$index]['unidades']--;
            if ($_SESSION['carrito'][$index]['unidades'] == 0) {
                unset($_SESSION['carrito'][$index]);
            }
        }
        header("Location:". base_url."carrito/index");
    }

}