<?php
namespace EduConnect\src\Modelo;
use DateTime;
class Archivo {
    private int $id_archivo;
    private string $nombre;
    private string $descripcion;
    private string $tipoArchivo;
    private string $rutaArchivo;
    private string $privacidad;
    private DateTime $fechaApertura;
    private DateTime $fechaSubida;
    private ?DateTime $fechaEdicion;
    

public function __construct(int $id_archivo, string $nombre, string $descripcion, string $tipoArchivo, string $ruta_archivo, string $privacidad, DateTime $fechaApertura, DateTime $fechaSubida, ?DateTime $fechaEdicion) {
    $this->id_archivo = $id_archivo;
    $this->nombre = $nombre;
    $this->descripcion = $descripcion;
    $this->tipoArchivo = $tipoArchivo;
    $this->rutaArchivo = $ruta_archivo;
    $this->privacidad = $privacidad;
    $this->fechaApertura = $fechaApertura;
    $this->fechaSubida = $fechaSubida;
    $this->fechaEdicion = $fechaEdicion;
}

// Getters
public function getIdArchivo(): int {
    return $this->id_archivo;
}

public function getNombre(): string {
    return $this->nombre;
}

public function getDescripcion(): string{
    return $this->descripcion;
}

public function getTipoArchivo(): string {
    return $this->tipoArchivo;
}

public function getRutaArchivo(): string {
    return $this->rutaArchivo;
}

public function getPrivacidad(): string {
    return $this->privacidad;
}

public function getFechaApertura(): DateTime {
    return $this->fechaApertura;
}

public function getFechaSubida(): DateTime {
    return $this->fechaSubida;
}

public function getFechaEdicion(): ?DateTime {
    return $this->fechaEdicion;
}

// Setters
public function setIdArchivo(int $id_archivo): void {
    $this->id_archivo = $id_archivo;
}

public function setNombre(String $nombre): void {
    $this->nombre = $nombre;
}

public function setDescripcion(String $descripcion): void {
    $this->descripcion = $descripcion;
}

public function setTipoArchivo(String $tipoArchivo): void {
    $this->tipoArchivo = $tipoArchivo;
}

public function setRutaArchivo(String $ruta_archivo): void {
    $this->rutaArchivo = $ruta_archivo;
}

public function setPrivacidad(String $privacidad): void {
    $this->privacidad = $privacidad;
}

public function setFechaApertura(DateTime $fechaApertura): void {
    $this->fechaApertura = $fechaApertura;
}

public function setFechaSubida(DateTime $fechaSubida): void {
    $this->fechaSubida = $fechaSubida;
}

public function setFechaEdicion(?DateTime $fechaEdicion): void {
    $this->fechaEdicion = $fechaEdicion;
}

}
?>