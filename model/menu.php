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
    <title>InteliGO</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
        if ($tipoUsuario == 'administrador'){
            echo '<link rel="stylesheet" href="../view/css/administrador.css">';
        } else {
            echo '<link rel="stylesheet" href="../view/css/operativo.css">';
        }
    ?>
    <link rel="shortcut icon" href="../view/img/logofinal/logoIco3.ico">
    <script src="https://kit.fontawesome.com/58fb14bc94.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-solid-straight/css/uicons-solid-straight.css'>
    <script src="../view/js/jquery.min.js"></script>
</head>
<body>
    <section id="alert-salir">
        <div>
            <i id="xmark-salir" class="fa-solid fa-xmark"></i>
            <p>¿Desea cerrar sesión?</p>
                <a href="salir.php">Cerrar Sesión</a>
        </div>
    </section>
    <nav>
        <section id="user">
            <div class="info-user">
                <i id="active-nav" class="fa-solid fa-bars navbar_hilera"></i>
                <div>
                    <?php
                        if ($tipoUsuario == 'administrador') {
                            ?>
                                <h3><?php echo $_SESSION['nombreUsuario'];?></h3><span>|</span><span>Administrador</span>
                            <?php
                        } else {
                            ?>
                                <h3><?php echo $_SESSION['nombreUsuario'];?></h3><span>|</span><span>Operador</span>
                            <?php 
                        } ?>
                </div>
            </div>
        </section>
        <section id="opciones">
            <div id="logout"> 
                <ion-icon name="log-out"></ion-icon>
                <span>Cerrar Sesión</span>
            </div>
            <button class="opciones-hilera" id="home" rel="#inicio" onclick="opcion_menu(this)"> 
                <i class="fa-solid fa-house-chimney"></i>
                <span>Home</span>
            </button>
            <?php
                // print_r($_SESSION);
                if($tipoUsuario=='administrador') {
                ?>
                    <button class="opciones-hilera" rel="#operador" onclick="opcion_menu(this)"> 
                        <ion-icon name="people"></ion-icon>
                        <span>Operadores</span> 
                    </button>
                    <button class="opciones-hilera" rel="#eliminados" onclick="opcion_menu(this)"> 
                        <i class="fa-solid fa-person-circle-minus"></i>
                        <span>Eliminados</span>
                    </button>
                <?php
                }
            ?>
            <button class="opciones-hilera" rel="#chofer" onclick="opcion_menu(this)"> 
                <i class="fi fi-ss-steering-wheel"></i>
                <span>Coches & Choferes</span> 
            </button>
            <button class="opciones-hilera" rel="#particular" onclick="opcion_menu(this)"> 
                <i class="fa-solid fa-person"></i>
                <span>Particulares</span>
            </button>
            <button class="opciones-hilera" rel="#empresa" onclick="opcion_menu(this)"> 
                <i class="fa-solid fa-building"></i>
                <span>Empresas</span>
            </button>
            <button class="opciones-hilera" rel="#reserva" onclick="opcion_menu(this)"> 
                <i class="fa-solid fa-calendar-days"></i>
                <span>Reservas</span>
            </button>
            <button class="opciones-hilera" rel="#gastos-de-mantenimiento" onclick="opcion_menu(this)"> 
                <i class="fa-solid fa-wrench"></i>
                <span>Gastos de mantenimiento</span>
            </button>
        </section>
    </nav>
    <main>
        <section class="bloque" id="inicio">
            <header>
                <i id="active-nav" class="fa-solid fa-bars navbar_block" onclick="nav_block()" ></i>
                <img src="../view/img/logofinal/whiteLogo.png">
            </header>
            <main>
                <h1> BIENVENIDO DE NUEVO </h1>
                <?php
                    if ($tipoUsuario == 'administrador') {
                        ?>
                            <span><?php echo $_SESSION['nombreUsuario'];?> <span> | </span> Administrador</span>
                        <?php
                    } else {
                        ?>
                            <span><?php echo $_SESSION['nombreUsuario'];?> <span> | </span> Operador</span>
                        <?php
                    }
                ?>
            </main>
            <footer>
                <h5>POWERED BY</h5>
                <img src="../view/img/logobk.png">
            </footer>
        </section>
        <?php
                if ($tipoUsuario == 'administrador') {
                ?>
        <!-- Inicio OPERADORES -->
            <section class="bloque" id="operador">
                <div class="conteiner-section conteiner-operador">
                    <div class="titulo-section">
                        <i class="fa-solid fa-bars navbar_block" onclick="nav_block()"></i>
                        <ion-icon name="people" class="navbar_icon"></ion-icon>
                        <h2>OPERADORES</h2>
                    </div>
                    <form action="GET">
                        <div class="inputs-busqueda">
                            <button class="filtrar"> FILTRAR </button>
                            <button class="agregar" onclick="ventanaSeccion('.conteiner-operador', '.BRS-operador', '.cancel_button')" type="button">AGREGAR</button>
                        </div>
                    </form>
                    <table>
                        <thead>
                            <tr class="indicadores">
                                <th> CEDULA </th>
                                <th> NOMBRE DEL OPERADOR </th>
                                <th> FECHA DE INGRESO </th>
                            </tr>
                        </thead>
                        <tbody class="registro-operadores"></tbody>
                    </table>
                </div>
                <div class="block_relative_section BRS-operador">
                    <form class="alert_section">
                        <label for="nombre-operador">Nombre completo</label>
                        <input name="nombre-operador" type="text" placeholder="Nombre del empleado">
                        <label for="ci-operador">Cedula</label>
                        <input name="ci-operador" type="number" placeholder="Cédula">
                        <label for="edad-operador">Edad</label>
                        <input name="edad-operador" type="number" placeholder="Edad">
                        <label for="contrasena-operador">Contraseña</label>
                        <input name="contrasena-operador" type="text" placeholder="Contraseña">
                        <label for="rol-operador">Rol del usuario</label>
                        <input name="rol-operador" type="text" value="Operador">
                        <label for="fechaing-operador">Fecha de ingreso</label>
                        <input type="datetime" name="fechaing-operador" value="<?php echo date("Y-m-d");?>" required readonly>
                        <div class="buttons">
                            <button type="button" class="cancel_button"> ATRAS </button>   
                            <button class="subir_datos">AGREGAR</button>
                        </div>
                    </form>
                </div>
            </section>
        <!-- Fin OPERADORES -->

        <!-- Inicio ELIMINADOS -->
            <section class="bloque" id="eliminados">
                <div class="conteiner-section conteiner-eliminados">
                    <div class="titulo-section">
                        <i class="fa-solid fa-bars navbar_block" onclick="nav_block()"></i>
                        <i class="fa-solid fa-person-circle-minus navbar_icon"></i>
                        <h2>ELIMINADOS</h2>
                    </div>
                    <form action="GET">
                        <div class="inputs-busqueda">
                            <button class="filtrar"> FILTRAR </button>
                        </div>
                    </form>
                    <table>
                        <thead>
                            <tr class="indicadores">
                                <th>ID</th>
                                <th>NOMBRE</th>
                            </tr>
                        </thead>
                        <tbody class="registro-eliminados"></tbody>
                    </table>
                </div>
                <div class="block_relative_section BRS-eliminados">
                    <form class="alert_section">
                        <div>
                            <label for="nombre-eliminado">Nombre completo</label>
                            <input name="nombre-eliminado" type="text">
                            <label for="cedula-eliminado">Cedula</label>
                            <input name="cedula-eliminado" type="number">
                            <label for="fechaIng-eliminado">Fecha de ingreso</label>
                            <input name="fechaIng-eliminado" type="date">
                        </div>    
                        <div class="buttons">
                            <button class="cancel_button" type="button"> CANCELAR </button>   
                            <button class="subir_datos" type="button"> AGREGAR </button>   
                        </div>
                    </form>
                </div>
            </section>            
        <!-- Fin ELIMINADOS -->
        <?php
            }
        ?>
        <!-- Inicio CHOFERES & COCHES -->
            <section class="bloque" id="chofer">
                <div class="conteiner-section conteiner-chofer">
                    <div class="titulo-section">
                        <i class="fa-solid fa-bars navbar_block" onclick="nav_block()"></i>
                        <i class="fi fi-ss-steering-wheel navbar_icon"></i>
                        <h2>COCHES & CHOFERES</h2>
                    </div>
                    <form action="GET">
                        <div class="inputs-busqueda">
                            <button class="filtrar"> FILTRAR </button>
                            <button class="agregar" onclick="ventanaSeccion('.conteiner-chofer', '.BRS-choferes', '.cancel_button')" type="button">AGREGAR</button>
                        </div>
                    </form>
                    <table>
                        <thead>
                            <tr class="indicadores">
                                <th>MATRÍCULA</th>
                                <th>CHOFER ASIGNADO</th>
                                <th>MODELO DEL AUTO</th>
                                <th>MARCA</th>
                                <th>AÑO</th>
                            </tr>
                        </thead>
                        <tbody class="registro-choferes"></tbody>
                    </table>
                </div>
                <div class="block_relative_section BRS-choferes">
                    <form class="alert_section">
                        <label for="ci-chofer">Cedula</label>
                        <input name="ci-chofer" type="number" placeholder="Cédula">
                        <label for="name-chofer">Nombre completo</label>
                        <input name="name-chofer" type="text" placeholder="Nombre completo">     
                        <label for="tel-chofer">Teléfono</label>
                        <input name="tel-chofer" type="number" placeholder="Teléfono">
                        <label for="matricula-veh">Matrícula</label>
                        <input name="matricula-veh" type="number" placeholder="Teléfono">
                        <label for="marcha-veh">Marca</label>
                        <input name="marca-veh" type="number" placeholder="Teléfono">
                        <label for="año-veh">Año</label>
                        <input name="año-veh" type="number" placeholder="Teléfono">
                        <div class="buttons">
                            <button class="cancel_button" type="button" >ATRAS</button>   
                            <button class="subir_datos" type="button"> AGREGAR </button>   
                        </div>                   
                    </form>
                </div>
            </section>
        <!-- Fin CHOFERES & COCHES -->

        <!-- Inicio PARTICULARES -->
            <section class="bloque" id="particular">
                <div class="conteiner-section conteiner-cliente">
                    <div class="titulo-section">
                        <i class="fa-solid fa-bars navbar_block" onclick="nav_block()"></i>
                        <i class="fa-solid fa-person navbar_icon"></i>
                        <h2>PARTICULARES</h2>
                    </div>
                    <form action="GET">
                        <div class="inputs-busqueda">
                            <button class="filtrar"> FILTRAR </button>
                            <button class="agregar" onclick="ventanaSeccion('.conteiner-cliente', '.BRS-cliente', '.cancel_button')" type="button">AGREGAR</button>
                        </div>
                    </form>
                    <table>
                        <thead>
                            <tr class="indicadores">
                                <th> COD </th>
                                <th> LISTA NEGRA </th>
                                <th> NOMBRE </th>
                                <th> APELLIDO </th>
                                <th> DIRECCIÓN </th>
                            </tr>
                        </thead>
                        <tbody class="registro-cliente"></tbody>
                    </table>
                </div>
                <div class="block_relative_section BRS-cliente">
                    <form class="alert_section">
                        <label for="ln">Lista negra</label>
                        <select name="ln">
                            <option value="">--Seleccione opción</option>
                            <option value="1">SI</option>
                            <option value="0">NO</option>
                        </select>
                        <label for="nombre">Nombre</label>
                        <input name="nombre" type="text" placeholder="Nombre">
                        <label for="apellido">Apellido</label>
                        <input name="apellido" type="text" placeholder="Apellido">
                        <label for="cedula">Cedula</label>
                        <input name="cedula" type="number" placeholder="Cedula">
                        <label for="direccion">Dirección</label>
                        <input name="direccion" type="text" placeholder="Dirección">
                        <label for="tel">Teléfono</label>
                        <input name="tel" type="number" placeholder="Teléfono">
                        <div class="buttons">
                            <button type="button" class="cancel_button"> CANCELAR </button>   
                            <button class="subir_datos"> AGREGAR </button>   
                        </div>                      
                    </form>
                </div>
            </section>
        <!-- Fin PARTICULARES -->

        <!-- Inicio EMPRESA -->
            <section class="bloque" id="empresa">
                <div class="conteiner-section conteiner-empresa">
                    <div class="titulo-section">
                        <i class="fa-solid fa-bars navbar_block" onclick="nav_block()"></i>
                        <i class="fa-solid fa-building navbar_icon"></i>
                        <h2>EMPRESAS</h2>
                    </div>
                    <form action="GET">
                        <div class="inputs-busqueda">
                            <button class="filtrar"> FILTRAR </button>
                            <button class="agregar" onclick="ventanaSeccion('.conteiner-empresa', '.BRS-empresa', '.cancel_button')" type="button">AGREGAR</button>
                        </div>
                    </form>
                    <table>
                        <thead>
                            <tr class="indicadores">
                                <th>RUT</th>
                                <th>LISTA NEGRA</th>
                                <th>NOMBRE</th>
                                <th>RAZÓN SOCIAL</th>
                                <th>DIRECCIÓN</th>
                            </tr>
                        </thead>
                        <tbody class="registro-empresa"></tbody>
                    </table>
                </div>
                <div class="block_relative_section BRS-empresa">
                    <form class="alert_section">
                        <div class="conteiner_form">
                            <div>
                                <label for="rut_empresa">RUT</label>
                                <input name="rut_empresa" type="number" placeholder="RUT" required>
                                <label for="ln_empresa">Lista negra</label>
                                <select name="ln_empresa" id="">
                                    <option value="">--Seleccione opción</option>
                                    <option value="1">SI</option>
                                    <option value="0">NO</option>
                                </select>
                                <label for="nombre_empresa">Nombre fantasía de la empresa</label>
                                <input name="nombre_empresa" type="text" placeholder="Nombre fantasía" required>
                                <label for="rs_empresa">Razón social</label>
                                <input name="rs_empresa" type="text" placeholder="Razón social" required>     
                            </div>
                            <div>
                                <label for="direccion_empresa">Dirección</label>
                                <input name="direccion_empresa" type="text" placeholder="Dirección" required>
                                <label for="tel_empresa">Teléfono</label>
                                <input name="tel_empresa" type="number" placeholder="Teléfono" required>
                                <label for="contacto_empresa">Persona de contacto</label>
                                <input name="contacto_empresa" type="text" placeholder="Persona de contacto" required>
                                <label for="correo_empresa">Correo</label>
                                <input name="correo_empresa" type="email" placeholder="Correo" required>
                            </div>
                        </div>
                        <div class="buttons">
                            <button type="button" class="cancel_button"> CANCELAR </button>   
                            <button class="subir_datos"> AGREGAR </button>   
                        </div>                             
                    </form>
                </div>
            </section>
        <!-- Fin EMPRESA -->

        <!-- Inicio RESERVA -->
            <section class="bloque" id="reserva">
                <div class="conteiner-section conteiner-reserva">
                    <div class="titulo-section">
                        <i class="fa-solid fa-bars navbar_block" onclick="nav_block()"></i>
                        <i class="fa-solid fa-calendar-days navbar_icon"></i>
                        <h2>RESERVAS</h2>
                    </div>
                    <form action="GET">
                        <div class="inputs-busqueda">
                            <button class="filtrar"> FILTRAR </button>
                            <button class="agregar" onclick="ventanaSeccion('.conteiner-reserva', '.BRS-reserva', '.cancel_button')" type="button">AGREGAR</button>
                        </div>
                    </form>
                    <table>
                        <thead>
                            <tr class="indicadores">
                                <th>COD</th>
                                <th>TIPO</th>
                                <th>PASAJERO</th>
                                <th>CHOFER</th>
                                <th>TELÉFONO</th>
                            </tr>
                        </thead>
                        <tbody class="registro-reserva"></tbody>
                    </table>
                </div>
                <div class="block_relative_section BRS-reserva">
                    <form class="alert_section">
                        <div class="conteiner_form">
                            <div>
                                <label for="tipo">Tipo</label>
                                <select name="tipo">
                                    <option value="">--Seleccione opción</option>
                                    <option value="Empresa">Empresa</option>
                                    <option value="Particular">Particular</option>
                                </select>
                                <label for="pasajero">Nombre del pasajero</label>
                                <input name="pasajero" type="text" placeholder="Nombre">
                                <label for="chofer">Chofer</label>
                                <input name="chofer" type="number" placeholder="Cédula">
                                <label for="fecha_viaje">Fecha del viaje</label>
                                <input name="fecha_viaje" type="text" placeholder="Fecha del servicio a realizar">
                                <label for="hora">Hora</label>
                                <input name="hora" type="number" placeholder="hrs">
                            </div>
                            <div>
                                <label for="tel">Teléfono del pasajero</label>
                                <input name="tel" type="number" placeholder="Teléfono">
                                <label for="origen">Origen</label>
                                <input name="origen" type="number" placeholder="Origen">
                                <label for="fecha_reserva">Fecha de reserva</label>
                                <input name="fecha_reserva" type="text" value="<?php echo date("d:m:Y")?>" readonly>
                                <label for="distancia">Distancia</label>
                                <input name="distancia" type="text" placeholder="km">
                                <label for="destino">Destino</label>
                                <input name="destino" type="number" placeholder="Destino">
                            </div>
                        </div>
                        <label for="comentario">Comentario</label>
                        <textarea name="comentario" placeholder="Comentario"></textarea>
                        <div class="buttons">
                            <button type="button" class="cancel_button"> CANCELAR </button>   
                            <button class="subir_datos"> AGREGAR </button>   
                        </div>                          
                    </form>
                </div>
            </section>
        <!-- Fin RESERVA -->

        <!-- Inicio GASTOS DE MANTENIMIENTO -->
            <section class="bloque" id="gastos-de-mantenimiento">
                <div class="conteiner-section conteiner-GDM">
                    <div class="titulo-section">
                        <i class="fa-solid fa-bars navbar_block" onclick="nav_block()" ></i>
                        <i class="fa-solid fa-wrench navbar_icon"></i>
                        <h2>GASTOS DE MANTENIMIENTO</h2>
                    </div>
                    <form method="POST" action="controller/agregar/a_mantenimiento.php">
                        <div class="inputs-busqueda">
                            <button class="filtrar"> FILTRAR </button>
                            <button class="agregar" onclick="ventanaSeccion('.conteiner-GDM', '.BRS-GDM', '.cancel_button')" type="button">AGREGAR</button>
                        </div>
                    </form>
                    <table >
                        <thead>
                            <tr class="indicadores">
                                <th>COD</th>
                                <th>FECHA </th>
                                <th>TIPO DE MANTENIMIENTO</th>
                                <th>GASTOS DE MANTENIMIENTO</th>
                                <th>COMENTARIOS</th>
                            </tr>
                        </thead>
                        <tbody class="registro-GDM">
                        </tbody>
                    </table>
                </div>
                <div class="block_relative_section BRS-GDM">
                    <form class="alert_section">
                        <label for="fecha_gdm">Fecha</label>
                        <input name="fecha_gdm" type="date">
                        <label for="concepto_gdm">Tipo de mantenimiento</label>
                        <select name="concepto_gdm">
                            <option value="">--Por favor eliga una opción</option>
                            <option value="Gasoil">GASOIL</option>
                            <option value="Cambio_aceite">CAMBIO ACEITE</option>
                            <option value="Electricista">ELECTRICISTA</option>
                            <option value="Alineacion_balanceo">ALINEACIÓN Y BALANCEO</option>
                            <option value="Gomeria">GOMERÍA</option>
                            <option value="Cambio_correa">CAMBIO DE CORREA</option>
                            <option value="Frenos">FRENOS</option>
                            <option value="Embrague">EMBRAGUE</option>
                            <option value="Chapista">CHAPISTA</option>
                            <option value="Otros">Otros</option>
                        </select>  
                        <label for="importe_gdm">Importe</label>
                        <input name="importe_gdm" type="number" placeholder="Importe">
                        <label for="comentario-gdm">Comentario</label>
                        <textarea name="comentario_gdm" cols="30" rows="10" placeholder="Comentario"></textarea>
                        <div class="buttons">
                            <button type="button" class="cancel_button"> CANCELAR </button>   
                            <button class="subir_datos"> AGREGAR </button>   
                        </div>                             
                    </form>
                </div>
            </section>
        <!-- Fin GASTOS DE MANTENIMIENTO -->
    </main>
    <script src="../view/js/personas.js"></script>
    <!-- <script src="../view/js/agregar/add_operador.js"></script> -->
    <!-- <script src="../view/js/agregar/add_chofer.js"></script> -->
</body>
</html>