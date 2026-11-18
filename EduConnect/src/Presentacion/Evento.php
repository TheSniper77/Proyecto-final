<?php

require_once dirname(__DIR__, 2) . '/config/autoload.php';
session_start();

require_once __DIR__ . '/../Logica/LogicaEvento.php';

use EduConnect\src\Logica\LogicaEvento;

if ($_SERVER["REQUEST_METHOD"] === "POST")
{
    $accion = $_POST["accion"] ?? "";

    if ($accion === "crear")
    {
        LogicaEvento::crearEvento(
            $_SESSION["id_calendario"],
            trim($_POST["nombre"]),
            trim($_POST["fecha"]),
            trim($_POST["fecha_fin"])
        );
    }

    if ($accion === "eliminar")
    {
        LogicaEvento::eliminarEvento(
            (int)$_POST["id_evento"]
        );
    }

    if ($accion === "editar") {

    LogicaEvento::actualizarEvento(
        (int)$_POST["id_evento"],
        trim($_POST["nombre"]),
        trim($_POST["fecha"]),
        trim($_POST["fecha_fin"])
    );

    }
}

header("Location: ../../pages/calendario.php");
exit();