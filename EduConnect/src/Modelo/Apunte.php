<?php
namespace EduConnect\Modelo;
use DateTime;

class Apunte {
    private int $id_archivo;
    private string $nombre;
    private string $contenido;
    private DateTime $fechaCreacion;
    private DateTime $fechaActualizacion;

    public function __construct(int $id_archivo, string $nombre, string $contenido, DateTime $fechaCreacion, DateTime $fechaActualizacion) {
        $this->id_archivo = $id_archivo;
        $this->nombre = $nombre;
        $this->contenido = $contenido;
        $this->fechaCreacion = $fechaCreacion;
        $this->fechaActualizacion = $fechaActualizacion;
    }

    // Getters
    public function getIdArchivo(): int {
        return $this->id_archivo;
    }

    public function getNombre(): string {
        return $this->nombre;
    }

    public function getFechaCreacion(): DateTime {
        return $this->fechaCreacion;
    }

    public function getFechaActualizacion(): DateTime {
        return $this->fechaActualizacion;
    }

    public function getContenido(): string {
        return $this->contenido;
    }

    // Setters
    public function setIdArchivo(int $id_archivo): void {
        $this->id_archivo = $id_archivo;
    }

    public function setNombre(string $nombre): void {
        $this->nombre = $nombre;
    }

    public function setFechaCreacion(DateTime $fechaCreacion): void {
        $this->fechaCreacion = $fechaCreacion;
    }

    public function setFechaActualizacion(DateTime $fechaActualizacion): void {
        $this->fechaActualizacion = $fechaActualizacion;
    }

    public function setContenido (string $contenido): void {
        $this->contenido = $contenido;
    }

}
?>