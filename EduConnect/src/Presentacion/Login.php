<?php

require_once __DIR__ . '/../../config/autoload.php';

use EduConnect\src\Logica\LogicaUsuario;
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

    if ($resultado =="OK"){

        header("Location: /EduConnect/pages/inicio.php");
        exit();
    } else {
            header("Location: /EduConnect/pages/login.php?error=".$resultado);
            exit();
        }
}