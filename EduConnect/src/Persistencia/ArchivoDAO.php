<?php

namespace EduConnect\src\Persistencia;

require_once __DIR__ . '/../Modelo/Archivo.php';
require_once __DIR__ . '/../connect/Conexion.php';

use EduConnect\src\connect\Conexion;
use finfo;
use DateTime;
use PDO;
use EduConnect\src\Modelo\Archivo;

class ArchivoDAO
{
    public static function subirArchivo(
        Archivo $archivo,
        array $archivoSubido,
        int $idUsuario
    ): bool
    {
        $directorioSubida = __DIR__ . "/../../Subirarchivo/";

        $maxSize = 100 * 1024 * 1024; // 100 MB (104857600 en bytes)

        if ($archivoSubido["error"] !== UPLOAD_ERR_OK
        ) {
            return false;
        }

        if ($archivoSubido["size"] > $maxSize
        ) {
            return false;
        }

        $finfo =new finfo(FILEINFO_MIME_TYPE);

        $tipoMime = $finfo->file($archivoSubido["tmp_name"]);

        $formatosPermitidos = [

            // Imagenes
            "image/jpg" => "jpg",
            "image/jpeg" => "jpeg",
            "image/png" => "png",
            "image/gif" => "gif",

            // Documentos

            // PDF
            "application/pdf" => "pdf",

            // Word
            "application/msword" => "doc",
            "application/vnd.openxmlformats-officedocument.wordprocessingml.document" => "docx",

            // Excel
            "application/vnd.ms-excel" => "xls",
            "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" => "xlsx",

            // PowerPoint
            "application/vnd.ms-powerpoint" => "ppt",
            "application/vnd.openxmlformats-officedocument.presentationml.presentation" => "pptx"
        ];

        if (!isset($formatosPermitidos[$tipoMime])
        ) {
            return false;
        }

        $extension = $formatosPermitidos[$tipoMime];

        $nombreNuevo =bin2hex(random_bytes(16)) . "." . $extension;

        $rutaDestino = $directorioSubida . $nombreNuevo;

        if (!move_uploaded_file( $archivoSubido["tmp_name"], $rutaDestino)
        ) {
            return false;
        }

        $conexion = Conexion::conectar();

        $consulta = $conexion->prepare(
                "INSERT INTO archivo
                (
                    nombre,
                    descripcion,
                    fecha_apertura,
                    fecha_subida,
                    fecha_edicion,
                    tipo_archivo,
                    ruta_archivo,
                    privacidad
                )
                VALUES
                (
                    :nombre,
                    :descripcion,
                    :fecha_apertura,
                    :fecha_subida,
                    :fecha_edicion,
                    :tipo_archivo,
                    :ruta_archivo,
                    :privacidad
                )"
            );

    $resultado = $consulta->execute([

    "nombre" => $archivo->getNombre(),

    "descripcion" => $archivo->getDescripcion(),

    "fecha_apertura" => $archivo->getFechaApertura()->format("Y-m-d H:i:s"),

    "fecha_subida" => $archivo->getFechaSubida()->format("Y-m-d H:i:s"),

    "fecha_edicion" => null,

    "tipo_archivo" => $archivo->getTipoArchivo(),

    "ruta_archivo" => $rutaDestino,

    "privacidad" => $archivo->getPrivacidad()
    ]);

    if (!$resultado) {
        return false;
    }

    $idArchivo = $conexion->lastInsertId();

    $consultaAdministra = $conexion->prepare(
        "INSERT INTO administra
        (
            id_usuario,
            id_archivo
            )
        VALUES
        (
            :id_usuario,
            :id_archivo
        )"
    );

    return $consultaAdministra->execute([

    "id_usuario" => $idUsuario,

    "id_archivo" => $idArchivo

        ]);
    }

    public static function eliminarArchivo(
        int $idArchivo
    ): bool
    {
    $conexion = Conexion::conectar();

    $consulta = $conexion->prepare(
        "DELETE FROM administra
         WHERE id_archivo = :id"
    );

    $consulta->execute([
        "id" => $idArchivo
    ]);

    $consulta = $conexion->prepare(
        "DELETE FROM archivo
         WHERE id_archivo = :id"
    );

    return $consulta->execute(["id" => $idArchivo]);
}

    // Para el inicio, solo archivos publicos
public static function obtenerArchivosPublicos(string $filtro): array
{
    $conexion = Conexion::conectar();

    $consulta = $conexion->prepare(
        "SELECT a.*, u.usuario
         FROM archivo a
         INNER JOIN administra ad ON a.id_archivo = ad.id_archivo
         INNER JOIN usuario u ON ad.id_usuario = u.id_usuario
         WHERE a.privacidad = 'publico'
         AND (a.nombre LIKE :filtro OR a.descripcion LIKE :filtro)
         ORDER BY a.fecha_subida DESC"
    );

    $consulta->execute(["filtro" => "%" . $filtro . "%"]);
    return $consulta->fetchAll(PDO::FETCH_ASSOC);
}

// Para mis archivos se mustran los publicos y privados
public static function obtenerArchivosUsuario(string $filtro, int $idUsuario): array
{
    $conexion = Conexion::conectar();

    $consulta = $conexion->prepare(
        "SELECT a.*
         FROM archivo a
         INNER JOIN administra ad ON a.id_archivo = ad.id_archivo
         WHERE ad.id_usuario = :id_usuario
         AND (a.nombre LIKE :filtro OR a.descripcion LIKE :filtro)
         ORDER BY a.fecha_subida DESC"
    );

    $consulta->execute(["id_usuario" => $idUsuario,"filtro" => "%" . $filtro . "%"]);

    $filas = $consulta->fetchAll(PDO::FETCH_ASSOC);
    $archivos = [];

    foreach ($filas as $fila) {
        $archivos[] = new Archivo(
            (int)$fila["id_archivo"],
            $fila["nombre"],
            $fila["descripcion"],
            $fila["tipo_archivo"],
            $fila["ruta_archivo"],
            $fila["privacidad"] ?? "privado",
            new DateTime($fila["fecha_apertura"]),
            new DateTime($fila["fecha_subida"]),
            !empty($fila["fecha_edicion"]) ? new DateTime($fila["fecha_edicion"]) : null
        );
    }

    return $archivos;
}

public static function actualizarArchivo(
        int $idArchivo,
        string $nombre,
        string $descripcion,
        string $privacidad,
        ?array $archivoSubido = null
    ): bool
    {
        $conexion = Conexion::conectar();
        $fechaEdicion = (new DateTime())->format("Y-m-d H:i:s");

        // Verificamos si se adjuntó un archivo nuevo en la edición
        if (!empty($archivoSubido) && $archivoSubido["error"] === UPLOAD_ERR_OK) {
            $extension = pathinfo($archivoSubido["name"], PATHINFO_EXTENSION);
            $nombreArchivoUnico = uniqid() . "." . $extension;
            $rutaDestino = "../Subirarchivo/" . $nombreArchivoUnico;

            if (move_uploaded_file($archivoSubido["tmp_name"], $rutaDestino)) {
                $consulta = $conexion->prepare(
                    "UPDATE archivo
                     SET nombre = :nombre,
                         descripcion = :descripcion,
                         privacidad = :privacidad,
                         tipo_archivo = :tipo_archivo,
                         ruta_archivo = :ruta_archivo,
                         fecha_edicion = :fecha_edicion
                     WHERE id_archivo = :id_archivo"
                );

                return $consulta->execute([
                    "nombre" => $nombre,
                    "descripcion" => $descripcion,
                    "privacidad" => $privacidad,
                    "tipo_archivo" => $archivoSubido["type"],
                    "ruta_archivo" => $rutaDestino,
                    "fecha_edicion" => $fechaEdicion,
                    "id_archivo" => $idArchivo
                ]);
            }
        }

        // Si NO se subió un archivo nuevo, actualizamos solo los textos y la visibilidad
        $consulta = $conexion->prepare(
            "UPDATE archivo
             SET nombre = :nombre,
                 descripcion = :descripcion,
                 privacidad = :privacidad,
                 fecha_edicion = :fecha_edicion
             WHERE id_archivo = :id_archivo"
        );

        return $consulta->execute([
            "nombre" => $nombre,
            "descripcion" => $descripcion,
            "privacidad" => $privacidad,
            "fecha_edicion" => $fechaEdicion,
            "id_archivo" => $idArchivo
        ]);
    }

}