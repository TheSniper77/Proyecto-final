<?php
require "../include/proteger_pagina.php";
require "../src/Presentacion/Archivo.php";

$palabraFiltro = trim($_GET["palabraFiltro"] ?? "");
$buscarArchivo = trim($_GET["buscarArchivo"] ?? "");

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
            <p>
                Bienvenido <?php echo $_SESSION["usuario"]; ?>
            </p>
            <p>
                Rol: <?php echo $_SESSION["rol"]; ?>
            </p>
            <?php if ($_SESSION["rol"] == "admin") { ?>
            
            <?php } ?>

            <?php include "../include/menu.php"; ?>

            <header>
                <h1>EduConnect</h1>
                <p>Bienvenido a EduConnect, la plataforma educativa que conecta estudiantes y profesores</p>
                <p>En EduConnect podrás ver tus últimos eventos, apuntes y archivos.</p>
            </header>

            <form method="GET">
                <strong>Buscar archivos públicos:</strong>
                <input id="busquedaArchivo" class="campo-filtro" type="text" name="buscarArchivo" value="<?php echo htmlspecialchars($buscarArchivo ?? ''); ?>" placeholder="Buscar archivo...">
            </form>

    <table>
        <thead>
            <tr>
                <th>Miniatura</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Tipo</th>
                <th>Subido por</th>
                <th>Fecha de subida</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($archivosPublicos as $archivo) { ?>
                <tr>
                    <!-- Columna de Vista Previa / Icono -->
                    <td>
                            <?php 
                                $rutaFisica = is_array($archivo) ? ($archivo["ruta_archivo"] ?? '') : $archivo->getRutaArchivo();
                                $rutaArchivo = "../Subirarchivo/" . basename($rutaFisica);
                                $extension = strtolower(pathinfo($rutaFisica, PATHINFO_EXTENSION));
                            
                            // Abrir directamente en otra pestaña al hacer clic
                            ?>
                            <a href="<?php echo $rutaArchivo; ?>" target="_blank" title="Ver archivo">
                                <?php 
                                    if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif'])) {
                                ?>
                                        <img src="<?php echo $rutaArchivo; ?>" alt="Miniatura" style="width: 40px; height: 40px; object-fit: cover; border-radius: 4px;">
                                <?php 
                                    } else {
                                        $icono = "📄";
                                        switch ($extension) {
                                            case 'pdf': $icono = "📕"; break;
                                            case 'doc': case 'docx': $icono = "📘"; break;
                                            case 'xls': case 'xlsx': case 'csv': $icono = "🟩"; break;
                                            case 'ppt': case 'pptx': $icono = "📙"; break;
                                        }
                                ?>
                                        <span style="font-size: 24px;"><?php echo $icono; ?></span>
                                <?php 
                                    }
                                ?>
                            </a>
                        </td>
                    <td><?php echo $archivo["nombre"]; ?></td>
                    <td><?php echo $archivo["descripcion"]; ?></td>
                    <td><?php echo strtoupper(pathinfo($archivo["ruta_archivo"],PATHINFO_EXTENSION));?></td>
                    <td><?php echo $archivo["usuario"]; ?></td>
                    <td><?php echo $archivo["fecha_subida"]; ?></td>
                </tr>
            <?php } ?>
        </tbody>

    </table>

            <footer>
                <p>EduConnect - Grupo: 3MC Tecnología de la información - 15/04/2026 </p>
                <p>Gracias por visitar EduConnect</p>
            </footer>

            <script src="../assets/js/filtro.js"></script>

        </body>
</html>
