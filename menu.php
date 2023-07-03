<?php 
    session_start();
    if(isset($_SESSION['tipoUsuario'] )) {
        $tipoUsuario = $_SESSION['tipoUsuario']; 
    } else {
        die("Sesión cerrada. Por favor, ingrese usuario y contraseña");
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
                <a id="logout" href="salir.php"> Salir </a>
            </div>
        </section>
    </nav>
    <main>
        <section id="inicio">
            <div class="fondo">
                <h1 style="margin: 0"> BIENVENIDO DE NUEVO </h1>
                <?php
                    if ($tipoUsuario == 'admin') {
                        echo'<h3 style="margin: 5px"> <!-- Nombre y apellido--> Root Root </h3>';
                    } else {
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
                    <h2 class="titulo-administradores"> Administradores </h2>
                    <form action="GET">
                        <label for="search"> Buscar administrador </label>
                        <div class="inputs-busqueda">
                            <input type="text" placeholder="ID">
                            <input type="text" placeholder="Nombre del administrador">
                            <button type="submit"> BUSCAR </button>
                        </div>
                    </form>
                    <input type="button" value=" + AGREGAR ">
                    <div>
                        <table class="registro-administradores">
                            <tr class="indicadores">
                                <th> ID </th>
                                <th> NOMBRE </th>
                            </tr>
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