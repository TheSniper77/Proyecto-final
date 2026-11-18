<?php

namespace EduConnect\src\Logica;

require_once __DIR__ . '/../Modelo/Archivo.php';
require_once __DIR__ . '/../Persistencia/ArchivoDAO.php';

use DateTime;
use EduConnect\src\Modelo\Archivo;
use EduConnect\src\Persistencia\ArchivoDAO;

class LogicaArchivo
{
    public static function subirArchivo(
        int $idUsuario,
        string $nombre,
        string $descripcion,
        string $privacidad,
        array $archivoSubido
    ): string
    {
        $archivo = new Archivo(
            0,
            $nombre,
            $descripcion,
            $archivoSubido["type"],
            "",
            $privacidad,
            new DateTime(),
            new DateTime(),
            null
        );

        if (
            ArchivoDAO::subirArchivo(
                $archivo,
                $archivoSubido,
                $idUsuario
            )
        ) {

            return
                "Archivo subido correctamente";

        }

        return
            "No se pudo subir el archivo";
    }

    public static function actualizarArchivo(
        int $idArchivo,
        string $nombre,
        string $descripcion,
        string $privacidad,
        ?array $archivoSubido = null
    ): string
    {
        if (ArchivoDAO::actualizarArchivo($idArchivo, $nombre, $descripcion, $privacidad, $archivoSubido)) {
            return "Archivo actualizado correctamente";
        }

        return "No se pudo actualizar el archivo";
    }

    public static function eliminarArchivo(
        int $idArchivo
    ): bool
    {
        return ArchivoDAO::eliminarArchivo(
            $idArchivo
        );
    }

    public static function obtenerArchivosPublicos(string $filtros): array
{
    return ArchivoDAO::obtenerArchivosPublicos($filtros);
}

public static function obtenerArchivosUsuario(string $filtros, int $idUsuario): array
{
    return ArchivoDAO::obtenerArchivosUsuario($filtros, $idUsuario);
}

}