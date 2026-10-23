<?php
?>
<!DOCTYPE html>
<html lang="es">    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="https://jsdelivr.net">
        <title>Registro - EduConnect</title>
    </head>

    <body>

        <?php include "include/indexmenu.php"; ?>

            <header>
                <h1>Registro de Usuario</h1>
                <p>Bienvenido a la sección de registro de EduConnect, donde podrás crear una cuenta para acceder a todas las funcionalidades de la plataforma.</p>
            </header>

        <main class="contenedor">
            <div class="registro">
                <h2>Crear Cuenta</h2>
                <?php if (!empty($mensaje)) { ?>
                    <div class="mensaje-error">
                    <?php echo $mensaje; ?>
                    </div>
                <?php } ?>
                <form action="src/Presentacion/register.php" method="POST">
                    <div class="user">
                        <label for="nombre">Nombre</label>
                        <input type="text" id="nombre" name="nombre" class="input" placeholder="Nombre" required>
                    </div>

                    <div class="user">
                        <label for="usuario">Usuario</label>
                        <input type="text" id="usuario" name="usuario" class="input" placeholder="Usuario" required>
                    </div>

                    <div class="user">
                        <label for="apellido">Apellido</label>
                        <input type="text" id="apellido" name="apellido" class="input" placeholder="Apellido" required>
                    </div>

                    <div class="email">
                        <label for="correo">Correo Electrónico</label>
                        <input type="email" id="email" name="email" class="input" placeholder="Correo Electrónico" required>
                    </div>

                    <div class="pass">
                        <label for="password">Contraseña</label>
                        <input type="password" id="password" name="password" class="input" placeholder="Contraseña" required>
                        
                        <span id="alerta-pass" style="color: #ff3333; font-size: 13px; display: none; margin-top: 5px; font-weight: bold;"></span>
                        
                        <div id="requisitos-password" style="font-size: 12px; margin-top: 8px; color: #666;">
                            <p id="letter" class="invalid">✖ Debe contener una letra minuscula</p>
                            <p id="capital" class="invalid">✖ Debe contener una letra mayuscula</p>
                            <p id="number" class="invalid">✖ Debe contener un numero</p>
                            <p id="length" class="invalid">✖ Debe tener entre 8 y 20 caracteres</p>
                        </div>
                    </div>

                    <button type="submit">Registrarse</button>
                </form>
            </div>
        </main>
        <script src="assets/js/register.js"></script>
    </body>
</html>