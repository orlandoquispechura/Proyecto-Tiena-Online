<?php


class Utilidades
{

    public static function eliminarSession($name)
    {
        if (isset($_SESSION[$name])) {
            $_SESSION[$name] = null;
            unset($_SESSION[$name]);
        }
        return $name;
    }

    public static function isAdmin()
    {

        if (!isset($_SESSION['admin'])) {
            header("Location:" . base_url);
        } else {
            return true;
        }
    }
    public static function isIdentificado()
    {

        if (!isset($_SESSION['identificar'])) {
            header("Location:" . base_url);
        } else {
            return true;
        }
    }
    public static function showCategorias()
    {
        require_once 'models/categoria.php';
        $categoria = new Categoria();
        $categorias = $categoria->getAll();
        return $categorias;
    }
    public static function contarProductos()
    {
        $contar = array(
            'count' => 0,
            'total' => 0
        );

        if (isset($_SESSION['carrito'])) {
            $contar['count'] = count($_SESSION['carrito']);
            foreach ($_SESSION['carrito'] as $producto) {
                $contar['total'] += $producto['precio'] * $producto['unidades'];
            }
        }
        return $contar;
    }

    public static function showEstado($status)
    {
        $value = "Pendiente";
        if ($status == 'confirmado') {
            $value = "Pendiente";
        } elseif ($status == 'preparation') {
            $value = "En preparación";
        } elseif ($status == 'ready') {
            $value = "Preparado para enviar";
        } elseif ($status == 'sended') {
            $value = "Enviado";
        }
        return $value;
    }
}
