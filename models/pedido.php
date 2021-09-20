<?php

class Pedido
{


    private $id;
    private $usuario_id;
    private $provincia;
    private $localidad;
    private $direccion;
    private $coste;
    private $estado;
    private $fecha;
    private $hora;

    private $db;

    public function __construct()
    {
        $this->db = Database::Conexion();
    }
    function setId($id)
    {
        $this->id = $id;
    }
    function getId()
    {
        return $this->id;
    }
    function setUsuario_id($usuario_id)
    {
        $this->usuario_id = $usuario_id;
    }
    function getUsuario_id()
    {
        return $this->usuario_id;
    }
    function setProvincia($provincia)
    {
        $this->provincia = $this->db->real_escape_string($provincia);
    }
    function getProvincia()
    {
        return $this->provincia;
    }

    function setLocalidad($localidad)
    {
        $this->localidad = $this->db->real_escape_string($localidad);
    }
    function getLocalidad()
    {
        return $this->localidad;
    }
    function setDireccion($direccion)
    {
        $this->direccion = $this->db->real_escape_string($direccion);
    }
    function getDireccion()
    {
        return $this->direccion;
    }
    function setCoste($coste)
    {
        $this->coste = $coste;
    }
    function getCoste()
    {
        return $this->coste;
    }
    function setEstado($estado)
    {
        $this->estado = $estado;
    }
    function getEstado()
    {
        return $this->estado;
    }
    function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }
    function getFecha()
    {
        return $this->fecha;
    }
    function setHora($hora)
    {
        $this->hora = $hora;
    }
    function getHora()
    {
        return $this->hora;
    }

    public function getAll()
    {
        $pedidos = $this->db->query("SELECT * FROM pedidos ORDER BY id DESC");
        return $pedidos;
    }
    public function getOne()
    {
        $pedido = $this->db->query("SELECT * FROM pedidos WHERE id={$this->getId()}");
        return $pedido->fetch_object();
    }
    public function getOneByUser()
    {
        $sql = "SELECT p.id, p.coste FROM pedidos p "
            . "INNER JOIN detalle_pedidos dp ON dp.pedido_id = p.id "
            . " WHERE p.usuario_id = {$this->getUsuario_id()} ORDER BY id DESC LIMIT 1";

        $pedidos = $this->db->query($sql);
        return $pedidos->fetch_object();
    }
    public function getAllByUser()
    {
        $sql = "SELECT p.* FROM pedidos p "
            . " WHERE p.usuario_id = {$this->getUsuario_id()} ORDER BY id DESC";
        $pedido = $this->db->query($sql);
        return $pedido;
    }
    public function getProductoByPedido($id)
    {
        $sql = "SELECT * FROM productos WHERE id IN"
            . "(SELECT producto_id FROM detalle_pedidos WHERE pedido_id = {$id})";

        $sql = "SELECT pr.*, dp.unidades FROM productos pr"
            . " INNER JOIN detalle_pedidos dp ON pr.id=dp.producto_id"
            . " WHERE dp.pedido_id={$id}";
        $productos = $this->db->query($sql);
        return $productos;
    }
    public function save()
    {
        $sql = "INSERT INTO pedidos VALUES(NULL, {$this->getUsuario_id()} , '{$this->getProvincia()}', '{$this->getLocalidad()}', '{$this->getDireccion()}', {$this->getCoste()}, 'confirmado' , CURDATE(), CURTIME());";
        $save = $this->db->query($sql);
        $resultado = false;
        if ($save) {
            $resultado = true;
        }
        return $resultado;
    }
    public function save_detalle()
    {
        $sql = "SELECT LAST_INSERT_ID() as 'pedido';";
        $query = $this->db->query($sql);
        $pedido_id = $query->fetch_object()->pedido;

        foreach ($_SESSION['carrito'] as $elemento) {
            $producto = $elemento['producto'];

            $insertar = "INSERT INTO detalle_pedidos VALUES(NULL, {$pedido_id} , {$producto->id}, {$elemento['unidades']})";

            $save = $this->db->query($insertar);
        }
        $resultado = false;
        if ($save) {
            $resultado = true;
        }
        return $resultado;
    }
    public function updateOne()
    {
        $sql = "UPDATE pedidos SET estado = '{$this->getEstado()}' ";
        $sql .= " WHERE id = {$this->getId()} ";
        
        $save = $this->db->query($sql);
        $resultado = false;
        if ($save) {
            $resultado = true;
        }
        return $resultado;
    }
}
