<?php
namespace EduConnect\src\Persistencia;
use EduConnect\src\connect\Conexion;

use PDO;

class CalendarioDAO
{
    public static function obtenerEventos(
        int $idCalendario
    )
    {
        $conexion = Conexion::conectar();

        $consulta = $conexion->prepare(
                "SELECT *
                FROM evento
                WHERE id_calendario = :id"
            );

        $consulta->execute(["id" => $idCalendario]);

        return $consulta->fetchAll(
            PDO::FETCH_ASSOC
        );
    }
}