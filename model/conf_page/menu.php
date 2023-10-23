<?php 
    session_start();
    if(isset($_SESSION['tipoUsuario'] )) {
        $tipoUsuario = $_SESSION['tipoUsuario']; 
    } else {
        die("Sesión cerrada. Por favor, ingrese usuario y contraseña");
    }
    $dir = '../../view/css/administrador.css';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>InteliGO</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
        if ($tipoUsuario == 'administrador'){
            echo '<link rel="stylesheet" href="../../view/css/administrador.css">';
        } else {
            echo '<link rel="stylesheet" href="../../view/css/operativo.css">';
        }
    ?>
    <link rel="shortcut icon" href="../../view/img/logofinal/logoIco3.ico">
    <script src="https://kit.fontawesome.com/58fb14bc94.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-solid-straight/css/uicons-solid-straight.css'>
    <script src="../../view/js/jquery.min.js"></script>
</head>
<body>
    <section id="alert-add">
        <i class="fa fa-check fa-1x"></i> 
        <p>Se ha agregado correctamente</p>
    </section>
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
                                <span class="spanPromotion"><span> <?php echo $_SESSION['nombreUsuario'];?> </span><span> | </span><span> Administrador </span></span>
                            <?php
                        } else {
                            ?>
                                <span class="spanPromotion"><span> <?php echo $_SESSION['nombreUsuario'];?> </span><span> | </span><span> Operador </span></span>
                            <?php 
                        } ?>
                </div>
            </div>
        </section>
        <section id="opciones">
            <button class="opciones-hilera" rel="#inicio" onclick="opcion_menu(this)"> 
                <i class="fa-solid fa-house"></i>
                <span>Home</span>
            </button>
            <?php
                if($tipoUsuario=='administrador') {
                ?>
                    <button class="opciones-hilera" rel="#operador" onclick="opcion_menu(this)">
                        <ion-icon name="people"></ion-icon>
                        <span>Operadores</span> 
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
                <span>Mantenimiento</span>
            </button>
            <button class="opciones-hilera" rel="#acercaDe" onclick="opcion_menu(this)"> 
                <i class="fa-solid fa-info"></i>
                <span>Acerca De</span>
            </button>
            <div id="logout"> 
                <i class="fa-solid fa-right-from-bracket"></i>
            </div>
        </section>
    </nav>
    <main>
        <section class="bloque" id="inicio">
            <i class="fa-solid fa-bars navbar_block" onclick="nav_block()" ></i>
            <main>
                <h1> BIENVENIDO DE NUEVO </h1>
                <?php
                    if ($tipoUsuario == 'administrador') {
                        ?>
                            <span class="spanPromotion"><?php echo $_SESSION['nombreUsuario'];?> <span> | </span> Administrador</span>
                        <?php
                    } else {
                        ?>
                            <span class="spanPromotion"><?php echo $_SESSION['nombreUsuario'];?> <span> | </span> Operador</span>
                        <?php
                    }
                ?>
            </main>
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
                            <button class="filtrar" type="button"> FILTRAR </button>
                            <button class="agregar" onclick="ventanaSeccion('.conteiner-operador', '.BRS-operador', '.cancel_button')" type="button">AÑADIR</button>
                            <button class="eliminados" type="button">ELIMINADOS</button>
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
                        <tbody class="registro-del_operadores"></tbody>
                    </table>
                </div>
                <div class="block_relative_section BRS-operador">
                    <form class="alert_section">
                        <label for="ci-operador">Cedula</label>
                        <input name="ci-operador" type="text" maxlength="8">
                        <label for="nombre-operador">Nombre completo</label>
                        <input name="nombre-operador" type="text">
                        <label for="contrasena-operador">Contraseña</label>
                        <input name="contrasena-operador" type="text">
                        <label for="fecha-operador">Fecha de ingreso</label>
                        <input type="datetime" name="fecha-operador" value="<?php echo date("Y-m-d");?>" required readonly>
                        <div class="buttons">
                            <button class="cancel_button" type="button">Cancelar</button>   
                            <button class="subir_datos" type="button">Agregar</button>
                        </div>
                    </form>
                </div>
            </section>
        <!-- Fin OPERADORES -->

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
                            <button class="filtrar" type="button"> FILTRAR </button>
                            <button class="agregar" onclick="ventanaSeccion('.conteiner-chofer', '.BRS-choferes', '.cancel_button')" type="button">AÑADIR</button>
                            <?php
                                if ($tipoUsuario == 'administrador') {
                                    ?>
                                        <button class="eliminados" type="button">ELIMINADOS</button>
                                    <?php
                                }
                            ?>
                        </div>
                    </form>
                    <table>
                        <thead>
                            <tr class="indicadores">
                                <th>NOMBRE</th>
                                <th>MATRICULA</th>
                                <th>MODELO</th>
                                <th>MARCA</th>
                                <th>AÑO</th>
                            </tr>
                        </thead>
                        <tbody class="registro-choferes"></tbody>
                    </table>
                </div>
                <div class="block_relative_section BRS-choferes">
                    <form class="alert_section">
                        <div class="conteiner_form">
                            <div>
                                <label for="ci-chofer">Cedula</label>
                                <input name="ci-chofer" type="text" maxlength="8">
                                <label for="nombre-chofer">Nombre completo</label>
                                <input name="nombre-chofer" type="text">     
                            </div>
                            <div>
                                <label for="matricula-veh">Matrícula</label>
                                <input name="matricula-veh" type="text">
                                <label for="modelo-veh">Modelo</label>
                                <input name="modelo-veh" type="text">
                            </div>
                        </div>
                        <label for="marcha-veh">Marca</label>
                        <input name="marca-veh" type="text">
                        <label for="año-veh">Año</label>
                        <input name="año-veh" type="text" maxlength="4">
                        <label for="tel-chofer">Teléfono</label>
                        <input name="tel-chofer" type="text" maxlength="12">
                        <div class="buttons">
                            <button class="cancel_button" type="button">Cancelar</button>   
                            <button class="subir_datos" type="button">Agregar</button>   
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
                            <button class="filtrar">FILTRAR</button>
                            <button class="agregar" onclick="ventanaSeccion('.conteiner-cliente', '.BRS-cliente', '.cancel_button')" type="button">AÑADIR</button>
                            <?php
                                if ($tipoUsuario == 'administrador') {
                                    ?>
                                        <button class="eliminados" type="button">ELIMINADOS</button>
                                    <?php
                                }
                            ?>
                        </div>
                    </form>
                    <table>
                        <thead>
                            <tr class="indicadores">
                                <th>TELÉFONO</th>
                                <th>LISTA NEGRA</th>
                                <th>NOMBRE</th>
                                <th>APELLIDO</th>
                                <th>DIRECCIÓN</th>
                            </tr>
                        </thead>
                        <tbody class="registro-cliente"></tbody>
                    </table>
                </div>
                <div class="block_relative_section BRS-cliente">
                    <form class="alert_section">
                        <label for="nombre-particular">Nombre</label>
                        <input name="nombre-particular" type="text">
                        <label for="apellido-particular">Apellido</label>
                        <input name="apellido-particular" type="text">
                        <label for="ln-particular">Lista negra</label>
                        <select name="ln-particular">
                            <option value="">--Seleccione opción</option>
                            <option value="1">SI</option>
                            <option value="0">NO</option>
                        </select>
                        <label for="direccion-particular">Dirección</label>
                        <input name="direccion-particular" type="text">
                        <label for="tel-particular">Teléfono</label>
                        <input name="tel-particular" type="number">
                        <div class="buttons">
                            <button class="cancel_button" type="button">Cancelar</button>
                            <button class="subir_datos" type="button">Agregar</button>
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
                            <button class="filtrar">FILTRAR</button>
                            <button class="agregar" onclick="ventanaSeccion('.conteiner-empresa', '.BRS-empresa', '.cancel_button')" type="button">AÑADIR</button>
                            <?php
                                if ($tipoUsuario == 'administrador') {
                                    ?>
                                        <button class="eliminados" type="button">ELIMINADOS</button>
                                    <?php
                                }
                            ?>
                        </div>
                    </form>
                    <table>
                        <thead>
                            <tr class="indicadores">
                                <th>RUT</th>
                                <th>LISTA NEGRA</th>
                                <th>NOMBRE FANTASÍA</th>
                                <th>DIRECCIÓN</th>
                                <th>TELÉFONO</th>
                            </tr>
                        </thead>
                        <tbody class="registro-empresa"></tbody>
                    </table>
                </div>
                <div class="block_relative_section BRS-empresa">
                    <form class="alert_section">
                        <div class="conteiner_form">
                            <div>
                                <label for="rut-empresa">RUT</label>
                                <input name="rut-empresa" type="number" required>
                                <label for="listanegra-empresa">Lista negra</label>
                                <select name="listanegra-empresa" id="">
                                    <option value="">--Seleccione opción</option>
                                    <option value="1">SI</option>
                                    <option value="0">NO</option>
                                </select>
                                <label for="fantasia-empresa">Nombre fantasía</label>
                                <input name="fantasia-empresa" type="text" required>
                                <label for="razonsocial-empresa">Razón social</label>
                                <input name="razonsocial-empresa" type="text" required>     
                            </div>
                            <div>
                                <label for="direccion-empresa">Dirección</label>
                                <input name="direccion-empresa" type="text" required>
                                <label for="tel-empresa">Teléfono</label>
                                <input name="tel-empresa" type="number" required>
                                <label for="empleado-empresa">Persona de contacto</label>
                                <input name="empleado-empresa" type="text" required>
                                <label for="correo-empresa">Correo</label>
                                <input name="correo-empresa" type="email" required>
                            </div>
                        </div>
                        <div class="buttons">
                            <button class="cancel_button" type="button">Cancelar</button>   
                            <button class="subir_datos" type="button">Agregar</button>   
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
                            <button class="filtrar">FILTRAR</button>
                            <button class="agregar" onclick="ventanaSeccion('.conteiner-reserva', '.BRS-reserva', '.cancel_button')" type="button">AÑADIR</button>
                            <?php
                                if ($tipoUsuario == 'administrador') {
                                    ?>
                                        <button class="eliminados" type="button">ELIMINADOS</button>
                                    <?php
                                }
                            ?>
                        </div>
                    </form>
                    <table>
                        <thead>
                            <tr class="indicadores">
                                <th>COD</th>
                                <th>TIPO</th>
                                <th>CHOFER</th>
                                <th>ORIGEN</th>
                                <th>DESTINO</th>
                            </tr>
                        </thead>
                        <tbody class="registro-reserva"></tbody>
                    </table>
                </div>
                <div class="block_relative_section BRS-reserva">
                    <form class="alert_section">
                        <div class="conteiner_form">
                            <div>
                                <label for="tipo-reserva">Tipo</label>
                                <select name="tipo-reserva">
                                    <option value="">--Seleccione opción</option>
                                    <option value="Empresa">Empresa</option>
                                    <option value="Particular">Particular</option>
                                </select>
                                <label for="pasajero-reserva">Pasajero</label>
                                <input name="pasajero-reserva" type="text">
                                <label for="origen-reserva">Origen</label>
                                <input name="origen-reserva" type="number">
                                <label for="fecha_reserva-reserva">Fecha de reserva</label>
                                <input name="fecha_reserva-reserva" type="text" value="<?php echo date("d:m:Y")?>" readonly>
                                <label for="hora-reserva">Hora de reserva</label>
                                <input name="hora-reserva" type="text" value="<?php echo date("H:i:s")?>" readonly>
                            </div>
                            <div>
                                <label for="chofer-reserva">Chofer</label>
                                <select name="chofer-reserva" id="">
                                    <option value="">--Seleccione Chofer disponible</option>
                                </select>
                                <label for="tel-reserva">Teléfono del pasajero</label>
                                <input name="tel-reserva" type="number">
                                <label for="destino-reserva">Destino</label>
                                <input name="destino-reserva" type="number">
                                <label for="fecha_reserva-viaje">Fecha del viaje</label>
                                <input name="fecha_viaje-reserva" type="date">
                                <label for="hora-viaje">Hora del viaje</label>
                                <input name="hora-viaje" type="time">
                            </div>
                        </div>
                        <label for="comentario-reserva">Comentario</label>
                        <textarea name="comentario-reserva"></textarea>
                        <div class="buttons">
                            <button class="cancel_button" type="button">Cancelar</button>   
                            <button class="subir_datos" type="button">Agregar</button>   
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
                        <h2>MANTENIMIENTO</h2>
                    </div>
                    <form>
                        <div class="inputs-busqueda">
                            <button class="filtrar">FILTRAR</button>
                            <button class="agregar" onclick="ventanaSeccion('.conteiner-GDM', '.BRS-GDM', '.cancel_button')" type="button">AÑADIR</button>
                            <?php
                                if ($tipoUsuario == 'administrador') {
                                    ?>
                                        <button class="eliminados" type="button">ELIMINADOS</button>
                                    <?php
                                }
                            ?>
                        </div>
                    </form>
                    <table>
                        <thead>
                            <tr class="indicadores">
                                <th>COD-FACTURA</th>
                                <th>MATRÍCULA</th>
                                <th>CONCEPTO</th>
                                <th>COMENTARIOS</th>
                                <th>IMPORTE TOTAL</th>
                            </tr>
                        </thead>
                        <tbody class="registro-GDM"></tbody>
                    </table>
                </div>
                <div class="block_relative_section BRS-GDM">
                    <form class="alert_section">
                        <div class="conteiner_form">
                            <div>
                                <label for="codigofac-gdm">Cod-factura</label>
                                <input name="codigofac-gdm" type="number">
                                <label for="concepto-gdm">Concepto</label>
                                <select name="concepto-gdm">
                                    <option value="">--Por favor elija una opción</option>
                                    <option value="Gasoil">Gasoil</option>
                                    <option value="Cambio_aceite">Cambio de aceite</option>
                                    <option value="Electricista">Electricista</option>
                                    <option value="Alineacion_balanceo">Alineación y balanceo</option>
                                    <option value="Gomeria">Gomería</option>
                                    <option value="Cambio_correa">Cambio de correa</option>
                                    <option value="Frenos">Frenos</option>
                                    <option value="Embrague">Embrague</option>
                                    <option value="Chapista">Chapista</option>
                                    <option value="Otros">Otros</option>
                                </select>  
                            </div>
                            <div> 
                                <label for="matricula-gdm">Matrícula</label>
                                <input name="matricula-gdm" type="text">
                                <label for="importe-gdm">Importe</label>
                                <input name="importe-gdm" type="number">
                            </div>     
                        </div>
                        <label for="fecha-gdm">Fecha</label>
                        <input name="fecha-gdm" type="date">
                        <label for="comentario-gdm">Comentario</label>
                        <textarea name="comentario-gdm"></textarea> 
                        <div class="buttons">
                            <button class="cancel_button" type="button">Cancelar</button>   
                            <button class="subir_datos" type="button">Agregar</button>   
                        </div>                             
                    </form>
                </div>
            </section>
        <!-- Fin GASTOS DE MANTENIMIENTO -->

        <!-- ACERCA DE -->
        <section class="bloque" id="acercaDe">
            <main>
                <i class="fa-solid fa-bars navbar_block" onclick="nav_block()"></i>
                <div>
                    <img src="../../view/img/logofinal/whiteLogo.png" alt="">
                </div>
                <div>
                    <span class="spanPromotion">Powered by</span>
                    <img src="../../view/img/logobk.png" alt="">
                </div>
            </main>
        </section>
        <!-- ACERCA DE -->
    </main>
    <script src="../../view/js/tableData.js"></script>
    <script src="../../view/js/consultar.js"></script>
    <script type="module" src="../../view/js/add_all.js"></script>
</body>
</html>