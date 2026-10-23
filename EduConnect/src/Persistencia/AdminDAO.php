<?php

use EduConnect\Persistencia\Conexion;

class AdminDAO
{
    public static function obtenerUsuarios()
    {
        $conexion = Conexion::conectar();

        return $conexion->query(
            "SELECT *
            FROM usuario"
        )->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function obtenerRoles()
    {
        $conexion = Conexion::conectar();

        return $conexion->query(
            "SELECT *
            FROM rol"
        )->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function obtenerCalendarios()
    {
        $conexion = Conexion::conectar();

        return $conexion->query(
            "SELECT *
            FROM calendario"
        )->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function obtenerEventos()
    {
        $conexion = Conexion::conectar();

        return $conexion->query(
            "SELECT *
            FROM evento"
        )->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function obtenerApuntes()
    {
        $conexion = Conexion::conectar();

        return $conexion->query(
            "SELECT *
            FROM apunte"
        )->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function obtenerArchivos()
    {
        $conexion = Conexion::conectar();

        return $conexion->query(
            "SELECT *
            FROM archivo"
        )->fetchAll(PDO::FETCH_ASSOC);
    }
}