<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Archivos - EduConnect</title>
</head>

    <body>

        <header class="barra">
                <nav>
                    <div class="nav-logo">
                        <img src="../images/EduConnectLogo.png" class="logo" alt="Imagen de EduConnect">
                    </div>
                        <div class="nav-formulario">
                            <ul>
                                <li><a href="register.html" class="registro">Registro</a></li>
                                <li><a href="login.html">Iniciar Sesión</a></li>
                                <li><a href="../php/logout.php">Cerrar Sesión</a></li>
                            </ul>
                        </div>
                    <ul class="nav-enlaces">
                        <li><a href="index.html">Inicio</a></li>
                        <li><a href="archivo.php">Archivo</a></li>
                        <li><a href="calendario.html">Calendario</a></li>
                        <li><a href="apunte.html">Apunte</a></li>
                    </ul>
                </nav>    
        </header>

        <header>
            <h1>Archivos</h1>
            <p>Bienvenido a la sección de Archivos en EduConnect</p>
            <p>Aquí encontrarás los materiales para descargar, subir, buscar, actualizar y eliminar.</p>
        </header>
    
        <div class="archivo">

                <h2>Subir Archivo</h2>

                <?php if(isset($_GET['success'])){ ?>

                    <div class="success" id="mensaje">
                        Archivo subido correctamente
                    </div>

                <?php } ?>

                <?php if(isset($_GET['error'])){ ?>

                    <div class="error" id="mensaje">
                        Ocurrió un error al subir el archivo
                    </div>

                <?php } ?>

                </div>
            <form action="../php/subir.php" method="POST" enctype="multipart/form-data">
                <label for="archivo">Selecciona un archivo:</label>
                <input type="file" name="archivo" required>
                <button type="submit" name="Subir">Subir Archivo</button>
            </form>

            <form action="../php/mostrar.php" method="POST">
                <button type="submit" name="Mostrar">Mostrar Archivos</button>
            </form>
        </div>

        <footer>
            <p>EduConnect - Grupo: 3MC Tecnología de la información - 15/04/2026 - Asignatura: Programación Full Stack </p>
            <p>Gracias por visitar EduConnect</p>
        </footer>

        <script>

                const mensaje = document.getElementById("mensaje");

                if(mensaje){

                setTimeout(() => {

                mensaje.style.opacity = "0";

                setTimeout(() => {

                mensaje.style.display = "none";

                }, 500);

                }, 3000);

            }

        </script>

    </body>
</html>