<?php

include "conexion.php";

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

    <div class="card-image">

    <img
        src="../Subirarchivo/<?php echo $fila['nombre_archivo']; ?>"
        width="200"
    >

    <p><?php echo $fila['nombre_archivo']; ?></p>

</div>

<?php } ?>
</div>

</body>
</html>