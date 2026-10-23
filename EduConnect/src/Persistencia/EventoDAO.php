<?php

namespace EduConnect\Persistencia;

use PDO;
use DateTime;
use EduConnect\Modelo\Evento;

require_once __DIR__ . '/../../config/conexion.php';

class EventoDAO
{
    public static function obtenerEventos(
        int $idCalendario
    ): array
    {
        $conexion = \Conexion::conectar();

        $consulta = $conexion->prepare(
            "SELECT *
             FROM evento
             WHERE id_calendario = :id"
        );

        $consulta->execute([
            'id' => $idCalendario
        ]);

        $eventos = [];

        while($fila = $consulta->fetch(PDO::FETCH_ASSOC))
        {
            $eventos[] = new Evento(
                $fila["id_evento"],
                $fila["id_calendario"],
                $fila["nombre"],
                new DateTime($fila["fecha"]),
                $fila["fecha_fin"]
                    ? new DateTime($fila["fecha_fin"])
                    : null
            );
        }

        return $eventos;
    }

    public static function crearEvento(
        Evento $evento
    ): bool
    {
        $conexion = \Conexion::conectar();

        $consulta = $conexion->prepare(
            "INSERT INTO evento
            (
                id_calendario,
                nombre,
                fecha,
                fecha_fin
            )
            VALUES
            (
                :id_calendario,
                :nombre,
                :fecha,
                :fecha_fin
            )"
        );

        return $consulta->execute([
            'id_calendario' =>
                $evento->getIdCalendario(),

            'nombre' =>
                $evento->getNombre(),

            'fecha' =>
                $evento->getFecha()
                    ->format('Y-m-d H:i:s'),

            'fecha_fin' =>
                $evento->getFechaFin()
                    ?->format('Y-m-d H:i:s')
        ]);
    }
}