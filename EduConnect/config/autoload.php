<?php

spl_autoload_register(function ($clase) {
$prefijo = "EduConnect\\";
$base_dir = __DIR__ . "/../src/";

$ClassFilePath = $base_dir . str_replace ($prefijo, "", $clase) . ".php";
if (file_exists($ClassFilePath)) {
    require $ClassFilePath;
} else {
    die("No se encuentra la clase: " . $clase);
}
});