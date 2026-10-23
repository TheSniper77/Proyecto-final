<?php

namespace EduConnect\Logica;

require_once __DIR__ . '/../Modelo/Evento.php';
require_once __DIR__ . '/../Persistencia/EventoDAO.php';

use DateTime;
use EduConnect\Modelo\Evento;
use EduConnect\Persistencia\EventoDAO;

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

        if (EventoDAO::crearEvento($evento)) {
            return "Evento creado correctamente";
        }

        return "No se pudo crear el evento";
    }
}