<?php

require_once "conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nombre = $_POST["nombre"] ?? "";
    $email = $_POST["email"] ?? "";
    $usuario = $_POST["usuario"] ?? "";
    $password = $_POST["password"] ?? "";

    $sql = "INSERT INTO usuario (nombre, email, usuario, contraseña)
            VALUES (?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        echo "Error al preparar la consulta: " . $conn->error;
        exit;
    }

    $stmt->bind_param(
        "ssss",
        $nombre,
        $email,
        $usuario,
        $password
    );

    if ($stmt->execute()) {
        $idUsuario = $conn->insert_id;

        if ($idUsuario > 0) {
            $sqlRol = "INSERT INTO rol (id_usuario, nombre)
                       VALUES (?, 'usuario')";

            $stmtRol = $conn->prepare($sqlRol);

            if ($stmtRol) {
                $stmtRol->bind_param("i", $idUsuario);

                if ($stmtRol->execute()) {
                    echo "Usuario registrado correctamente";
                } else {
                    echo "Usuario creado, pero hubo un error al asignar el rol";
                }

                $stmtRol->close();
            } else {
                echo "Usuario creado, pero hubo un error al preparar el rol";
            }
        } else {
            echo "Usuario creado, pero no se pudo obtener su ID";
        }
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>