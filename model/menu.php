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
</head>
<body>
    <section id="alert-salir">
        <div>
            <i id="xmark-salir" class="fa-solid fa-xmark"></i>
            <!-- <i id="xmark-salir "class="fi fi-sr-circle-xmark"></i> -->
            <p>¿Desea cerrar sesión?</p>
                <a href="salir.php">CERRAR SESIÓN</a>
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
                                <h3><?php echo $_SESSION['nombreUsuario'];?></h3>
                                <span>Administrador</span>
                            <?php
                        } else {
                            ?>
                                <h3><?php echo $_SESSION['nombreUsuario'];?></h3>
                                <span>Operador</span>
                            <?php 
                        } ?>
                </div>
            </div>
        </section>
        <section id="opciones">
            <div id="logout"> 
                <ion-icon name="log-out"></ion-icon>
                <span>CERRAR SESION</span>
            </div>
            <button class="opciones-hilera" id="home" rel="#inicio" onclick="opcion_menu(this)"> 
                <i class="fa-solid fa-house-chimney"></i>
                <span>Home</span>
            </button>
            <button class="opciones-hilera" rel="#estadistica" onclick="opcion_menu(this)"> 
                <ion-icon name="stats"></ion-icon>
                <span>Estadísticas</span>
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
                <span>Choferes & Coches</span> 
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
        <!-- Inicio HOME -->
            <section class="bloque" id="inicio">
                <div class="conteiner-inicio">
                    <i id="active-nav" class="fa-solid fa-bars navbar_block" onclick="nav_block()"></i>
                    <img src="../view/img/logofinal/whiteLogo.png" class="logo-img"> 
                    <div class="inicio-usuario">
                        <h1> BIENVENIDO DE NUEVO </h1>
                        <?php
                            if ($tipoUsuario == 'administrador') {
                                ?>
                                    <span> 
                                        <?php echo $_SESSION['nombreUsuario'];?> <span> | </span> Administrador
                                    </span>
                                <?php
                            } else {
                                ?>
                                    <span> 
                                        <?php echo $_SESSION['nombreUsuario'];?> <span> | </span> Operador
                                    </span>
                                <?php
                            }
                        ?>
                    </div>
                </div>
            </section>
        <!-- Fin HOME -->

        <!-- Inicio ESTADISTICAS -->
            <section class="bloque" id="estadistica">
                <div class="conteiner-section conteiner-estadística">
                    <div class="titulo-section titulo-estadistica">
                        <i class="fa-solid fa-bars navbar_block" onclick="nav_block()"></i>
                        <h2>ESTADÍSTICAS</h2>
                    </div>
                </div>
            </section>
        <!-- Fin ESTADISTICAS -->

        <?php
                if ($tipoUsuario == 'administrador') {
                ?>
        <!-- Inicio OPERADORES -->
            <section class="bloque" id="operador">
                <div class="conteiner-section conteiner-operador">
                    <div class="titulo-section">
                        <i class="fa-solid fa-bars navbar_block" onclick="nav_block()"></i>
                        <h2>OPERADORES</h2>
                    </div>
                    <form action="GET">
                        <div class="inputs-busqueda">
                            <button class="filtrar"> FILTRAR </button>
                            <button class="agregar" onclick="ventanaSeccion('.conteiner-operador', '.BRS-operador', '#xmark-operador')" type="button">AGREGAR</button>
                        </div>
                    </form>
                    <div>
                        <table >
                            <thead>
                                <tr class="indicadores">
                                    <th> CEDULA </th>
                                    <th> NOMBRE DEL OPERADOR </th>
                                    <th> FECHA DE INGRESO </th>
                                </tr>
                            </thead>
                            <tbody class="registro-operadores">
                            </tbody>
                        </table>
                    </div>
                </div>
                <i id="xmark-administrador" class="fa-solid fa-xmark"></i>
                <div class="block-relative-section BRS-operador">
                    <div class="alert-section">
                        <form method="POST" action="controller/agregar/a_administradores.php">
                            <div>
                                <label for="nombre-operador">Nombre completo</label>
                                <input name="nombre-operador" type="text" placeholder="Nombre del empleado" required>
                                <label for="ci-operador">Cedula</label>
                                <input name="ci-operador" type="number" placeholder="Cédula" required>
                                <label for="edad-operador">Edad</label>
                                <input name="edad-operador" type="number" placeholder="Edad" required>
                                <label for="rol-operador">Rol del usuario</label>
                                <input name="rol-operador" type="text" value="Operador" readonly>
                                <label for="contrasena-operador">Contraseña</label>
                                <input name="contrasena-operador" type="text" placeholder="Contraseña" required>
                                <label for="fechaing-operador">Fecha de ingreso</label>
                                <input type="datetime" name="fechaing-operador" value="<?php echo date("Y-m-d");?>" required readonly>
                            </div>    
                            <button type="submit"> AGREGAR </button>   
                        </form>
                    </div>
                </div>
            </section>
        <!-- Fin OPERADORES -->

        <!-- Inicio ELIMINADOS -->
            <section class="bloque" id="eliminados">
                <div class="conteiner-section conteiner-eliminados">
                    <div class="titulo-section">
                        <i class="fa-solid fa-bars navbar_block" onclick="nav_block()"></i>
                        <h2>ELIMINADOS</h2>
                    </div>
                    <form action="GET">
                        <div class="inputs-busqueda">
                            <button class="filtrar"> FILTRAR </button>
                            <button class="agregar" onclick="ventanaSeccion('.conteiner-eliminados', '.BRS-eliminados', '#xmark-eliminados')" type="button">AGREGAR</button>
                        </div>
                    </form>
                    <div>
                        <table>
                            <thead>
                                <tr class="indicadores">
                                    <th> ID </th>
                                    <th> NOMBRE </th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody class="registro-eliminados"></tbody>
                        </table>
                    </div>
                </div>
                <i id="xmark-eliminados" class="fa-solid fa-xmark"></i>
                <div class="block-relative-section BRS-eliminados">
                    <div class="alert-section">
                        <form action="">
                            <div>
                                <label for="nombre-eliminado">Nombre completo</label>
                                <input name="nombre-eliminado" type="text">
                                <label for="cedula-eliminado">Cedula</label>
                                <input name="cedula-eliminado" type="number">
                                <label for="fechaIng-eliminado">Fecha de ingreso</label>
                                <input name="fechaIng-eliminado" type="date">
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
        <!-- Inicio CHOFERES & COCHES -->
            <section class="bloque" id="chofer">
                <div class="conteiner-section conteiner-chofer">
                    <div class="titulo-section">
                        <i class="fa-solid fa-bars navbar_block" onclick="nav_block()"></i>
                        <h2>CHOFERES</h2>
                    </div>
                    <form action="GET">
                        <div class="inputs-busqueda">
                            <button class="filtrar"> FILTRAR </button>
                            <button class="agregar" onclick="ventanaSeccion('.conteiner-choferes', '.BRS-choferes', '#xmark-chofer')" type="button">AGREGAR</button>
                        </div>
                    </form>
                    <div>
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
                </div>

                <!-- Bloque Agregar -->
                <i id="xmark-chofer" class="fa-solid fa-xmark"></i>
                <div class="block-relative-section BRS-choferes">
                    <div class="alert-section">
                        <form method="POST" action="controller/agregar/a_choferes.php">
                            <div>
                                <label for="cedula-chofer">Cedula</label>
                                <input name="cedula-chofer" type="number" placeholder="Cédula">
                                <label for="nombre-chofer">Nombre completo</label>
                                <input name="nombre-chofer" type="text" placeholder="Nombre completo">     
                                <label for="tel-chofer">Teléfono</label>
                                <input name="tel-chofer" type="number" placeholder="Teléfono">
                            </div>    
                            <button type="submit"> AGREGAR </button>                                  
                        </form>
                    </div>
                </div>

            </section>
        <!-- Fin CHOFERES -->

        <!-- Inicio PARTICULARES -->
            <section class="bloque" id="particular">
                <div class="conteiner-section conteiner-cliente">
                    <div class="titulo-section">
                        <i class="fa-solid fa-bars navbar_block" onclick="nav_block()"></i>
                        <h2>PARTICULARES</h2>
                    </div>
                    <form action="GET">
                        <div class="inputs-busqueda">
                            <button class="filtrar"> FILTRAR </button>
                            <button class="agregar" onclick="ventanaSeccion('.conteiner-cliente', '.BRS-cliente', '#xmark-cliente')" type="button">AGREGAR</button>
                        </div>
                    </form>
                    <div>
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
                </div>
                <i id="xmark-cliente" class="fa-solid fa-xmark"></i>
                <div class="block-relative-section BRS-cliente">
                    <div class="alert-section">
                        <form method="POST" action="controller/agregar/a_particulares.php">
                            <div>
                                <label for="cod">COD</label>
                                <input name="cod" type="text">
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
                                <input name="cedula" type="number" placeholder="Cédula">
                                <label for="direccion">Dirección</label>
                                <input name="direccion" type="text" placeholder="Dirección">
                                <label for="tel">Teléfono</label>
                                <input name="tel" type="number">
                            </div>    
                            <button type="submit"> AGREGAR </button>                                  
                        </form>
                    </div>
                </div>
            </section>
        <!-- Fin PARTICULARES -->

        <!-- Inicio EMPRESA -->
            <section class="bloque" id="empresa">
                <div class="conteiner-section conteiner-empresa">
                    <div class="titulo-section">
                        <i class="fa-solid fa-bars navbar_block" onclick="nav_block()"></i>
                        <h2>EMPRESAS</h2>
                    </div>
                    <form action="GET">
                        <div class="inputs-busqueda">
                            <button class="filtrar"> FILTRAR </button>
                            <button class="agregar" onclick="ventanaSeccion('.conteiner-empresa', '.BRS-empresa', '#xmark-empresa')" type="button">AGREGAR</button>
                        </div>
                    </form>
                    <div>
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
                </div>

                <i id="xmark-empresa" class="fa-solid fa-xmark"></i>
                <div class="block-relative-section BRS-empresa">
                    <div class="alert-section">
                        <form method="POST" action="controller/agregar/a_empresas.php">
                            <div>
                                <label for="cod_empresa">COD Cliente</label>
                                <input name="cod_empresa" type="number" placeholder="RUT" required>
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
                                <label for="direccion_empresa">Dirección</label>
                                <input name="direccion_empresa" type="text" placeholder="Dirección" required>
                                <label for="tel_empresa">Teléfono</label>
                                <input name="tel_empresa" type="number" placeholder="Teléfono" required>
                                <label for="contacto_empresa">Persona de contacto</label>
                                <input name="contacto_empresa" type="text" placeholder="Persona de contacto" required>
                                <label for="correo_empresa">Correo</label>
                                <input name="correo_empresa" type="text" placeholder="Correo" required>
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
                    <div class="titulo-section">
                        <i class="fa-solid fa-bars navbar_block" onclick="nav_block()"></i>
                        <h2>RESERVAS</h2>
                    </div>
                    <form action="GET">
                        <div class="inputs-busqueda">
                            <button class="filtrar"> FILTRAR </button>
                            <button class="agregar" onclick="ventanaSeccion('.conteiner-reserva', '.BRS-reserva', '#xmark-reserva')" type="button">AGREGAR</button>
                        </div>
                    </form>
                    <div>
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
                </div>
                <i id="xmark-reserva" class="fa-solid fa-xmark"></i>
                <div class="block-relative-section BRS-reserva">
                    <div class="alert-section-reserva">
                        <form method="POST" action="controller/agregar/a_reservas.php">
                            <div style="display: flex;">
                                <div>
                                    <label for="cod">COD</label>
                                    <input name="cod" type="text" placeholder="Codigo de servicio">
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
                                    <label for="tel">Teléfono del pasajero</label>
                                    <input name="tel" type="number" placeholder="Teléfono">
                                    <label for="origen">Origen</label>
                                    <input name="origen" type="number" placeholder="Origen">
                                    <label for="destino">Destino</label>
                                    <input name="destino" type="number" placeholder="Destino">
                                </div>
                                <div>
                                    <label for="fecha_reserva">Fecha de reserva</label>
                                    <input name="fecha_reserva" type="text" value="<?php echo date("d:m:Y")?>">
                                    <label for="fecha_viaje">Fecha del viaje</label>
                                    <input name="fecha_viaje" type="text" placeholder="Fecha del servicio a realizar">
                                    <label for="hora">Hora</label>
                                    <input name="hora" type="number" placeholder="hrs">
                                    <label for="distancia">Distancia</label>
                                    <input name="distancia" type="text" placeholder="km">
                                    <label for="comentario">Comentario</label>
                                    <textarea name="comentario" cols="30" rows="10"></textarea>
                                </div>
                            </div>
                            <button type="submit"> AGREGAR </button>                              
                        </form>
                    </div>
                </div>
            </section>
        <!-- Fin RESERVA -->

        <!-- Inicio GASTOS DE MANTENIMIENTO -->
            <section class="bloque" id="gastos-de-mantenimiento">
                <div class="conteiner-section conteiner-GDM">
                    <div class="titulo-section">
                        <i class="fa-solid fa-bars navbar_block" onclick="nav_block()"></i>
                        <h2>GASTOS DE MANTENIMIENTO</h2>
                    </div>
                    <form method="POST" action="controller/agregar/a_mantenimiento.php">
                        <div class="inputs-busqueda">
                            <button class="filtrar"> FILTRAR </button>
                            <button class="agregar" onclick="ventanaSeccion('.conteiner-GDM', '.BRS-GDM', '#xmark-GDM')" type="button">AGREGAR</button>
                        </div>
                    </form>
                    <div>
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
                </div>
                <i id="xmark-GDM" class="fa-solid fa-xmark"></i>
                <div class="block-relative-section BRS-GDM">
                    <div class="alert-section">
                        <form method="POST" action="controller/agregar/a_mantenimiento.php">
                            <div>
                                <label for="cod_gdm">COD</label>
                                <input name="cod_gdm" type="number" placeholder="Codigo">
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
                            </div>    
                            <button type="submit"> AGREGAR </button>                                  
                        </form>
                    </div>
                </div>
            </section>
        <!-- Fin GASTOS DE MANTENIMIENTO -->
    </main>
    <script src="../view/js/jquery.min.js"></script>
    <script src="../view/js/menu.js"></script>
    <script src="../view/js/personas.js"></script>
</body>
</html>