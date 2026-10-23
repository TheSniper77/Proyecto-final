<?php
namespace EduConnect\Modelo;

class Rol {
    private int $id_rol;
    private string $nombre;

    public function __construct(int $id_rol, string $nombre) {
        $this->id_rol = $id_rol;
        $this->nombre = $nombre;
    }

    // Getters
    public function getIdRol(): int {
        return $this->id_rol;
    }

    public function getNombre(): string {
        return $this->nombre;
    }

    // Setters
    public function setIdRol(int $id_rol): void {
        $this->id_rol = $id_rol;
    }

    public function setNombre(string $nombre): void {
        $this->nombre = $nombre;
    }
}
?>