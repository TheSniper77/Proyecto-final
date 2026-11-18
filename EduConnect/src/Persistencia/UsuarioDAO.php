<?php


namespace EduConnect\src\Persistencia;

use EduConnect\src\connect\Conexion;
use EduConnect\src\Modelo\Usuario;
use PDO;

class UsuarioDAO
{
    public static function obtenerUsuario(string $usuario)
    {
        $conexion = Conexion::conectar();

        $consulta = $conexion->prepare(
            "SELECT *
            FROM usuario
            WHERE usuario = :usuario"
        );

        $consulta->execute([
            'usuario' => $usuario
        ]);

        return $consulta->fetch(PDO::FETCH_ASSOC);
    }

    public static function obtenerEmail(string $email)
    {
        $conexion = Conexion::conectar();

        $consulta = $conexion->prepare(
            "SELECT *
            FROM usuario
            WHERE email = :email"
        );

        $consulta->execute([
            'email' => $email
        ]);

        return $consulta->fetch(PDO::FETCH_ASSOC);
    }

    public static function agregarUsuario(Usuario $usuario): bool
    {
        $conexion = Conexion::conectar();

        // Contar usuarios

        $sqlCantidad = "SELECT COUNT(*) AS total
                        FROM usuario";

        $resultado = $conexion
            ->query($sqlCantidad)
            ->fetch(PDO::FETCH_ASSOC);

        $totalUsuarios = $resultado['total'];

        // Asignar rol
        if ($totalUsuarios == 0) {
            $idRol = 1; // admin
        } else {
            $idRol = 2; // usuario
        }

        // Crear calendario
        $consultaCalendario = $conexion->prepare(
            "INSERT INTO calendario
            (titulo, descripcion)
            VALUES
            (:titulo, :descripcion)"
        );

        $consultaCalendario->execute([
            'titulo' => 'Calendario Personal',
            'descripcion' => 'Calendario creado automáticamente'
        ]);

        $idCalendario = $conexion->lastInsertId();

        // Crear usuario
        $consulta = $conexion->prepare(
            "INSERT INTO usuario
            (
                id_rol,
                id_calendario,
                nombre,
                apellido,
                usuario,
                contrasena,
                email
            )
            VALUES
            (
                :id_rol,
                :id_calendario,
                :nombre,
                :apellido,
                :usuario,
                :contrasena,
                :email
            )"
        );

        return $consulta->execute([
            'id_rol' => $idRol,
            'id_calendario' => $idCalendario,
            'nombre' => $usuario->getNombre(),
            'apellido' => $usuario->getApellido(),
            'usuario' => $usuario->getUsuario(),
            'contrasena' => $usuario->getPassword(),
            'email' => $usuario->getEmail()
        ]);
    }

    public static function buscarUsuario(string $usuario)
    {
        $conexion = Conexion::conectar();

        $consulta = $conexion->prepare(
            "SELECT u.*,
                    r.nombre_rol
            FROM usuario u
            INNER JOIN rol r
            ON u.id_rol = r.id_rol
            WHERE u.usuario = :usuario"
        );

        $consulta->execute([
            'usuario' => $usuario
        ]);

        return $consulta->fetch(PDO::FETCH_ASSOC);
    }
}