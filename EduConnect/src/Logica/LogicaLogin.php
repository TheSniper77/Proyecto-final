<?php

require_once __DIR__ . '/../Persistencia/LoginDAO.php';
use EduConnect\Persistencia\LoginDAO;

class LogicaLogin
{
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
        $_SESSION["id_calendario"] = $datosUsuario["id_calendario"];
        $_SESSION["usuario"] = $datosUsuario["usuario"];
        $_SESSION["rol"] = $datosUsuario["nombre_rol"];

        header("Location: /EduConnect/pages/inicio.php");
        exit();
    }
}