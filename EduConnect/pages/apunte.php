<?php
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Apuntes - EduConnect</title>
</head>

    <body>
        
        <?php include "../include/menu.php"; ?>

        <header>
            <h1>Apuntes</h1>
            <p>Bienvenido a la sección de Apuntes de EduConnect</p>
            <p>Aquí encontrarás la posibilidad de crear y compartir apuntes con otros estudiantes.</p>
        </header>

            <div class="apunte privado" id="privados">
                <p>Este es un apunte privado (solo visible si el usuario tiene permiso).</p>
                <button onclick="crearApunte('Apunte privado', 'privados')">Crear privado</button>
            </div>

        <script src="../assets/js/apuntes.js"></script>
    </body>
</html>