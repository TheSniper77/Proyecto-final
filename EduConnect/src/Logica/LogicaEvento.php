<?php

namespace EduConnect\src\Logica;

use DateTime;
use EduConnect\src\Modelo\Evento;
use EduConnect\src\Persistencia\EventoDAO;

class LogicaEvento
{
    public static function crearEvento(
        int $idCalendario,
        string $nombre,
        string $fecha,
        ?string $fechaFin
    ): string
    {
        $evento = new Evento(
            0,
            $idCalendario,
            $nombre,
            new DateTime($fecha),
            !empty($fechaFin)
                ? new DateTime($fechaFin)
                : null
        );

        if (EventoDAO::crearEvento($evento))
        {
            return "Evento creado correctamente";
        }

        return "No se pudo crear el evento";
    }

    public static function eliminarEvento(
    int $idEvento
    ): bool
    {
        return EventoDAO::eliminarEvento(
            $idEvento
        );
    }

    public static function actualizarEvento(
        int $idEvento,
        string $nombre,
        string $fecha,
        ?string $fechaFin
    ): bool
    {
        return EventoDAO::actualizarEvento(
            $idEvento,
            $nombre,
            $fecha,
            $fechaFin
        );
    }
}