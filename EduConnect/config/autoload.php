<?php
/*
spl_autoload_register(function ($clase) {
$prefijo = "EduConnect\\";
$base_dir = __DIR__ ."/..";

$ClassFilePath = $base_dir . str_replace ($prefijo, "", $clase) . ".php";
if (file_exists($ClassFilePath)) {
    require $ClassFilePath;
} else {
    die("No se encuentra la clase: " . $clase." ".$base_dir);
}
});*/

/*

spl_autoload_register(function ($clase) {

    $prefijo = "EduConnect\\";
    $base_dir = __DIR__ . "/../";

    // Comprobar que la clase pertenece al namespace EduConnect
    if (strpos($clase, $prefijo) !== 0) {
        return;
    }

    // Eliminar el prefijo del namespace
    $clase = substr($clase, strlen($prefijo));

    // Reemplazar \ por /
    $clase = str_replace("\\", "/", $clase);

    // Construir la ruta completa
    $ClassFilePath = $base_dir . $clase . ".php";

    if (file_exists($ClassFilePath)) {
        require_once $ClassFilePath;
    } else {
        die("No se encuentra la clase: " . $clase . " Ruta: " . $ClassFilePath);
    }
});*/

/*
spl_autoload_register(function ($clase) {

    $prefijo = "EduConnect\\";
    $base_dir = dirname(__DIR__) . "/";

    if (strpos($clase, $prefijo) !== 0) {
        return;
    }

    $clase = substr($clase, strlen($prefijo));

    $clase = str_replace("\\", "/", $clase);

    $ClassFilePath = $base_dir . $clase . ".php";

    if (file_exists($ClassFilePath)) {
        require_once $ClassFilePath;
    } else {
        die("No se encuentra la clase: " . $clase .
            " Ruta: " . $ClassFilePath);
    }
});
*/


spl_autoload_register(function ($clase) {

    $prefijo = "EduConnect\\";
    $base_dir = dirname(__DIR__) . "/";

    if (strpos($clase, $prefijo) !== 0) {
        return;
    }

    $clase = substr($clase, strlen($prefijo));

    $clase = str_replace("\\", "/", $clase);

    $ClassFilePath = $base_dir . $clase . ".php";

    if (file_exists($ClassFilePath)) {
        require_once $ClassFilePath;
    } else {
        die("No se encuentra la clase: " . $clase .
            " Ruta: " . $ClassFilePath);
    }
});

date_default_timezone_set('America/Montevideo');
