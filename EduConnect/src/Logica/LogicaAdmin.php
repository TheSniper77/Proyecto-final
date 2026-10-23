<?php

require_once __DIR__ . '/../Persistencia/AdminDAO.php';

class LogicaAdmin
{
    public static function obtenerUsuarios()
    {
        return AdminDAO::obtenerUsuarios();
    }

    public static function obtenerRoles()
    {
        return AdminDAO::obtenerRoles();
    }

    public static function obtenerCalendarios()
    {
        return AdminDAO::obtenerCalendarios();
    }

    public static function obtenerEventos()
    {
        return AdminDAO::obtenerEventos();
    }

    public static function obtenerApuntes()
    {
        return AdminDAO::obtenerApuntes();
    }

    public static function obtenerArchivos()
    {
        return AdminDAO::obtenerArchivos();
    }
}