<?php

require_once __DIR__ .
'/../../config/conexion.php';

class CalendarioDAO
{
    public static function obtenerEventos(
        int $idCalendario
    )
    {
        $conexion =
            Conexion::conectar();

        $consulta =
            $conexion->prepare(
                "SELECT *
                FROM evento
                WHERE id_calendario = :id"
            );

        $consulta->execute([
            "id" => $idCalendario
        ]);

        return $consulta->fetchAll(
            PDO::FETCH_ASSOC
        );
    }
}