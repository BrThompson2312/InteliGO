<?php 
    session_start();
    if(isset($_SESSION['tipoUsuario'] )) {
        $tipoUsuario = $_SESSION['tipoUsuario']; 
    } else {
        die("Sesión cerrada, por favor ingrese usuario y contraseña");
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
            <a id="logout" href="salir.php"> <i class="fa-solid fa-right-from-bracket"></i> </a>
            <div class="info-user">
                <i class="fa-solid fa-user style-user"></i>
                <div>
                    <?php
                        if ($tipoUsuario == 'admin') {
                            ?>
                                <h3 style="margin: 0"> [Administrador] </h3>
                                <h5 style="margin: 5px;"> <!-- Nombre y apellido--> Root Root </h5>
                            <?php
                        } else {
                            ?>
                                <h3 style="margin: 0"> [Operador] </h3>
                                <h5 style="margin: 5px;"> <!-- Nombre y apellido--> User User </h5>
                            <?php 
                        } ?>
                </div>
            </div>
        </section>
        <section id="opciones">
            <div class="conjunto-opciones">
                <div class="opciones-hilera" id="home" onclick="opcion_menu('home')"> Home </div>

                <?php
                    // print_r($_SESSION);
                    if($tipoUsuario=='admin') {
                    ?>
                        <div class="opciones-hilera" onclick="opcion_menu('administradores')"> Administradores </div>
                        <div class="opciones-hilera" onclick="opcion_menu('operativos')"> Operativos </div>
                    <?php
                    }
                ?>

                <div class="opciones-hilera" onclick="opcion_menu('coches')"> Coches </div>
                <div class="opciones-hilera" onclick="opcion_menu('chofer')"> Chofer </div>
                <div class="opciones-hilera" onclick="opcion_menu('lista-negra')"> Lista negra </div>
                <div class="opciones-hilera" onclick="opcion_menu('cliente')"> Cliente </div>
                <div class="opciones-hilera" onclick="opcion_menu('empresa')"> Empresa </div>
                <div class="opciones-hilera" onclick="opcion_menu('reserva')"> Reserva </div>
                <div class="opciones-hilera" onclick="opcion_menu('historial-de-movimiento')"> Historial de movimiento </div>
                <div class="opciones-hilera" onclick="opcion_menu('gastos-de-mantenimiento')"> Gastos de mantenimiento </div>
            </div>
        </section>
    </nav>
    <main>
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
            <div class="logo-img">
                <img src="img/logo.png">
                <img src="img/black-logo.png">
            </div>
        </section>

        <?php
            if ($tipoUsuario == 'admin') {
        ?>
        <section id="administradores">
            <h2> Administradores </h2>
            <form action="">
                <label for="search"> Buscar administrador </label>
                <br>
                <input type="text">
            </form>

            <input type="button" value=" + AGREGAR ">

            <div>
                <table class="registro-administradores">
                    <tr class="indicadores">
                        <th> ID </th>
                        <th> NOMBRE </th>
                    </tr>
                    <!-- <tr class="rev-registro">
                        <td></td>
                        <td>
                            <table class="dis_rev-registro">
                                <tr>
                                    <td>Nombre completo:</td>
                                    <td>administrador_0</td>
                                </tr>
                                <tr>
                                    <td>Cédula:</td>
                                    <td>00000000</td>
                                </tr>
                                <tr>
                                    <td>Edad:</td>
                                    <td>00</td>
                                </tr>
                                <tr>
                                    <td>Fecha de ingreso:</td>
                                    <td>00/00/00</td>
                                </tr>
                                <tr>
                                    <td>ID:</td>
                                    <td>0000</td>
                                </tr>
                            </table>
                        </td>
                    </tr> -->
                </table>
            </div>
        </section>
        <?php
            }
        ?>
    </main>

    <script src="js/menu.js"></script>
    <script src="js/personas.js"></script>
</body>
</html>