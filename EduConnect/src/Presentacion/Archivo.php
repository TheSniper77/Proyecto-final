<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once dirname(__DIR__, 2) . '/config/autoload.php';

require_once __DIR__ . '/../Logica/LogicaArchivo.php';

use EduConnect\src\Logica\LogicaArchivo;

$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] === "POST")
{
    $accion = $_POST["accion"] ?? "";

    if ($accion === "crear")
    {
        $mensaje = LogicaArchivo::subirArchivo(
        $_SESSION["id_usuario"],
        trim($_POST["nombre"]),
        trim($_POST["descripcion"]),
        trim($_POST["privacidad"]),
        $_FILES["archivo"]
        );
    }

    if ($accion === "eliminar") {

        LogicaArchivo::eliminarArchivo(
        (int)$_POST["id_archivo"]
        );
    }

    if ($accion === "actualizar") {
        $archivoEditar = $_FILES["archivo"] ?? null;
        $mensaje = LogicaArchivo::actualizarArchivo(
            (int)$_POST["id_archivo"],
            trim($_POST["nombre"]),
            trim($_POST["descripcion"]),
            trim($_POST["privacidad"]),
            ($archivoEditar && $archivoEditar["error"] === UPLOAD_ERR_OK) ? $archivoEditar : null
        );
    }


    $_SESSION["mensaje"] = $mensaje;
    header("Location: ../../pages/archivo.php");
    exit();
}

// Aceptamos el buscador de archivo y de inicio PHP
$palabraFiltro = trim($_GET["palabraFiltro"] ?? "");
$buscarArchivo = trim($_GET["buscarArchivo"] ?? "");

// Para pages/archivo.php (los archivos del usuario logueado)
$archivos = LogicaArchivo::obtenerArchivosUsuario(
    $palabraFiltro,
    $_SESSION["id_usuario"]
);

// Para pages/inicio.php (todos los archivos públicos de la plataforma)
$archivosPublicos = LogicaArchivo::obtenerArchivosPublicos($buscarArchivo);