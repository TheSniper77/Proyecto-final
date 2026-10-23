<?php
namespace EduConnect\Modelo;
use DateTime;
class Archivo {
    private int $id_archivo;
    private string $nombre;
    private string $tipoArchivo;
    private DateTime $fechaApertura;
    private DateTime $fechaSubida;
    

public function __construct(int $id_archivo, string $nombre, string $tipoArchivo, DateTime $fechaApertura, DateTime $fechaSubida, DateTime $fechaEdicion) {
    $this->id_archivo = $id_archivo;
    $this->nombre = $nombre;
    $this->tipoArchivo = $tipoArchivo;
    $this->fechaApertura = $fechaApertura;
    $this->fechaSubida = $fechaSubida;
}

// Getters
public function getIdArchivo(): int {
    return $this->id_archivo;
}

public function getNombre(): string {
    return $this->nombre;
}

public function getTipoArchivo(): string {
    return $this->tipoArchivo;
}

public function getFechaApertura(): DateTime {
    return $this->fechaApertura;
}

public function getFechaSubida(): DateTime {
    return $this->fechaSubida;
}

// Setters
public function setIdArchivo(int $id_archivo): void {
    $this->id_archivo = $id_archivo;
}

public function setNombre(String $nombre): void {
    $this->nombre = $nombre;
}

public function setTipoArchivo(String $tipoArchivo): void {
    $this->tipoArchivo = $tipoArchivo;
}

public function setFechaApertura(DateTime $fechaApertura): void {
    $this->fechaApertura = $fechaApertura;
}

public function setFechaSubida(DateTime $fechaSubida): void {
    $this->fechaSubida = $fechaSubida;
}

}
?>