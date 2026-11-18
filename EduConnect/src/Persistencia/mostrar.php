<?php
namespace EduConnect\src\Persistencia;
use EduConnect\src\connect\Conexion;
use PDO;

$pdo = Conexion::conectar();

$sql = "SELECT * FROM archivo ORDER BY id_archivo DESC";

$stmt = $pdo->prepare($sql);

$stmt->execute();

$archivos = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Archivos Subidos</title>

    <style>

        .galeria{
            display:flex;
            flex-wrap:wrap;
            gap:20px;
        }

        .card{
            border:1px solid white;
            padding:10px;
        }

        .card img{
            width:200px;
            height:auto;
        }

    </style>

</head>
<body>

<h1>Archivos Subidos</h1>

<div class="galeria">

<?php foreach($archivos as $fila){ ?>

    <div class="card">
    <a href="<?php echo htmlspecialchars($fila['ruta_archivo'], ENT_QUOTES, 'UTF-8'); ?>">
        <?php echo htmlspecialchars($fila['nombre_archivo'], ENT_QUOTES, 'UTF-8'); ?>
    </a>

</div>

<?php } ?>
</div>

</body>
</html>