<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/../Logica/LogicaApunte.php';

use EduConnect\src\Logica\LogicaApunte;

$mensaje = "";
$idUsuario = $_SESSION["id_usuario"] ?? null;

if ($idUsuario) {

    // Mostrar mensaje después de guardar
    if (isset($_SESSION["mensaje_apunte"])) {
        $mensaje = $_SESSION["mensaje_apunte"];
        unset($_SESSION["mensaje_apunte"]);
    }

    // Eliminar
    if (isset($_GET["eliminar"])) {

        LogicaApunte::eliminarApunte(
            (int)$_GET["eliminar"]
        );

    }

    // Crear o Editar
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $accion = $_POST["accion"] ?? "crear";

        if ($accion === "crear") {

        $nombre = trim($_POST["nombre"]);
        $contenido = trim($_POST["contenido"]);

            $_SESSION["mensaje_apunte"] = LogicaApunte::crearApunte(
                $idUsuario,
                $nombre,
                $contenido
        );
            header("Location: /EduConnect/pages/apunte.php");
            exit();
        }

        if ($accion === "editar") {

        LogicaApunte::actualizarApunte(
            (int)$_POST["id_apunte"],
            trim($_POST["nombre"]),
            trim($_POST["contenido"])
        );
            $_SESSION["mensaje_apunte"] = "Apunte actualizado correctamente";
            header("Location: /EduConnect/pages/apunte.php");
            exit();
        }
    }

    // Recargar apuntes actualizados
    $apuntes = LogicaApunte::obtenerApuntes(
        $idUsuario
    );

} else {

    $apuntes = [];

}