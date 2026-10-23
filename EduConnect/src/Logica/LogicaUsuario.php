<?php
namespace EduConnect\Logica;

use EduConnect\Modelo\Usuario;
use EduConnect\Persistencia\UsuarioDAO;
use EduConnect\Persistencia\LoginDAO;

class LogicaUsuario
{
    public static function registrar(
        string $nombre,
        string $apellido,
        string $email,
        string $usuario,
        string $password
    )
    {
        if (UsuarioDAO::obtenerUsuario($usuario)) {
            return "El usuario ya existe";
        }

        if (UsuarioDAO::obtenerEmail($email)) {
            return "El email ya está registrado";
        }

        $nuevoUsuario = new Usuario(
            0,          // id_usuario
            0,          // id_rol
            0,          // id_calendario
            $nombre,
            $apellido,
            $email,
            $usuario,
            $password
        );

        if (UsuarioDAO::agregarUsuario($nuevoUsuario)) {

            header("Location: ../../pages/login.php");
            exit();
        }
        return "Error al registrar usuario";
    }

    public static function iniciarSesion(
        string $usuario,
        string $password
    ) {

        $datosUsuario = LoginDAO::buscarUsuario($usuario);

        if (!$datosUsuario) {
            return "Usuario no encontrado";
        }

        if ($password != $datosUsuario["contrasena"]) {
            return "Contraseña incorrecta";
        }

        session_start();

        $_SESSION["id_usuario"] = $datosUsuario["id_usuario"];
        $_SESSION["usuario"] = $datosUsuario["usuario"];
        $_SESSION["rol"] = $datosUsuario["nombre_rol"];

        header("Location: /EduConnect/pages/inicio.php");
        exit();
    }
}