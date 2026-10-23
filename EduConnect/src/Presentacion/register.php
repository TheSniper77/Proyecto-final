<?php

require_once __DIR__ . '/../../config/autoload.php';
use EduConnect\Logica\LogicaUsuario;

$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nombre = trim($_POST["nombre"] ?? "");
    $apellido = trim($_POST["apellido"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $usuario = trim($_POST["usuario"] ?? "");
    $password = trim($_POST["password"] ?? "");

    if (
        empty($nombre) ||
        empty($apellido) ||
        empty($email) ||
        empty($usuario) ||
        empty($password)
    ) {

        $mensaje = "Todos los campos son obligatorios";

    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $mensaje = "Email inválido";

    } elseif (strlen($password) < 8) {

        $mensaje = "La contraseña debe tener mínimo 8 caracteres";

    } else {

        $mensaje = LogicaUsuario::registrar(
            $nombre,
            $apellido,
            $email,
            $usuario,
            $password,
        );
    }
    header("Location: ../../index.php");
            exit();
}
?>