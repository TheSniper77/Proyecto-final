<?php

require_once __DIR__ . '/../config/autoload.php';
require "../include/proteger_pagina.php";

require_once __DIR__ . '/../src/Logica/LogicaCalendario.php';
require_once __DIR__ . '/../src/Persistencia/EventoDAO.php';

use EduConnect\src\Logica\LogicaCalendario;
use EduConnect\src\Persistencia\EventoDAO;

$datos = LogicaCalendario::obtenerCalendario();

extract($datos);

$idCalendario = (int)$_SESSION["id_calendario"];

$eventos = EventoDAO::obtenerEventos($idCalendario);

?>

<!DOCTYPE html>
<html lang="es">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Calendario - EduConnect</title>
</head>

<body>

<?php include "../include/menu.php"; ?>

<header>
    <h1>Calendario</h1>
    <p>Bienvenido a la sección de Calendario en EduConnect, aquí puedes gestionar tus eventos y actividades.</p>
</header>

<div class="calendario">

    <div class="navegacion">
        <a class="boton" href="?mes=<?php echo $mesAnterior; ?>&anio=<?php echo $anioAnterior; ?>">← Mes anterior</a>

        <a class="boton" href="?mes=<?php echo date('n'); ?>&anio=<?php echo date('Y'); ?>">Hoy</a>

        <h2><?php echo $meses[$mes] . " " . $anio; ?></h2>

        <a class="boton" href="?mes=<?php echo $mesSiguiente; ?>&anio=<?php echo $anioSiguiente; ?>">Mes siguiente →</a>
    </div>

    <div class="cabecera">
        <div>Lun</div>
        <div>Mar</div>
        <div>Mié</div>
        <div>Jue</div>
        <div>Vie</div>
        <div>Sáb</div>
        <div>Dom</div>
    </div>

    <div class="dias">

        <?php

        for ($i = 1; $i < $diaSemana; $i++) {
            echo '<div class="dia vacio"></div>';
        }

        for ($dia = 1; $dia <= $diasMes; $dia++) {

            $clase = "dia";

            if (
                $dia == $hoy &&
                $mes == $mesActual &&
                $anio == $anioActual
            ) {
                $clase .= " hoy";
            }

            $fechaDia = sprintf('%04d-%02d-%02d', $anio, $mes, $dia);

            echo "<div class='$clase'>";
            echo "<div class='numero'>$dia</div>";

            if (!empty($eventos)) {
                foreach ($eventos as $evento) {
                    $fechaInicio = $evento->getFecha();
                    $fechaFinEvento = $evento->getFechaFin() ?? $fechaInicio;

                    if (
                        $fechaDia >= $fechaInicio->format('Y-m-d') &&
                        $fechaDia <= $fechaFinEvento->format('Y-m-d')
                    ) {
                        echo '<div class="evento">';
                        echo htmlspecialchars($evento->getNombre(), ENT_QUOTES, 'UTF-8');
                        echo '</div>';
                    }
                }
            }

            echo "</div>";
        }

        ?>

    </div>

</div>

<div class="acciones-calendario">
    <button id="btnEvento" class="boton-evento">Crear Evento</button>
</div>

<div id="overlayEvento" class="overlay">

    <div id="formEvento" class="form-evento">

        <h3>Crear Evento</h3>

        <form action="../src/Presentacion/Evento.php" method="POST">

            <input type="hidden" name="accion" value="crear">

            <label for="nombre">Nombre del evento</label>
            <input type="text" id="nombre" name="nombre" placeholder="Nombre del evento" required>

            <label for="fecha">Fecha y hora de inicio</label>
            <input type="datetime-local" id="fecha" name="fecha" required>

            <label for="fecha_fin">Fecha y hora de finalización</label>
            <input type="datetime-local" id="fecha_fin" name="fecha_fin">

            <button type="submit">Guardar Evento</button>

        </form>
    </div>
</div>

<div class="acciones-calendario">
    <button id="btnBevento" class="boton-Bevento">
        Borrar evento
    </button>
</div>

<div id="overlayBEvento" class="overlay">

    <div id="formBevento" class="form-evento">

        <h3>Borrar Evento</h3>

        <form action="../src/Presentacion/Evento.php" method="POST">

            <input type="hidden" name="accion" value="eliminar">

            <label for="id_evento"> Evento </label>

            <select id="id_evento" name="id_evento" required>

                <?php foreach ($eventos as $evento) { ?>

                    <option value="<?php echo $evento->getIdEvento(); ?>">
                        <?php echo $evento->getNombre(); ?>
                    </option>

                <?php } ?>

            </select>

            <button type="submit"> Eliminar Evento</button>

        </form>
    </div>
</div>

<div class="acciones-calendario">
    <button id="btnEditarEvento" class="boton-evento">
        Editar evento
    </button>
</div>

<div id="overlayEditarEvento" class="overlay">

    <div id="formEditarevento" class="form-evento">

        <h3>Borrar Evento</h3>

        <form action="../src/Presentacion/Evento.php" method="POST">

            <input type="hidden" name="accion" value="editar">

            <label for="id_evento_editar"> Evento </label>

            <select id="id_evento_editar" name="id_evento" required>
                <?php foreach ($eventos as $evento) { ?>
                    <option value="<?php echo $evento->getIdEvento(); ?>">
                        <?php echo $evento->getNombre(); ?>
                    </option>
                <?php } ?>
            </select>

            <label for="nombreEditar"> Nuevo nombre </label>

            <input type="text" id="nombreEditar" name="nombre" required>

            <label for="fechaEditar"> Fecha inicio </label>

            <input type="datetime-local" id="fechaEditar" name="fecha" required>

            <label for="fechaFinEditar"> Fecha fin </label>

            <input type="datetime-local" id="fechaFinEditar" name="fecha_fin">

            <button type="submit"> Guardar Cambios</button>

        </form>
    </div>
</div>

<footer>
    <p>EduConnect - Grupo: 3MC Tecnología de la información - 15/04/2026 - Asignatura: Programación Full Stack</p>
    <p>Gracias por visitar EduConnect</p>
</footer>

        <script src="../assets/js/overlay.js"> </script>
    </body>
</html>