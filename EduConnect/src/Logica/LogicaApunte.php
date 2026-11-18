<?php

namespace EduConnect\src\Logica;
require_once __DIR__ . '/../Modelo/Apunte.php';
require_once __DIR__ . '/../Persistencia/ApunteDAO.php';

use DateTime;
use EduConnect\src\Modelo\Apunte;
use EduConnect\src\Persistencia\ApunteDAO;

class LogicaApunte
{
    public static function crearApunte(
        int $idUsuario,
        string $nombre,
        string $contenido
    ): string {
        $apunte = new Apunte(
            $idUsuario,
            0, // id_apunte
            $nombre,
            $contenido,
            new DateTime(),
            null
        );

        if (ApunteDAO::crearApunte($apunte)) {
            return "Apunte creado correctamente";
        }

        return "No se pudo crear el apunte";
    }

    public static function obtenerApuntes(
        int $idUsuario
        ): array {
        return ApunteDAO::obtenerApuntes(
            $idUsuario
        );
    }

    public static function eliminarApunte(
            int $idApunte
            ): bool
        {
        return ApunteDAO::eliminarApunte(
            $idApunte
        );
    }

    public static function actualizarApunte(
        int $idApunte,
        string $nombre,
        string $contenido
        ): bool
        {
        return ApunteDAO::actualizarApunte(
            $idApunte,
            $nombre,
            $contenido
        );
    }
}