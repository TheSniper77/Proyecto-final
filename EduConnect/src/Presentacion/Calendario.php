<?php

use EduConnect\Logica\LogicaCalendario;

$datosCalendario =
    LogicaCalendario::obtenerCalendario();

?>

<?php echo $datosCalendario["mesTexto"]; ?>
