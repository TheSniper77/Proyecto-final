<!DOCTYPE html>

<html lang="es">



<head>



    <meta charset="UTF-8">



    <meta name="viewport"

          content="width=device-width, initial-scale=1.0">



    <title>Administrador</title>



    <link rel="stylesheet" href="style.css">



</head>



<body>

    <?php

    session_start();

    if(!isset($_SESSION['tipo'])  && $_SESSION['tipo']!='administrador'){

    header('location:login.php');

    exit;

    }

    ?>




<div class="contenedor">



    <div class="tarjeta">



        <h1>Panel Administrador</h1>



        <p class="bienvenida">



            Bienvenido



            <strong>

                <?php echo $_SESSION["usuario"]; ?>

            </strong>



        </p>




        <div class="opciones">



            <button>Administrar usuarios</button>



            <button>Reportes</button>



            <button>Configuración</button>



        </div>




        <form action="logout.php"

              method="post">



            <input

                type="submit"

                class="boton salir"

                value="Cerrar sesión">



        </form>



    </div>



</div>



</body>



</html>