<?php
session_start();

if (!isset ($_SESSION["id_usuario"])){
    header("Location: /EduConnect/pages/login.php");
    die();
}

?>