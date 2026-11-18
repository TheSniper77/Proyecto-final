<?php
?>

<header class="barra">
    <nav>
        <div class="nav-logo">
            <img src="../assets/images/EduConnectLogoRecortada.png" class="logo" alt="Imagen de EduConnect">
        </div>
            <div class="nav-formulario">
                <ul>
                    <?php if(!isset ($_SESSION["id_usuario"])){?>
                        <li><a href="../index.php" class="registro">Registro</a></li>
                        <li><a href="login.php" class="login">Iniciar Sesión</a></li>
                    <?php }?>
                    <?php if(isset ($_SESSION["id_usuario"])){?>
                    <li><a href="../src/Presentacion/logout.php">Cerrar Sesión</a></li>
                    <?php }?>
                </ul>
            </div>
        <ul class="nav-enlaces">
                <li><a href="inicio.php">Inicio</a></li>
                <li><a href="archivo.php">Archivo</a></li>
                <li><a href="calendario.php">Calendario</a></li>
                <li><a href="apunte.php">Apunte</a></li>
        </ul>
    </nav>    
</header>