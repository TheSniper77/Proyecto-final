<?php

namespace EduConnect\Modelo;

class Usuario {
    private int $id_usuario;
    private int $id_rol;
    private int $id_calendario;
    private string $nombre;
    private string $apellido;
    private string $email;
    private string $usuario;
    private string $password;

    public function __construct(int $id_usuario, int $id_rol, int $id_calendario, string $nombre, string $apellido, string $email, string $usuario, string $password) {
    $this->id_usuario = $id_usuario;
    $this->id_rol = $id_rol;
    $this->id_calendario = $id_calendario;
    $this->nombre = $nombre;
    $this->apellido = $apellido;
    $this->email = $email;
    $this->usuario = $usuario;
    $this->password = $password;
}

// Getters
public function getIdUsuario(): int {
    return $this->id_usuario;
}
public function getIdRol(): int {
    return $this->id_rol;
}
public function getIdCalendario(): int {
    return $this->id_calendario;
}
public function getNombre(): string {
    return $this->nombre;
}
public function getApellido(): string {
    return $this->apellido;
}

public function getEmail(): string {
    return $this->email;
}

public function getUsuario(): string {
    return $this->usuario;
}

public function getPassword(): string {
    return $this->password;
}

// Setters
public function setIdUsuario(Int $id_usuario): void {
   $this->id_usuario = $id_usuario;
}

public function setIdRol(Int $id_rol): void {
    $this->id_rol = $id_rol;
}

public function setIdCalendario(Int $id_calendario): void {
    $this->id_calendario = $id_calendario;
}

public function setNombre(String $nombre): void {
    $this->nombre = $nombre;
}

public function setApellido(String $apellido): void{
   $this->apellido = $apellido;
}

public function setEmail(String $email): void{
    $this->email = $email;
}

public function setUsuario(String $usuario): void{
    $this->usuario = $usuario;
}

public function setPassword(String $password): void{
    $this->password = $password;
}

}
?>