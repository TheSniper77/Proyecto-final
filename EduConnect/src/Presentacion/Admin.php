<?php

session_start();

if ($_SESSION["rol"] != "admin") {
    header("Location: inicio.php");
    exit();
}

require_once __DIR__ . '/../Logica/LogicaAdmin.php';

$usuarios = LogicaAdmin::obtenerUsuarios();
$roles = LogicaAdmin::obtenerRoles();
$calendarios = LogicaAdmin::obtenerCalendarios();
$eventos = LogicaAdmin::obtenerEventos();
$apuntes = LogicaAdmin::obtenerApuntes();
$archivos = LogicaAdmin::obtenerArchivos();

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Panel Administrador</title>
</head>

<body>

<h1>Panel Administrador</h1>

<h2>Usuarios</h2>

<?php foreach ($usuarios as $usuario) { ?>

<p>
    <?php echo $usuario["nombre"]; ?>
    <?php echo $usuario["apellido"]; ?>
</p>

<?php } ?>

<h2>Roles</h2>

<?php foreach ($roles as $rol) { ?>

<p>
    <?php echo $rol["nombre_rol"]; ?>
</p>

<?php } ?>

<h2>Calendarios</h2>

<?php foreach ($calendarios as $calendario) { ?>

<p>
    <?php echo $calendario["titulo"]; ?>
</p>

<?php } ?>

<h2>Eventos</h2>

<?php foreach ($eventos as $evento) { ?>

<p>
    <?php echo $evento["nombre"]; ?>
</p>

<?php } ?>

<h2>Apuntes</h2>

<?php foreach ($apuntes as $apunte) { ?>

<p>
    <?php echo $apunte["nombre"]; ?>
</p>

<?php } ?>

<h2>Archivos</h2>

<?php foreach ($archivos as $archivo) { ?>

<p>
    <?php echo $archivo["nombre"]; ?>
</p>

<?php } ?>

</body>
</html>