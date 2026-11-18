<?php

use EduConnect\src\Logica\LogicaCalendario;

$datosCalendario =
    LogicaCalendario::obtenerCalendario();

?>

<?php echo $datosCalendario["mesTexto"]; ?>
