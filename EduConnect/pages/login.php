<?php
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../assets/css/style.css">
        <title>Iniciar Sesión - EduConnect</title>
    </head>
    
        <body>

            <?php include "../include/menu.php"; ?>

                <header>
                    <h1>Inicio de Sesión</h1>
                    <p>Bienvenido a la sección de inicio de sesión de EduConnect, donde podrás acceder a tu cuenta y disfrutar de todas las funcionalidades de la plataforma.</p>
                </header>

            <main class="contenedor">
                <div class="login">
                        <h2>Inicio de Sesión</h2>
                    <form action="../src/Presentacion/Login.php" method="POST">
                        <div class="email">
                            <label for="usuario">Usuario</label>
                            <input type="text" id="usuario" name="usuario" placeholder="Usuario" required>
                        </div>

                        <div class="pass">
                            <label for="clave">Contraseña</label>
                            <input type="password" id="clave" name="password" placeholder="Contraseña" required>
                            <!--<span class="eye" id="eye">&#xF441;</span>-->
                        </div>

                        <button type="submit">Iniciar Sesión</button>
                    </form>
                </div>
            </main>
        </body>
</html>