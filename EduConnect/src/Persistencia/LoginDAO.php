<?php
namespace EduConnect\Persistencia;
use EduConnect\Persistencia\Conexion;
use PDO;
class LoginDAO
{
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