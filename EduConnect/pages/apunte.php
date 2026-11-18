<?php

require_once __DIR__ . '/../config/autoload.php';
require "../include/proteger_pagina.php";
require_once __DIR__ . '/../src/Presentacion/Apunte.php';


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
        <p>Aquí encontrarás la posibilidad de crear tus apuntes personales</p>
    </header>

    <?php if (!empty($mensaje)) { ?>
        <div class="contenedor-mensaje">
                <div id="mensajeExito" class="success">
                    <?php echo $mensaje; ?>
                </div>
        </div>
    <?php } ?>

    <div class="acciones-apunte">
        <button id="btnApunte" class="boton-apunte">Crear Apunte</button>
    </div>

    <main class="contenedor-apuntes-publicos">
        <h2>Mis Apuntes Guardados</h2>
        
        <div class="grid-apuntes">
            <?php if (!empty($apuntes)) { ?>
                <?php foreach($apuntes as $apunte){ ?>
                    <div class="apunte-card">
                        <h4><?php echo htmlspecialchars($apunte["nombre"]); ?></h4>
                        <p><?php echo htmlspecialchars($apunte["contenido"]); ?></p>
                        
                        <div class="botones-tarjeta">
                                <button type="button"
                                        class="btn-editar btnEditarApunte"
                                        data-id="<?php echo $apunte['id_apunte']; ?>"
                                        data-nombre="<?php echo htmlspecialchars($apunte['nombre']); ?>"
                                        data-contenido="<?php echo htmlspecialchars($apunte['contenido']); ?>">
                                    Editar
                                </button>
                            <button type="button" class="btn-borrar btn-confirmar-eliminar" data-id="<?php echo $apunte['id_apunte']; ?>">
                                Eliminar
                            </button>
                        </div>
                    </div>
                <?php } ?>
            <?php } else { ?>
                <p class="sin-apuntes">Aún no has creado ningún apunte.</p>
            <?php } ?>
        </div>
    </main>

    <!-- Overlay solo para crear los apuntes -->
    <div id="overlay" class="overlay">
        <div id="formApunte" class="form-apunte">
            <h3>Crear Apunte</h3>

            <form method="POST">
                <label for="nombre">Nombre del apunte</label>
                <input type="text" id="nombre" name="nombre" placeholder="Nombre del apunte" required>

                <label for="contenido">Contenido</label>
                <textarea id="contenido" name="contenido" placeholder="Escribe aquí tu apunte..." rows="8" required></textarea>

                <button type="submit">Guardar Apunte</button>
            </form>
        </div>
    </div>

    <div id="overlayEditarApunte" class="overlay">

        <div class="form-apunte">

            <h3>Editar Apunte</h3>

            <form method="POST">

                <input type="hidden" name="accion" value="editar">

                <input type="hidden" id="editar_id" name="id_apunte">

                <label for="editar_nombre"> Nombre </label>

                <input type="text" id="editar_nombre" name="nombre" required>

                <label for="editar_contenido"> Contenido </label>

                <textarea id="editar_contenido" name="contenido" rows="8" required> </textarea>

                <button type="submit"> Guardar Cambios</button>
            </form>
        </div>
    </div>

    <!-- Un modal que muestra un aviso al borrar el apunte -->
    <div id="modalConfirmar" class="overlay">
        <div class="form-apunte alerta-personalizada">
            <h3>¿Eliminar apunte?</h3>
            <p>Esta acción no se puede deshacer. ¿Estás seguro de que deseas borrar este apunte?</p>
            <div class="acciones-modal">
                <button id="btnCancelarBorrar" class="boton-apunte btn-cancelar">Cancelar</button>
                <a id="enlaceEliminarSeguro" href="#" class="boton-apunte btn-borrar-confirmado">Eliminar definitivamente</a>
            </div>
        </div>
    </div>

    <!-- Scripts cargados -->
    <script src="../assets/js/overlay.js"></script>
    <script src="../assets/js/apuntes.js"></script>

    <script>
        // Limpia la barra de direcciones discretamente tras borrar sin romper Apache
        if (window.location.search.includes('eliminar')) {window.history.replaceState({}, document.title, window.location.pathname);}
    </script>
</body>
</html>