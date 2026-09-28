<?php

require_once __DIR__ . "/conexion.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    exit("Acceso no permitido");
}

$nombre = trim($_POST["nombre"] ?? "");
$apellido = trim($_POST["apellido"] ?? "");
$email = trim($_POST["email"] ?? "");
$usuario = trim($_POST["usuario"] ?? "");
$password = $_POST["password"] ?? "";

if ($nombre === "" || $apellido === "" || $email === "" || $usuario === "" || $password === "") {
    exit("Todos los campos son obligatorios");
}

$sql = "INSERT INTO usuario (nombre, apellido, email, usuario, contraseña)
        VALUES (?, ?, ?, ?, ?)";

try {
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nombre, $apellido, $email, $usuario, $password]);
    $idUsuario = $pdo->lastInsertId();

    $sqlRol = "INSERT INTO rol (id_usuario, nombre)
               VALUES (?, 'usuario')";

    $stmtRol = $pdo->prepare($sqlRol);
    $stmtRol->execute([$idUsuario]);
    echo "Usuario registrado correctamente";
    header("Location: ../pages/login.html");
    exit();
} catch (PDOException $e) {
    echo "Error al registrar el usuario";
}
?>