<?php
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../assets/css/style.css">
        <title>EduConnect</title>
        <link rel="icon" type="image/jpg" href="../assets/images/EduConnectIcono.jpg">
    </head>

        <body>

                <?php
                    session_start();
                ?>
            <p>
                Bienvenido <?php echo $_SESSION["usuario"]; ?>
            </p>
            <p>
                Rol: <?php echo $_SESSION["rol"]; ?>
            </p>
            <?php if ($_SESSION["rol"] == "admin") { ?>
            <a href="admin.php">
                Panel de Administración
            </a>
            <?php } ?>

            <?php include "../include/menu.php"; ?>

            <header>
                <h1>EduConnect</h1>
                <p>Bienvenido a EduConnect, la plataforma educativa que conecta estudiantes y profesores</p>
                <p>En EduConnect podrás acceder archivos, gestionar un calendario para tus eventos importantes, apuntes y proyectos de finales de curso</p>
            </header>

            <footer>
                <p>EduConnect - Grupo: 3MC Tecnología de la información - 15/04/2026 </p>
                <p>Gracias por visitar EduConnect</p>
            </footer>
        </body>
</html>
