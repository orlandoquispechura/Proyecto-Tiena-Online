<?php

class Database
{

    public static function Conexion()
    {
        $db = new mysqli('localhost', 'root', '', 'tienda');
        $db->query("SET NAMES 'utf8'");
        return $db;
    }
}
