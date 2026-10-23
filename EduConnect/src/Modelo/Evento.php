<?php

namespace EduConnect\Modelo;

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

    public function getIdEvento(): int
    {
        return $this->id_evento;
    }

    public function getIdCalendario(): int
    {
        return $this->id_calendario;
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function getFecha(): DateTime
    {
        return $this->fecha;
    }

    public function getFechaFin(): ?DateTime
    {
        return $this->fecha_fin;
    }
}