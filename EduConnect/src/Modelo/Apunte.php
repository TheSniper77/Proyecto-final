<?php
namespace EduConnect\src\Modelo;
use DateTime;

class Apunte {
    private int $id_usuario;
    private int $id_apunte;
    private string $nombre;
    private string $contenido;
    private DateTime $fechaCreacion;
    private ?DateTime $fechaActualizacion;

    public function __construct(
        int $id_usuario,
        int $id_apunte, 
        string $nombre, 
        string $contenido, 
        DateTime $fechaCreacion, 
        ?DateTime $fechaActualizacion
    ){
        $this->id_usuario=$id_usuario;
        $this->id_apunte = $id_apunte;
        $this->nombre = $nombre;
        $this->contenido = $contenido;
        $this->fechaCreacion = $fechaCreacion;
        $this->fechaActualizacion = $fechaActualizacion;
    }

    // Getters

    public function getIdUsuario(): int {
        return $this->id_usuario;
    }
    public function getIdApunte(): int {
        return $this->id_apunte;
    }

    public function getNombre(): string {
        return $this->nombre;
    }

    public function getFechaCreacion(): DateTime {
        return $this->fechaCreacion;
    }

    public function getFechaActualizacion(): ?DateTime {
        return $this->fechaActualizacion;
    }

    public function getContenido(): string {
        return $this->contenido;
    }

    // Setters

    public function setIdUsuario(int $id_usuario): void{
        $this->id_usuario = $id_usuario;
    }
    public function setIdApunte(int $id_apunte): void {
        $this->id_apunte = $id_apunte;
    }

    public function setNombre(string $nombre): void {
        $this->nombre = $nombre;
    }

    public function setFechaCreacion(DateTime $fechaCreacion): void {
        $this->fechaCreacion = $fechaCreacion;
    }

    public function setFechaActualizacion(?DateTime $fechaActualizacion): void {
        $this->fechaActualizacion = $fechaActualizacion;
    }

    public function setContenido (string $contenido): void {
        $this->contenido = $contenido;
    }

}
?>