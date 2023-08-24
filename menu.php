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
            echo '<link rel="stylesheet" href="view/css/administrador.css">';
        } else {
            echo '<link rel="stylesheet" href="view/css/operativo.css">';
        }
    ?>
    <link rel="shortcut icon" href="view/img/logofinal/logoIco3.ico">
    <script src="https://kit.fontawesome.com/58fb14bc94.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
    <script src="view/js/jquery.min.js"></script>
</head>
<body>
    <section id="alert-salir">
        <div>
            <i id="xmark-salir" class="fa-solid fa-xmark"></i>
            <p>¿Está seguro de que desea salir?</p>
            <a href="controller/salir.php">Salir</a>
        </div>
    </section>
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
            <div id="logout"> 
                <ion-icon name="log-out"></ion-icon>
                <span>Salir</span>
            </div>
            <button class="opciones-hilera" id="home" rel="#inicio" onclick="opcion_menu(this)"> 
                <ion-icon name="home"></ion-icon> 
                <span>Home</span>
            </button>                
            <?php
                // print_r($_SESSION);
                if($tipoUsuario=='admin') {
                ?>
                    <button class="opciones-hilera" rel="#administrador_operador" onclick="opcion_menu(this)"> 
                        <i class="fa-solid fa-user"></i>
                        <span>Administradores/Operadores</span> 
                    </button>
                    <!-- <button class="opciones-hilera" rel="#operadores" onclick="opcion_menu(this)"> 
                        <ion-icon name="settings"></ion-icon>
                        <span>Operadores</span> 
                    </button> -->
                    <button class="opciones-hilera" rel="#eliminados" onclick="opcion_menu(this)"> 
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
                        <img src="view/img/logo.png">
                        <img src="view/img/black-logo.png">
                    </div>
                    <div class="logoPresentacion">
                        <img src="view/img/logofinal/blackLogo.png" alt="">         
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
                </div>
            </section>
        <!-- Fin HOME -->

        <?php
                if ($tipoUsuario == 'admin') {
                ?>
        <!-- Inicio ADMINISTRADORES -->
                <section class="bloque" id="administrador_operador">
                    <div class="conteiner-section conteiner-administradores">
                        <h2 class="titulo-section"> ADMINISTRADORES </h2>
                        <form action="GET">
                            <label for="search"> Buscar administrador </label>
                            <div class="inputs-busqueda">
                                <input type="number" placeholder="ID" min="4 "max="4">
                                <input type="text" placeholder="Nombre del administrador">
                                <button type="submit"> Buscar </button>
                                <input class="agregar agregar-administradores" onclick="probandoAgr('.conteiner-administradores', '.BRS-administradores', '#xmark-administrador')" type="button" value=" + AGREGAR ">
                            </div>
                        </form>
                        <div>
                            <table class="registro-administradores">
                                <tr class="indicadores">
                                    <th> ID </th>
                                    <th> NOMBRE </th>
                                </tr>
                            </table>
                            <!-- <table>
                                <tr class="datos-admin">
                                    <td>sd</td>
                                    <td>sw</td>
                                    <td>sd</td>
                                    <td>sd</td>
                                    <td>sd</td>
                                </tr>
                            </table> -->
                        </div>
                    </div>

                    <i id="xmark-administrador" class="fa-solid fa-xmark"></i>
                    <div class="block-relative-section BRS-administradores">
                        <div class="alert-section">
                            <form action="">
                                <div>
                                    <label for="nombre-completo">Nombre completo</label>
                                    <input name="nombre-completo" type="text">
                                    <label for="cedula">Cedula</label>
                                    <input name="cedula" type="number">
                                    <label for="edad">Edad</label>
                                    <input name="edad" type="number">
                                    <label for="role-user">Rol del usuario</label>
                                    <select name="role-user" id="">
                                        <option value="">--Por favor eliga opción</option>
                                        <option value="administrador">Administrador</option>
                                        <option value="operador">Operador</option>
                                    </select>
                                    <label for="">Fecha de ingreso</label>
                                    <input type="date">
                                </div>    
                                <button type="submit"> AGREGAR </button>                                  
                            </form>
                        </div>
                    </div>

                </section>
        <!-- Fin ADMINISTRADORES -->

        <!-- Inicio OPERADORES -->
            <!-- <section class="bloque" id="operadores">
                <div class="conteiner-section conteiner-operador">
                    <h2 class="titulo-section"> OPERADORES </h2>
                    <form action="GET">
                        <label for="search"> Buscar operador </label>
                        <div class="inputs-busqueda">
                            <input type="number" placeholder="ID" min="4 "max="4">
                            <input type="text" placeholder="Nombre del operador">
                            <button type="submit"> Buscar </button>
                            <input class="agregar agregar-operador" onclick="probandoAgr('.conteiner-operador', '.BRS-operador', '#xmark-operador')" type="button" value=" + AGREGAR ">
                        </div>
                    </form>
                    <div>
                        <table class="registro-operadores">
                            <tr class="indicadores">
                                <th> ID </th>
                                <th> NOMBRE </th>
                            </tr>
                        </table>
                    </div>
                </div>

                <i id="xmark-operador" class="fa-solid fa-xmark"></i>
                <div class="block-relative-section BRS-operador">
                    <div class="alert-section">
                        <form action="">
                            <div>
                                <label for="">Nombre completo</label>
                                <input type="text">
                                <label for="">Cedula</label>
                                <input type="number">
                                <label for="">Fecha de ingreso</label>
                                <input type="date">
                            </div>    
                            <button type="submit"> AGREGAR </button>                                  
                        </form>
                    </div>
                </div>
            </section>             -->
        <!-- Fin OPERADORES -->

        <!-- Inicio ELIMINADOS -->
            <section class="bloque" id="eliminados">
                <div class="conteiner-section conteiner-eliminados">
                    <h2 class="titulo-section"> ELIMINADOS </h2>
                    <form action="GET">
                        <label for="search"> Buscar usuario eliminado </label>
                        <div class="inputs-busqueda">
                            <input type="number" placeholder="ID" min="4 "max="4">
                            <input type="text" placeholder="Nombre del operador">
                            <button type="submit"> Buscar </button>
                        </div>
                    </form>
                    <div>
                        <table class="registro-eliminados">
                            <tr class="indicadores">
                                <th> ID </th>
                                <th> NOMBRE </th>
                            </tr>
                        </table>
                    </div>
                </div>
                <i id="xmark-eliminados" class="fa-solid fa-xmark"></i>
                <div class="block-relative-section BRS-eliminados">
                    <div class="alert-section">
                        <form action="">
                            <div>
                                <label for="">Nombre completo</label>
                                <input type="text">
                                <label for="">Cedula</label>
                                <input type="number">
                                <label for="">Fecha de ingreso</label>
                                <input type="date">
                            </div>    
                            <button type="submit"> AGREGAR </button>                                  
                        </form>
                    </div>
                </div>
            </section>            
        <!-- Fin ELIMINADOS -->

        <?php
            }
        ?>

        <!-- Inicio COCHES -->
            <section class="bloque" id="coches">
                <div class="conteiner-section conteiner-coches">
                    <h2 class="titulo-section"> COCHES </h2>
                    <form action="GET">
                        <label for="search"> Buscar coches </label>
                        <div class="inputs-busqueda">
                            <input type="number" placeholder="ID" min="4 "max="4">
                            <input type="text" placeholder="Nombre coche">
                            <button type="submit"> Buscar </button>
                            <input class="agregar agregar-coche" onclick="probandoAgr('.conteiner-coches', '.BRS-coches', '#xmark-coches')" type="button" value=" + AGREGAR ">
                        </div>
                    </form>
                    <div>
                        <table class="registro-coches">
                            <tr class="indicadores">
                                <th> ID </th>
                                <th> NOMBRE </th>
                            </tr>
                        </table>
                    </div>
                </div>

                <i id="xmark-coches" class="fa-solid fa-xmark"></i>
                <div class="block-relative-section BRS-coches">
                    <div class="alert-section">
                        <form action="">
                            <div>
                                <label for="">Marca</label>
                                <input type="text">
                                <label for="">Modelo</label>
                                <input type="text">
                                <label for="">Matricula</label>
                                <input type="number">
                                <label for="">Año</label>
                                <input type="date">
                            </div>    
                            <button type="submit"> AGREGAR </button>                                  
                        </form>
                    </div>
                </div>
            </section>            
        <!-- Fin COCHES -->

        <!-- Inicio CHOFERES -->
            <section class="bloque" id="chofer">
                <div class="conteiner-section conteiner-choferes">
                    <h2 class="titulo-section"> CHOFERES </h2>
                    <form action="GET">
                        <label for="search"> Buscar choferes </label>
                        <div class="inputs-busqueda">
                            <input type="number" placeholder="ID" min="4 "max="4">
                            <input type="text" placeholder="Nombre del chofer">
                            <button type="submit"> Buscar </button>
                            <input class="agregar agregar-choferes" onclick="probandoAgr('.conteiner-choferes', '.BRS-choferes','#xmark-chofer')" type="button" value=" + AGREGAR ">
                        </div>
                    </form>
                    <div>
                        <table class="registro-chofer">
                            <tr class="indicadores">
                                <th> ID </th>
                                <th> NOMBRE </th>
                            </tr>
                            <!-- <table class="datos-admin">
                                <tr>
                                    <td>pre</td>
                                    <td>pre</td>
                                    <td>pre</td>
                                    <td>pre</td>
                                    <td>pre</td>
                                </tr>
                            </table>
                            <table class="consultas">
                                <td></td>
                                <td>
                                    <table>
                                        <tr>
                                            <td>sww</td>
                                            <td>sww</td>
                                        </tr>
                                        <tr>
                                            <td>sww</td>
                                            <td>sww</td>
                                        </tr>
                                        <tr>
                                            <td>sww</td>
                                            <td>sww</td>
                                        </tr>
                                        <tr>
                                            <td>sww</td>
                                            <td>sww</td>
                                        </tr>
                                        <tr>
                                            <td>sww</td>
                                            <td>sww</td>
                                        </tr>
                                    </table>
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </table> -->
                        </table>
                    </div>
                </div>

                <!-- Bloque Agregar -->
                <i id="xmark-chofer" class="fa-solid fa-xmark"></i>
                <div class="block-relative-section BRS-choferes">
                    <div class="alert-section">
                        <form action="">
                            <div>
                                <label for="">Nombre completo</label>
                                <input type="text">
                                <label for="">Edad</label>
                                <input type="number">
                                <label for="">Cedula</label>
                                <input type="number">
                                <label for="">Fecha de ingreso</label>
                                <input type="date">
                                <label for="">Tipo de libreta de conducir</label>
                                <input type="text">
                            </div>    
                            <button type="submit"> AGREGAR </button>                                  
                        </form>
                    </div>
                </div>

            </section>
        <!-- Fin CHOFERES -->

        <!-- Inicio LISTA NEGRA -->
            <section class="bloque" id="lista-negra">
                <div class="conteiner-section conteiner-LN">
                    <h2 class="titulo-section"> LISTA NEGRA </h2>
                    <form action="GET">
                        <label for="search"> Buscar clientes </label>
                        <div class="inputs-busqueda">
                            <input type="number" placeholder="ID" min="4 "max="4">
                            <input type="text" placeholder="Nombre del cliente">
                            <button type="submit"> Buscar </button>
                            <input class="agregar agregar-LN" onclick="probandoAgr('.conteiner-LN', '.BRS-LN','#xmark-LN')" type="button" value=" + AGREGAR ">
                        </div>
                    </form>
                    <div>
                        <table class="registro-LN">
                            <tr class="indicadores">
                                <th> ID </th>
                                <th> NOMBRE </th>
                            </tr>
                        </table>
                    </div>
                </div>
                <i id="xmark-LN" class="fa-solid fa-xmark"></i>
                <div class="block-relative-section BRS-LN">
                    <div class="alert-section">
                        <form action="">
                            <div>
                                <label for="">Nombre completo</label>
                                <input type="text">
                                <label for="">Cedula</label>
                                <input type="number">
                                <label for="">Fecha de ingreso</label>
                                <input type="date">
                                <label for="">Comentario</label>
                                <input type="comment">
                            </div>    
                            <button type="submit"> AGREGAR </button>                                  
                        </form>
                    </div>
                </div>

            </section>
        <!-- Fin LISTA NEGRA -->

        <!-- Inicio CLIENTE -->
            <section class="bloque" id="cliente">
                <div class="conteiner-section conteiner-cliente">
                    <h2 class="titulo-section"> CLIENTES FRECUENTES </h2>
                    <form action="GET">
                        <label for="search"> Buscar clientes </label>
                        <div class="inputs-busqueda">
                            <input type="number" placeholder="ID" min="4 "max="4">
                            <input type="text" placeholder="Nombre del cliente">
                            <button type="submit"> Buscar </button>
                            <input class="agregar agregar-cliente" onclick="probandoAgr('.conteiner-cliente', '.BRS-cliente','#xmark-cliente')" type="button" value=" + AGREGAR ">
                        </div>
                    </form>
                    <div>
                        <table class="registro-cliente">
                            <tr class="indicadores">
                                <th> ID </th>
                                <th> NOMBRE </th>
                            </tr>
                        </table>
                    </div>
                </div>
                <i id="xmark-cliente" class="fa-solid fa-xmark"></i>
                <div class="block-relative-section BRS-cliente">
                    <div class="alert-section">
                        <form action="">
                            <div>
                                <label for="">Nombre completo</label>
                                <input type="text">
                                <label for="">Edad</label>
                                <input type="number">
                                <label for="">Cedula</label>
                                <input type="number">
                                <label for="">Fecha de ingreso</label>
                                <input type="date">
                            </div>    
                            <button type="submit"> AGREGAR </button>                                  
                        </form>
                    </div>
                </div>
            </section>
        <!-- Fin CLIENTE -->

        <!-- Inicio EMPRESA -->
            <section class="bloque" id="empresa">
                <div class="conteiner-section conteiner-empresa">
                    <h2 class="titulo-section"> EMPRESAS </h2>
                    <form action="GET">
                        <label for="search"> Buscar empresas </label>
                        <div class="inputs-busqueda">
                            <input type="number" placeholder="ID" min="4 "max="4">
                            <input type="text" placeholder="Nombre de la empresa">
                            <button type="submit"> Buscar </button>
                            <input class="agregar agregar-empresa" onclick="probandoAgr('.conteiner-empresa', '.BRS-empresa','#xmark-empresa')" type="button" value=" + AGREGAR ">
                        </div>
                    </form>
                    <div>
                        <table class="registro-empresa">
                            <tr class="indicadores">
                                <th> ID </th>
                                <th> NOMBRE </th>
                            </tr>
                        </table>
                    </div>
                </div>

                <i id="xmark-empresa" class="fa-solid fa-xmark"></i>
                <div class="block-relative-section BRS-empresa">
                    <div class="alert-section">
                        <form action="">
                            <div>
                                <label for="">Nombre de la empresa</label>
                                <input type="text">
                                <label for="">RUT</label>
                                <input type="number">
                            </div>    
                            <button type="submit"> AGREGAR </button>                                  
                        </form>
                    </div>
                </div>
            </section>
        <!-- Fin EMPRESA -->

        <!-- Inicio RESERVA -->
            <section class="bloque" id="reserva">
                <div class="conteiner-section conteiner-reserva">
                    <h2 class="titulo-section"> RESERVAS </h2>
                    <form action="GET">
                        <label for="search"> Buscar reservas </label>
                        <div class="inputs-busqueda">
                            <input type="number" placeholder="ID" min="4 "max="4">
                            <input type="text">
                            <button type="submit"> Buscar </button>
                            <input class="agregar agregar-reserva" onclick="probandoAgr('.conteiner-reserva', '.BRS-reserva','#xmark-reserva')" type="button" value=" + AGREGAR ">
                        </div>
                    </form>
                    <div>
                        <table class="registro-reserva">
                            <tr class="indicadores">
                                <th> ID </th>
                                <th> NOMBRE </th>
                            </tr>
                        </table>
                    </div>
                </div>
                <i id="xmark-reserva" class="fa-solid fa-xmark"></i>
                <div class="block-relative-section BRS-reserva">
                    <div class="alert-section">
                        <form action="">
                            <div>
                                <label for="">Nombre del cliente</label>
                                <input type="text">
                                <label for="">Cedula</label>
                                <input type="number">
                                <label for="">Teléfono</label>
                                <input type="number">
                                <label for="">Origen</label>
                                <input type="text">
                                <label for="">Destino</label>
                                <input type="text">
                            </div>    
                            <button type="submit"> AGREGAR </button>                                  
                        </form>
                    </div>
                </div>
            </section>
        <!-- Fin RESERVA -->

        <!-- Inicio HISTORIAL DE MOVIMIENTO -->
            <section class="bloque" id="historial-de-movimiento">
                <div class="conteiner-section conteiner-HDM">
                    <h2 class="titulo-section"> HISTORIAL DE MOVIMIENTO </h2>
                    <form action="GET">
                        <label for="search"> Buscar movimientos </label>
                        <div class="inputs-busqueda">
                            <input type="number" placeholder="ID" min="4 "max="4">
                            <input type="text">
                            <button type="submit"> Buscar </button>
                            <input class="agregar agregar-HDM" onclick="probandoAgr('.conteiner-HDM', '.BRS-HDM','#xmark-HDM')" type="button" value=" + AGREGAR ">
                        </div>
                    </form>
                    <div>
                        <table class="registro-HDM">
                            <tr class="indicadores">
                                <th> ID </th>
                                <th> NOMBRE </th>
                            </tr>
                        </table>
                    </div>
                </div>
                <i id="xmark-HDM" class="fa-solid fa-xmark"></i>
                <div class="block-relative-section BRS-HDM">
                    <div class="alert-section">
                        <form action="">
                            <div>
                                <label for="">Fecha</label>
                                <input type="text">
                                <label for="">Hora inicio</label>
                                <input type="number">
                                <label for="">Origen</label>
                                <input type="text">
                                <label for="">Destino</label>
                                <input type="text">
                                <label for="">Forma de pago</label>
                                <input type="text">
                                <label for="">Empresa</label>
                                <input type="text">
                                <label for="">Pasajero</label>
                                <input type="text">
                                <label for="">Chofer</label>
                                <input type="text">
                                <label for="">Importe</label>
                                <input type="text">
                            </div>    
                            <button type="submit"> AGREGAR </button>                                  
                        </form>
                    </div>
                </div>
            </section>
        <!-- Fin HISTORIAL DE MOVIMIENTO -->

        <!-- Inicio GASTOS DE MANTENIMIENTO -->
            <section class="bloque" id="gastos-de-mantenimiento">
                <div class="conteiner-section conteiner-GDM">
                    <h2 class="titulo-section"> GASTOS DE MANTENIMIENTO </h2>
                    <form action="GET">
                        <label for="search"> Buscar </label>
                        <div class="inputs-busqueda">
                            <input type="number" placeholder="ID" min="4 "max="4">
                            <input type="text">
                            <button type="submit"> Buscar </button>
                            <input class="agregar agregar-GDM" onclick="probandoAgr('.conteiner-GDM', '.BRS-GDM','#xmark-GDM')" type="button" value=" + AGREGAR ">
                        </div>
                    </form>
                    <div>
                        <table class="registro-GDM">
                            <tr class="indicadores">
                                <th> ID </th>
                                <th> NOMBRE </th>
                            </tr>
                        </table>
                    </div>
                </div>
                <i id="xmark-GDM" class="fa-solid fa-xmark"></i>
                <div class="block-relative-section BRS-GDM">
                    <div class="alert-section">
                        <form action="">
                            <div>
                                <label for="Concepto">Concepto</label>
                                <select name="Concepto" id="Concepto">
                                    <option value="">--Por favor eliga una opción</option>
                                    <option value="con1">con1</option>
                                    <option value="con2">con2</option>
                                    <option value="con3">con3</option>
                                    <option value="con4">con4</option>
                                </select>
                                <label for="">Fecha</label>
                                <input type="date">
                                <label for="">Descripción</label>
                                <input type="text">
                                <label for="">Importe</label>
                                <input type="text">
                            </div>    
                            <button type="submit"> AGREGAR </button>                                  
                        </form>
                    </div>
                </div>
            </section>
        <!-- Fin GASTOS DE MANTENIMIENTO -->
    </main>

    <script src="view/js/menu.js"></script>
    <script src="view/js/personas.js"></script>
</body>
</html>