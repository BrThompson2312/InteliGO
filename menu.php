<?php 
    session_start();
    if(isset($_SESSION['tipoUsuario'] )) {
        $tipoUsuario = $_SESSION['tipoUsuario']; 
    } else {
        die("Eeeepaaa, te salteaste el login");
    }   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title> InteliGO </title>
    <?php
        if ($tipoUsuario == 'admin'){
            echo '<link rel="stylesheet" href="css/administrador.css">';
        } else {
            echo '<link rel="stylesheet" href="css/operativo.css">';
        }
    ?>
    <script src="https://kit.fontawesome.com/58fb14bc94.js" crossorigin="anonymous"></script>
</head>
<body>
    <nav>
        <section id="logo">
            <h1 class="inteligo"> INTELI<span>GO</span></h1>
        </section>
        <section id="user">
            <i class="fa-solid fa-user style-user"></i>
            <div class="user-categories">
                <?php
                    if ($tipoUsuario == 'admin') {
                        echo'<h3 style="margin: 0"> [Administrador] </h3>';
                        echo'<h5 style="margin: 5px;"> <!-- Nombre y apellido--> Root Root </h5>';
                    } else {
                        echo'<h3 style="margin: 0"> [Operador] </h3>';
                        echo'<h5 style="margin: 5px;"> <!-- Nombre y apellido--> User User </h5>';
                    }
                ?>
            </div>
        </section>
        <section id="opciones">
            <div class="conjunto-opciones">

                <?php
                    // print_r($_SESSION);
                    if($tipoUsuario=='admin') {
                        echo '<div class="opciones-hilera" id="admin" onclick="administradores()"> Administradores </div>';
                        echo '<div class="opciones-hilera"> Operativos </div>';
                    }
                ?>
                <div class="opciones-hilera"> Coches </div>
                <div class="opciones-hilera"> Chofer </div>
                <div class="opciones-hilera"> Lista negra </div>
                <div class="opciones-hilera"> Cliente </div>
                <div class="opciones-hilera"> Empresa </div>
                <div class="opciones-hilera"> Reserva </div>
                <div class="opciones-hilera"> Historial de movimiento </div>
                <div class="opciones-hilera"> Gastos de mantenimiento </div>
            </div>
            <a href="salir.php"> Salir </a>
        </section>
    </nav>
    <main>

        <!-- Inicio -->
        <section id="inicio">
            <div class="fondo">
                <?php
                    if ($tipoUsuario == 'admin') {
                        echo'<h1 style="margin: 0"> BIENVENIDO DE NUEVO </h1>';
                        echo'<h3 style="margin: 5px"> <!-- Nombre y apellido--> Root Root </h3>';
                    } else {
                        echo'<h1 style="margin: 0"> BIENVENIDO DE NUEVO </h1>';
                        echo'<h3 style="margin: 5px"> <!-- Nombre y apellido--> User User </h3>';
                    }
                ?>
            </div>
            <img src="img/logo.png">
        </section>

        <!-- Administradores -->
        <section id="administradores">
        </section>

    </main>


    <script src="js/administrador.js"></script>
</body>
</html>