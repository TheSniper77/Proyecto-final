<?php

include "conexion.php";

if(isset($_POST["Subir"])){

    if($_FILES["archivo"]["error"] == 0){

        $archivo = time() . "_" . $_FILES["archivo"]["name"];

        $temporal = $_FILES["archivo"]["tmp_name"];

        $destino = "../Subirarchivo/" . $archivo;

        if(move_uploaded_file($temporal, $destino)){

            $id_usuario = 1;

            $sql = "INSERT INTO archivo
            (id_usuario, nombre_archivo, ruta)
            VALUES
            (:id_usuario, :nombre_archivo, :ruta)";

            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(":id_usuario", $id_usuario);
            $stmt->bindParam(":nombre_archivo", $archivo);
            $stmt->bindParam(":ruta", $destino);

            $stmt->execute();

            header("Location: ../pages/archivo.php?success=1");
            exit();

        }else{

            header("Location: ../pages/archivo.php?error=1");
            exit();

        }

    }else{

        echo "Error al seleccionar el archivo";

    }

}
?>