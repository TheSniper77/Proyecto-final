<?php
namespace EduConnect\Modelo;
use DateTime;
class Calendario {
    private int $id_calendario;
    private string $titulo;
    private string $descripcion;
    private DateTime $fecha;

public function __construct(int $id_calendario, string $titulo, string $descripcion, DateTime $fecha) {
    $this ->id_calendario = $id_calendario;
    $this ->titulo = $titulo;
    $this ->descripcion = $descripcion;
    $this ->fecha = $fecha;
}

// Getters
public function getIdCalendario(): int {
    return $this->id_calendario;
}

public function getTitulo(): string {
    return $this->titulo;
}

public function getDescripcion(): string {
    return $this->descripcion;
}

public function getFecha(): DateTime {
    return $this->fecha;
}

// Setters

public function setIdCalendario(int $id_calendario): void {
    $this->id_calendario = $id_calendario;
}

public function setTitulo(string $titulo): void {
    $this->titulo = $titulo;
}

public function setDescripcion(string $descripcion): void {
    $this->descripcion = $descripcion;
}

public function setFecha(DateTime $fecha): void {
    $this->fecha = $fecha;
}
}
?>