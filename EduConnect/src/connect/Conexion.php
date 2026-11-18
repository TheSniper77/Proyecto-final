<?php

namespace EduConnect\src\connect;

use PDO;
use PDOException;

class Conexion
{
    private static $host = "localhost";
    private static $usuario = "root";
    private static $password = "";
    private static $bd = "conexionprueba2";

    public static function conectar()
    {
        try {
            $host = self::$host;
            $bd = self::$bd;

            $conexion = new PDO(
                "mysql:host=$host;dbname=$bd;charset=utf8",
                self::$usuario,
                self::$password
            );

            return $conexion;

        } catch (PDOException $e) {
            die("Conexion fallida: " . $e->getMessage());
        }
    }
}
?>