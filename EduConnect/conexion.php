<?php

//Datos de conexion
$host = "localhost";
$usuario = "root";
$password = "";
$bd = "conexionprueba";
$charset = "utf8mb4";

//Crear cadena de conexion (DSN)
$dsn = "mysql:host=$host;dbname=$bd;charset=$charset";

//Opciones de configuracion
$opciones = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
];

//Crear conexion PDO
try {
    $pdo = new PDO($dsn, $usuario, $password, $opciones);
    echo "Conexion exitosa a la base de datos";
    
} catch (PDOException $e) {
    die("Conexion fallida: " . $e->getMessage());
} finally { 
    //Cerrar conexion aunque funcione o no la conexion
    $pdo = null;
    echo "Conexion cerrada";
}
?>