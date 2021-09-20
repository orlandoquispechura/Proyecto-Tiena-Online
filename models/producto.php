<?php

class Producto
{

    private $id;
    private $categoria_id;
    private $nombreProducto;
    private $descripcion;
    private $precio;
    private $stock;
    private $oferta;
    private $fecha;
    private $imagen;

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
    function setCategoria_id($categoria_id)
    {
        $this->categoria_id = $categoria_id;
    }
    function getCategoria_id()
    {
        return $this->categoria_id;
    }
    function setNombreProducto($nombreProducto)
    {
        $this->nombreProducto = $this->db->real_escape_string($nombreProducto);
    }
    function getNombreProducto()
    {
        return $this->nombreProducto;
    }
    function setDescripcion($descripcion)
    {
        $this->descripcion = $this->db->real_escape_string($descripcion);
    }
    function getDescripcion()
    {
        return $this->descripcion;
    }
    function setPrecio($precio)
    {
        $this->precio = $this->db->real_escape_string($precio);
    }
    function getPrecio()
    {
        return $this->precio;
    }
    function setStock($stock)
    {
        $this->stock = $stock;
    }
    function getStock()
    {
        return $this->stock;
    }
    function setOferta($oferta)
    {
        $this->oferta = $oferta;
    }
    function getOferta()
    {
        return $this->oferta;
    }
    function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }
    function getFecha()
    {
        return $this->fecha;
    }
    function setImagen($imagen)
    {
        $this->imagen = $imagen;
    }
    function getImagen()
    {
        return $this->imagen;
    }
    public function getAll()
    {
        $productos = $this->db->query("SELECT * FROM productos ORDER BY id DESC");
        return $productos;
    }
    public function getAllCategoria()
    {
        $sql = "SELECT p.*, c.nombre FROM productos p"
        . " INNER JOIN categorias c ON c.id=p.categoria_id"
        . " WHERE p.categoria_id = {$this->getCategoria_id()}"
        . " ORDER BY id DESC";
        
        $productos = $this->db->query($sql);
        
        return $productos;
    }
    public function getRandom($limite)
    {
        $producto = $this->db->query("SELECT * FROM productos ORDER BY RAND() LIMIT $limite");
        
        return $producto;
    }
    public function getOne()
    {
        $producto = $this->db->query("SELECT * FROM productos WHERE id={$this->getId()}");
        return $producto->fetch_object();
    }
    public function save()
    {
        $sql = "INSERT INTO productos VALUES(NULL, {$this->getCategoria_id()} , '{$this->getNombreProducto()}', '{$this->getDescripcion()}', {$this->getPrecio()}, {$this->getStock()}, 'null' , CURDATE(), '{$this->getImagen()}');";
        $save = $this->db->query($sql);
        $resultado = false;
        if ($save) {
            $resultado = true;
        }
        return $resultado;
    }
    public function editar()
    {
        $sql = "UPDATE productos SET nombreProducto='{$this->getNombreProducto()}', descripcion='{$this->getDescripcion()}', precio={$this->getPrecio()}, stock={$this->getStock()}, categoria_id={$this->getCategoria_id()}";
        if ($this->getImagen() != null) {
            $sql .= ", imagen= '{$this->getImagen()}'";
        }
        $sql .= "WHERE id={$this->getId()};";

        $edit = $this->db->query($sql);

        $resultado = false;
        if ($edit) {
            $resultado = true;
        }
        return $resultado;
    }
    public function delete()
    {
        $sql = "DELETE FROM productos WHERE id= {$this->id}";
        $delete = $this->db->query($sql);
        $resultado = false;
        if ($delete) {
            $resultado = true;
        }
        return $resultado;
    }
}
