<?php

require_once __DIR__ . '/../../config/autoload.php';
use EduConnect\Logica\LogicaUsuario;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $usuario = trim(
        $_POST["usuario"] ?? ""
    );

    $password = trim(
        $_POST["password"] ?? ""
    );

    if (
        empty($usuario) ||
        empty($password)
    ) {

        echo "Complete todos los campos";
        return;
    }

    $resultado =
        LogicaUsuario::iniciarSesion(
            $usuario,
            $password
        );

    echo $resultado;
}