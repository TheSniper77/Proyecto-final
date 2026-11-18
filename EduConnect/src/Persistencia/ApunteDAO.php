<?php

namespace EduConnect\src\Persistencia;

use EduConnect\src\Modelo\Apunte;
use EduConnect\src\connect\Conexion;
use PDO;

class ApunteDAO
{
    public static function crearApunte(
        Apunte $apunte
    ): bool
    {
        $conexion = Conexion::conectar();

        $consulta = $conexion->prepare(
            "INSERT INTO apunte
            (
                id_usuario,
                id_apunte,
                nombre,
                contenido,
                fecha_creacion,
                fecha_actualizacion
            )
            VALUES
            (
                :id_usuario,
                :id_apunte,
                :nombre,
                :contenido,
                :fecha_creacion,
                :fecha_actualizacion
            )"
        );

        return $consulta->execute([
            'id_usuario' => $apunte->getIdUsuario(),
            'id_apunte' => $apunte->getIdApunte(),
            'nombre' => $apunte->getNombre(),
            'contenido' => $apunte->getContenido(),
            'fecha_creacion' => $apunte->getFechaCreacion()->format('Y-m-d H:i:s'),
            'fecha_actualizacion' => null
        ]);
    }

    public static function obtenerApuntes(
    int $idUsuario
): array
{
    $conexion = Conexion::conectar();

    $consulta = $conexion->prepare(
        "SELECT *
         FROM apunte
         WHERE id_usuario = :id"
    );

    $consulta->execute([
        'id' => $idUsuario
    ]);

    return $consulta->fetchAll(PDO::FETCH_ASSOC);
}

    public static function eliminarApunte(
        int $idApunte
    ): bool
    {
        $conexion = Conexion::conectar();

        $consulta = $conexion->prepare(
            "DELETE FROM apunte
            WHERE id_apunte = :id"
        );
        return $consulta->execute([
            "id" => $idApunte
        ]);
    }

    public static function actualizarApunte(
        int $idApunte,
        string $nombre,
        string $contenido
    ): bool
    {
        $conexion = Conexion::conectar();

        $consulta = $conexion->prepare(
            "UPDATE apunte
            SET
                nombre = :nombre,
                contenido = :contenido,
                fecha_actualizacion = NOW()
            WHERE id_apunte = :id_apunte"
        );

        return $consulta->execute([
            "id_apunte" => $idApunte,
            "nombre" => $nombre,
            "contenido" => $contenido
        ]);
    }
}