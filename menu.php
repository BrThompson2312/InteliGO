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
    <link rel="shortcut icon" href="img/logofinal/logoIco3.ico">
    <script src="https://kit.fontawesome.com/58fb14bc94.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
</head>
<body>
    <nav>
        <section id="user">
            <div class="info-user">
                <ion-icon class="style-user" name="contact"></ion-icon>
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
            <a id="logout" href="salir.php"> 
                <ion-icon name="log-out"></ion-icon>
                <span>Salir</span>
            </a>
            <button class="opciones-hilera" id="home" rel="#inicio" onclick="opcion_menu(this)"> 
                <ion-icon name="home"></ion-icon> 
                <span>Home</span>
            </button>                
            <?php
                // print_r($_SESSION);
                if($tipoUsuario=='admin') {
                ?>
                    <button class="opciones-hilera" rel="#administradores" onclick="opcion_menu(this)"> 
                        <ion-icon name="settings"></ion-icon>
                        <span>Administradores</span> 
                    </button>
                    <button class="opciones-hilera" rel="#operadores" onclick="opcion_menu(this)"> 
                        <ion-icon name="settings"></ion-icon>
                        <span>Operadores</span> 
                    </button>
                    <button class="opciones-hilera" id="eliminados" rel="#eliminados" onclick="opcion_menu(this)"> 
                        <i class="fa-solid fa-user-slash"></i>
                        <span>Eliminados</span>
                    </button>
                <?php
                }
            ?>
            <button class="opciones-hilera" rel="#coches" onclick=opcion_menu(this)> 
                <span>Coches</span> 
            </button>
            <button class="opciones-hilera" rel="#chofer" onclick="opcion_menu(this)"> 
                <span>Chofer</span> 
            </button>
            <button class="opciones-hilera" rel="#lista-negra" onclick="opcion_menu(this)"> 
                <span>Lista negra</span>
            <button class="opciones-hilera" rel="#cliente" onclick="opcion_menu(this)"> 
                <span>Cliente</span>
            </button>
            <button class="opciones-hilera" rel="#empresa" onclick="opcion_menu(this)"> 
                <span>Empresa</span>
            </button>
            <button class="opciones-hilera" rel="#reserva" onclick="opcion_menu(this)"> 
                <span>Reserva</span>
            </button>
            <button class="opciones-hilera" rel="#historial-de-movimiento" onclick="opcion_menu(this)">
                <span>Historial de movimiento</span>
            </button>
            <button class="opciones-hilera" rel="#gastos-de-mantenimiento" onclick="opcion_menu(this)"> 
                <span>Gastos de mantenimiento</span>
            </button>
        </section>
    </nav>
    <main>

        <!-- Inicio HOME -->
        <section class="bloque" id="inicio">
            <div class="conteiner-Inicio">
                <div class="logo-img">
                    <img src="img/logo.png">
                    <img src="img/black-logo.png">
                </div>
                <div class="logoPresentacion">
                    <img src="img/logofinal/blacklogo.png" alt="">         
                </div>
                <div class="fondo">
                    <h1 style="margin: 0"> BIENVENIDO DE NUEVO </h1>
                    <?php
                        if ($tipoUsuario == 'admin') {
                            ?>
                                <span style="margin-top: 10px; display: block; font-family: Inter-ExtraLight"> 
                                    <!-- Nombre y apellido-->  [Administrador] Root Root 
                                </span>
                            <?php
                        } else {
                            ?>
                                <span style="margin-top: 10px; display: block; font-family: Inter-ExtraLight"> 
                                <!-- Nombre y apellido--> [Operador] User User </span>
                            <?php
                        }
                    ?>
                </div>
                <footer>
                    <table>
                        <tr>
                            <th>ACERCA DE</th>
                            <th>INFORMACIÓN DE CONTACTO</th>
                        </tr>
                        <tr>
                            <td>
                                <p>
                                    Somos INTELISOFT una empresa que se dedica al desarrollo e implementación de sistemas informáticos ubicada en las oficinas de Oracle en Montevideo, Uruguay.      
                                </p> 
                            </td>
                            <td>
                                <ul>
                                    <li>
                                        <dt><h4> Ubicación: </h4></dt>
                                        <dd>Oficinas de Oracle en Montevideo, Uruguay.</dd>
                                    </li>
                                    <li>
                                        <dt><h4> Correo: </h4></dt>
                                        <dd>intelisoft@gmail.com</dd>
                                    </li>
                                    <li>
                                        <dt><h4> Teléfono: </h4></dt>
                                        <dd>000000001</dd>
                                    </li>
                                </ul>     
                            </td>
                        </tr>
                    </table>
                </footer>
            </div>
        </section>
        <!-- Fin HOME -->

        <!-- Inicio ADMINISTRADORES -->
        <?php
            if ($tipoUsuario == 'admin') {
        ?>
                <section class="bloque" id="administradores">
                    <div class="conteiner-Administradores">
                        <h2 class="titulo-administradores"> Administradores </h2>
                        <form action="GET">
                            <label for="search"> Buscar administrador </label>
                            <div class="inputs-busqueda">
                                <input type="number" placeholder="ID" min="4 "max="4">
                                <input type="text" placeholder="Nombre del administrador">
                                <button type="submit"> Buscar </button>
                                <input class="Agregar" type="button" value=" + AGREGAR ">
                            </div>
                        </form>

                        <div>
                            <table class="registro-administradores">
                                <tr class="indicadores">
                                    <th> ID </th>
                                    <th> NOMBRE </th>
                                </tr>
                            </table>
                        </div>
                    </div>
                </section>
        <?php
            }
        ?>
        <!-- Fin ADMINISTRADORES -->

        <!-- Inicio OPERADORES -->
        <section class="bloque" id="operadores">
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Distinctio fugiat obcaecati sed, officia id modi voluptas recusandae reprehenderit repudiandae architecto eum harum dolor laboriosam ipsum magni et! Sunt, alias animi?
        </section>
        <!-- Fin OPERADORES -->
    </main>

    <script src="js/menu.js"></script>
    <script src="js/personas.js"></script>
</body>
</html>