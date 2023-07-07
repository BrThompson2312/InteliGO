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
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
</head>
<body>
    <nav>

        <section id="logo">
            <img class="logoImg" src="img/logofinal/whiteLogo.png">
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
            <button class="opciones-hilera" id="home" onclick="opcion_menu('home')"> 
                <ion-icon name="home"></ion-icon> <span>Home</span>
            </button>                
            <?php
                // print_r($_SESSION);
                if($tipoUsuario=='admin') {
                ?>
                    <button class="opciones-hilera" onclick="opcion_menu('administradores')"> 
                        <span>Administradores</span> 
                    </button>
                    <button class="opciones-hilera" onclick="opcion_menu('operativos')"> 
                        <span>Operadores</span> 
                    </button>
                <?php
                }
            ?>
            <button class="opciones-hilera" onclick="opcion_menu('coches')"> 
                <span>Coches</span> 
            </button>
            <button class="opciones-hilera" onclick="opcion_menu('chofer')"> 
                <span>Chofer</span> 
            </button>
            <button class="opciones-hilera" onclick="opcion_menu('lista-negra')"> 
                <span>Lista negra</span>
                </div>
            <button class="opciones-hilera" onclick="opcion_menu('cliente')"> 
                <span>Cliente</span>
            </button>
            <button class="opciones-hilera" onclick="opcion_menu('empresa')"> 
                <span>Empresa</span>
            </button>
            <button class="opciones-hilera" onclick="opcion_menu('reserva')"> 
                <span>Reserva</span>
            </button>
            <button class="opciones-hilera" onclick="opcion_menu('historial-de-movimiento')">
                <span>Historial de movimiento</span>
            </button>
            <button class="opciones-hilera" onclick="opcion_menu('gastos-de-mantenimiento')"> 
                <span>Gastos de mantenimiento</span>
            </button>
            <a id="logout" href="salir.php"> 
                <ion-icon name="log-out"></ion-icon> 
                <span>Salir</span>
            </a>
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
                            <input type="number" placeholder="ID" min="4 "max="4">
                            <input type="text" placeholder="Nombre del administrador">
                            <button type="submit"> Buscar </button>
                        </div>
                    </form>
                    <input class="Agregar" type="button" value=" + AGREGAR ">
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