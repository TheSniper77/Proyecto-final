<?php

// Incluir el archivo de conexión a la base de datos
include 'conexion.php';

session_start();
require_once "conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $usuario = $_POST["usuario"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM usuario
            WHERE usuario = ? AND contrasena = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $usuario, $password);
    $stmt->execute();

    $resultado = $stmt->get_result();

    if ($resultado->num_rows == 1) {

        $datosUsuario = $resultado->fetch_assoc();

        $_SESSION["id_usuario"] = $datosUsuario["id_usuario"];
        $_SESSION["usuario"] = $datosUsuario["usuario"];

        echo "Login correcto";

        // o redirigir:
        // header("Location: index.html");
        // exit();

    } else {
        echo "Usuario o contraseña incorrectos";
    }

    $stmt->close();
    $conn->close();
}

?>