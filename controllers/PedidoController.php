<?php
require_once 'models/pedido.php';

class pedidoController
{

    public function hacer_pedido()
    {

        require_once 'views/pedido/hacer_pedido.php';
    }
    public function add()
    {

        if (isset($_SESSION['identificar'])) {
            $usuario_id = $_SESSION['identificar']->id;

            $provincia = isset($_POST['provincia']) ? $_POST['provincia'] : false;
            $localidad = isset($_POST['localidad']) ? $_POST['localidad'] : false;
            $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : false;
            $contarPedido = Utilidades::contarProductos();
            $coste = $contarPedido;

            if ($provincia && $localidad && $direccion) {
                //guardar en la bd
                $pedidos = new Pedido();
                $pedidos->setProvincia($provincia);
                $pedidos->setLocalidad($localidad);
                $pedidos->setDireccion($direccion);
                $pedidos->setUsuario_id($usuario_id);
                $pedidos->setCoste($coste['total']);

                $save = $pedidos->save();
                // guardar detalle pedido
                $save_detalle = $pedidos->save_detalle();

                if ($save && $save_detalle) {
                    $_SESSION['pedido'] = "completado";
                } else {
                    $_SESSION['pedido'] = "fallido";
                }
            } else {
                $_SESSION['pedido'] = "fallido";
            }
            header("Location:" . base_url . "pedido/confirmado");
        } else {
            header("Location:" . base_url);
        }
    }
    public function confirmado()
    {
        if (isset($_SESSION['identificar'])) {
            $identificado = $_SESSION['identificar'];

            $pedido = new Pedido();
            $pedido->setUsuario_id($identificado->id);
            $pedidos = $pedido->getOneByUser();

            $pedido_producto = new Pedido();
            $productos = $pedido_producto->getProductoByPedido($pedidos->id);

        }
        require_once 'views/pedido/confirmado.php';
    }
    public function mis_pedidos(){
        Utilidades::isIdentificado();
        $usuario_id = $_SESSION['identificar']->id;
        $pedido = new Pedido();
        //  sacar los pedidos del usuario 
        $pedido->setUsuario_id($usuario_id);
        $pedidos = $pedido->getAllByUser();

        require_once 'views/pedido/mis_pedidos.php';
    }

    public function detalle(){
        Utilidades::isIdentificado();
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            //scar el pedido  de dla bd
            $pedido = new Pedido();
            $pedido->setId($id);
            $pedidos = $pedido->getOne();

            // sacar los productos de la bd
            $pedido_producto = new Pedido();
            $productos = $pedido_producto->getProductoByPedido($id);

            require_once 'views/pedido/detalle.php';
        
        }else {
         header("Location:".base_url."pedido/mis_pedidos");   
        }
    }
    public function gestion(){
        Utilidades::isAdmin();
        $gestion = true;

        $pedidos = new Pedido();
        $pedidos = $pedidos->getAll();
        require_once 'views/pedido/mis_pedidos.php';
    }

    public function estado(){
        Utilidades::isAdmin();
        if (isset($_POST['pedido_id']) && isset($_POST['estado'])) {
            $id = $_POST['pedido_id'];
            $estado = $_POST['estado'];
            // update del pedido

            $pedido = new Pedido();
            $pedido->setId($id);
            $pedido->setEstado($estado);
            $pedidos = $pedido->updateOne();

            header("Location:".base_url."pedido/detalle&id=".$id);    
        }else{
            header("Location:".base_url);
        }
    }
}
