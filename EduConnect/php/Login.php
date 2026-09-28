<?php

session_start();
require_once __DIR__ . "/conexion.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    exit("Acceso no permitido");
}

$usuario = trim($_POST["usuario"] ?? "");
$clave = $_POST["clave"] ?? "";

if ($usuario === "" || $clave === "") {
    exit("Usuario o contraseña incorrectos");
}

$sql = "SELECT id_usuario, usuario, contraseña
        FROM usuario
        WHERE usuario = ?";

try {
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$usuario]);
    $datosUsuario = $stmt->fetch();

    if (!$datosUsuario || $datosUsuario["contraseña"] !== $clave) {
        exit("Usuario o contraseña incorrectos");
    }

    $_SESSION["id_usuario"] = $datosUsuario["id_usuario"];
    $_SESSION["usuario"] = $datosUsuario["usuario"];

    header("Location: ../pages/index.html");
    exit();
} catch (PDOException $e) {
    exit("Error al iniciar sesión");
}
?>