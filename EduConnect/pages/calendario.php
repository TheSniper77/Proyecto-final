<?php

require_once __DIR__ . '/../src/Logica/LogicaCalendario.php';
require_once __DIR__ . '/../src/Logica/LogicaEvento.php';

use EduConnect\Logica\LogicaCalendario;
use EduConnect\Logica\LogicaEvento;

$datos = LogicaCalendario::obtenerCalendario();

extract($datos);

$mensajeEvento = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    session_start();

    $nombre = trim($_POST["nombre"] ?? "");
    $fecha = trim($_POST["fecha"] ?? "");
    $fechaFin = trim($_POST["fecha_fin"] ?? "");

    $idCalendario = 1;
  
    $mensajeEvento = LogicaEvento::crearEvento(
        $idCalendario,
        $nombre,
        $fecha,
        $fechaFin
    );
}

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
    <p>Bienvenido a la sección de Calendario en EduConnect</p>
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

            echo "<div class='$clase'>";
            echo "<div class='numero'>$dia</div>";
            echo "</div>";
        }

        ?>

    </div>

</div>

<div class="acciones-calendario">

    <button id="btnEvento" class="boton-evento">
        Crear Evento
    </button>

</div>

<div id="overlay" class="overlay">

    <div id="formEvento" class="form-evento">

        <h3>Crear Evento</h3>

        <?php if(!empty($mensajeEvento)){ ?>

            <p>
            <?php echo $mensajeEvento; ?>
            </p>

        <?php } ?>

        <form method="POST">

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

<footer>
    <p>EduConnect - Grupo: 3MC Tecnología de la información - 15/04/2026 - Asignatura: Programación Full Stack</p>
    <p>Gracias por visitar EduConnect</p>
</footer>

 <script src="../assets/js/evento.js"> </script>

</body>
</html>