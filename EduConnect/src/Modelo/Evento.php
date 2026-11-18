<?php

namespace EduConnect\src\Modelo;

use DateTime;

class Evento
{
    private int $id_evento;
    private int $id_calendario;
    private string $nombre;
    private DateTime $fecha;
    private ?DateTime $fecha_fin;

    public function __construct(
        int $id_evento,
        int $id_calendario,
        string $nombre,
        DateTime $fecha,
        ?DateTime $fecha_fin
    ){
        $this->id_evento = $id_evento;
        $this->id_calendario = $id_calendario;
        $this->nombre = $nombre;
        $this->fecha = $fecha;
        $this->fecha_fin = $fecha_fin;
    }

    // Getters  

    public function getIdEvento(): int{
        return $this->id_evento;
    }

    public function getIdCalendario(): int{
        return $this->id_calendario;
    }

    public function getNombre(): string{
        return $this->nombre;
    }

    public function getFecha(): DateTime{
        return $this->fecha;
    }

    public function getFechaFin(): ?DateTime{
        return $this->fecha_fin;
    }

    //Setters

    public function setIdEvento(int $id_evento): void {
        $this->id_evento=$id_evento;
    }

    public function setIdCalendario(int $id_calendario): void {
        $this->id_calendario=$id_calendario;
    }

    public function setNombre(string $nombre): void {
        $this->nombre=$nombre;
    }

    public function setFecha(DateTime $fecha): void {
        $this->fecha=$fecha;
    }

    public function setFecha_Fin(?DateTime $fecha_fin): void {
        $this->fecha_fin=$fecha_fin;
    }

}