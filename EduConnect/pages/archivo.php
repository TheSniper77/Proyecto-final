<?php
require "../include/proteger_pagina.php";
require_once __DIR__ . '/../src/Presentacion/Archivo.php';


?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Archivos - EduConnect</title>
</head>
    <body>

        <?php include "../include/menu.php"; ?>

        <header>
            <h1>Archivos</h1>
            <p>Bienvenido a la sección de Archivos en EduConnect</p>
            <p>Aquí puedes subir, buscar tus archivos, actualizar y eliminar.</p>
            <p>Solo archivos permitidos: Word, Excel, PowerPoint, PDF, Imágenes( JPG, PNG, JPEG, GIF), maximo hasta 100MB por archivo.</p>
        </header>

        <?php if (!empty($_SESSION["mensaje"])) { ?>
            <div  id="mensajeExito" class="contenedor-mensaje">
                <div class="success">
                    <?php
                        echo $_SESSION["mensaje"];
                        unset($_SESSION["mensaje"]);
                    ?>
                </div>
            </div>
        <?php } ?>
    
<div class="accion-archivo">
    <button id="btnArchivo" class="boton-archivo">Subir Archivo</button>
</div>

<div id="overlayArchivo" class="overlay">

    <div id="formArchivo" class="form-archivo">

        <h3>Subir Archivo</h3>

        <form action="../src/Presentacion/Archivo.php" method="POST" enctype="multipart/form-data">

            <input type="hidden" name="accion" value="crear">

            <label for="nombre">Nombre del archivo</label>
            <input type="text" id="nombre" name="nombre" placeholder="Nombre del archivo" required></input>

            <label for="descripcion">Descripcion</label>
            <textarea id="descripcion" name="descripcion" placeholder="Escribe aquí tu descripcion..." rows="8" required></textarea>

            <label for="archivo">Seleccionar archivo</label>
            <input type="file" id="archivo" name="archivo" required></input>

            <label for="privacidad">Visibilidad</label>
            <select id="privacidad" name="privacidad" required>
                <option value="privado">Privado</option>
                <option value="publico">Público</option>
            </select>

            <button type="submit">Guardar Archivo</button>

        </form>
    </div>
</div>

<main>
    <section class="Filtros">
        <form class="form-filtro" method="GET">
            <strong>Buscar por nombre:</strong>
            <input  id="busquedaArchivo" class="campo-filtro" type="text" name="palabraFiltro" value="<?php echo htmlspecialchars($palabraFiltro ?? ''); ?>" placeholder="Buscar por nombre..."></input>
        </form>
    </section>

    <h3> Archivos Subidos </h3>

    <table>
        <thead>
            <tr>
                <th>Miniatura</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Tipo de archivo</th>
                <th>Visibilidad</th>
                <th>Fecha de subida</th>
                <th>Fecha de modificacion</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($archivos as $archivo) { ?>
                <tr>
                    <!-- Columna de Vista Previa / Icono -->
                        <td>
    <?php 
        $rutaArchivo = "../Subirarchivo/" . basename($archivo->getRutaArchivo());
        $extension = strtolower(pathinfo($archivo->getRutaArchivo(), PATHINFO_EXTENSION));
    ?>
    <!-- El enlace envuelve tanto a la miniatura como al icono para que ambos sirvan para abrir o descargar -->
    <a href="<?php echo $rutaArchivo; ?>" target="_blank" title="Ver o descargar archivo">
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
                    <td><?php echo htmlspecialchars($archivo->getNombre()); ?></td>
                    <td><?php echo $archivo->getDescripcion(); ?></td>
                    <td><?php echo strtoupper(pathinfo($archivo->getRutaArchivo(), PATHINFO_EXTENSION)); ?> </td>
                    <td><?php echo ucfirst($archivo->getPrivacidad()); ?></td>
                    <td><?php echo $archivo->getFechaSubida()->format('d/m/Y H:i:s'); ?></td>
                    <td><?php $fechaEdicion = $archivo->getFechaEdicion(); echo $fechaEdicion ? $fechaEdicion->format('d/m/Y H:i:s') : 'Sin modificaciones'; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</main>


<div class="accion-archivo">
    <button id="btnEArchivo" class="boton-archivo">
        Editar Archivo
    </button>
</div>

<div id="overlayEArchivo" class="overlay">
    <div id="formEArchivo" class="form-archivo">
        <h3>Actualizar</h3>

        <form action="../src/Presentacion/Archivo.php" method="POST">
            <input type="hidden" name="accion" value="actualizar">

            <label for="id_archivo_editar">Seleccionar Archivo</label>
            <select id="id_archivo_editar" name="id_archivo" required>
                <?php foreach ($archivos as $archivo) { ?>
                    <option value="<?php echo $archivo->getIdArchivo(); ?>">
                        <?php echo htmlspecialchars($archivo->getNombre()); ?>
                    </option>
                <?php } ?>
            </select>

            <label for="nombre_editar">Nuevo nombre</label>
            <input type="text" id="nombre_editar" name="nombre" placeholder="Nuevo nombre del archivo" required></input>

            <label for="descripcion_editar">Nueva descripción</label>
            <textarea id="descripcion_editar" name="descripcion" placeholder="Nueva descripción..." rows="6" required></textarea>

            <label for="archivo_editar">Reemplazar archivo (Opcional)</label>
            <input type="file" id="archivo_editar" name="archivo"></input>

            <label for="privacidad_editar">Visibilidad</label>
            <select id="privacidad_editar" name="privacidad" required>
                <option value="privado">Privado</option>
                <option value="publico">Público</option>
            </select>

            <button type="submit">Actualizar Archivo</button>
        </form>
    </div>
</div>

<div class="accion-archivo">
    <button id="btnBArchivo" class="boton-Barchivo">
        Borrar Archivo
    </button>
</div>

<div id="overlayBArchivo" class="overlay">

    <div id="formBarchivo" class="form-archivo">

        <h3>Borrar Archivo</h3>

        <form action="../src/Presentacion/Archivo.php" method="POST">

            <input type="hidden" name="accion" value="eliminar">

            <label for="id_archivo"> Archivo </label>

            <select id="id_archivo" name="id_archivo" required>

                <?php foreach ($archivos as $archivo) { ?>

                    <option value="<?php echo $archivo->getIdArchivo(); ?>">
                        <?php echo $archivo->getNombre(); ?>
                    </option>

                <?php } ?>

            </select>

            <button type="submit"> Eliminar Archivo</button>

        </form>
    </div>
</div>

    <footer>
        <p>EduConnect - Grupo: 3MC Tecnología de la información - 15/04/2026 - Asignatura: Programación Full Stack </p>
        <p>Gracias por visitar EduConnect</p>
    </footer>

    <script src="../assets/js/overlay.js"></script>
    <script src="../assets/js/apuntes.js"></script>
    <script src="../assets/js/filtro.js"></script>

    </body>
</html>