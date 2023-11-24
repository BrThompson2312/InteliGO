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
            echo '<link rel="stylesheet" href="../../view/css/administrador.css">';
        } else {
            echo '<link rel="stylesheet" href="../../view/css/operativo.css">';
        }
    ?>
    <link rel="shortcut icon" href="../../view/img/logofinal/logoIco3.ico">
    <script src="https://kit.fontawesome.com/4ffb78f01e.js" crossorigin="anonymous"></script>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-solid-straight/css/uicons-solid-straight.css'>
    <script src="../../view/js/jquery.min.js"></script>
</head>
<body>
    <section id="alert-add">
        <i class="fa fa-check fa-1x"></i> 
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
                <i class="fa-solid fa-home"></i>
                <span>Home</span>
            </button>
            <?php
                if($tipoUsuario=='administrador') {
                ?>
                    <button class="opciones-hilera" rel="#operador" onclick="opcion_menu(this)">
                        <i class="fa-solid fa-user"></i>
                        <span>Operadores</span> 
                    </button>
                <?php
                }
            ?>
            <button class="opciones-hilera" rel="#chofer" onclick="opcion_menu(this)">
                <i class="fi fi-ss-steering-wheel"></i>
                <span>Choferes</span> 
            </button>
            <button class="opciones-hilera" rel="#coche" onclick="opcion_menu(this)">
                <i class="fa-solid fa-car"></i>
                <span>Coches</span> 
            </button>
            <button class="opciones-hilera" rel="#asignacion" onclick="opcion_menu(this)">
                <i class="fa-solid fa-clipboard-list"></i>
                <span>Asignaciones</span> 
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
                        <i class="fa-solid fa-user navbar_icon"></i>
                        <h2>OPERADORES</h2>
                    </div>
                    <div class="alert-filtrar">
                        <div class="filter-block">
                            <div>
                                <label>Cedula</label>
                                <input class="ex-filt" type="number">
                            </div>
                            <div>
                                <label>Nombre del Operador</label>
                                <input class="ex-filt" type="text">
                            </div>
                            <div>
                                <label>Fecha de Ingreso</label>
                                <input class="ex-filt" type="text" placeholder="<?php echo date("Y-m-d h:m:s")?>">
                            </div>
                        </div>
                    </div>
                    <form>
                        <div class="inputs-busqueda">
                            <button class="filtrar" type="button"> FILTRAR </button>
                            <button class="agregar" onclick="ventanaSeccion('.conteiner-operador', '.BRS-operador', 'subir')" type="button">AÑADIR</button>
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
                        <label for="ci-operador">Cedula</label>
                        <input 
                            name="ci-operador" 
                            type="text" 
                            placeholder="12345678"
                            maxlength="8">
                        <label for="nombre-operador">Nombre de usuario</label>
                        <input 
                            name="nombre-operador" 
                            type="text" 
                            placeholder="John" 
                            maxlength="70">
                        <label for="contrasena-operador">Contraseña</label>
                        <input 
                            name="contrasena-operador" 
                            type="password" 
                            maxlength="16">
                        <div class="buttons">
                            <button class="cancel_button" type="button">Cancelar</button>   
                            <button class="subir_datos" type="button">Agregar</button>
                            <button class="modificar_datos" type="button">Modificar</button>
                        </div>
                    </form>
                </div>
            </section>
        <!-- Fin OPERADORES -->
        <?php
            }
        ?>
        <!-- Inicio CHOFERES -->
            <section class="bloque" id="chofer">
                <div class="conteiner-section conteiner-chofer">
                    <div class="titulo-section">
                        <i class="fa-solid fa-bars navbar_block" onclick="nav_block()"></i>
                        <i class="fi fi-ss-steering-wheel navbar_icon"></i>
                        <h2>CHOFERES</h2>
                    </div>
                    <div class="alert-filtrar">
                        <div class="filter-block">
                            <div>
                                <label>Teléfono</label>
                                <input class="ex-filt" type="number">
                            </div>
                            <div>
                                <label>Nombre</label>
                                <input class="ex-filt" type="text">
                            </div>
                            <div>
                                <label>Apellido</label>
                                <input class="ex-filt" type="text">
                            </div>
                            <div>
                                <label>Cedula</label>
                                <input class="ex-filt" type="number">
                            </div>
                        </div>
                    </div>
                    <form>
                        <div class="inputs-busqueda">
                            <button class="filtrar" type="button"> FILTRAR </button>
                            <button class="agregar" onclick="ventanaSeccion('.conteiner-chofer', '.BRS-choferes', 'subir')" type="button">AÑADIR</button>
                        </div>
                    </form>
                    <table>
                        <thead>
                            <tr class="indicadores">
                                <th>TELEFONO</th>
                                <th>NOMBRE</th>
                                <th>APELLIDO</th>
                                <th>CEDULA</th>
                            </tr>
                        </thead>
                        <tbody class="registro-choferes"></tbody>
                    </table>
                </div>
                <div class="block_relative_section BRS-choferes">
                    <form class="alert_section">
                        <label for="tel-chofer">Teléfono</label>
                        <input
                            name="tel-chofer" 
                            type="text" 
                            placeholder=" 012345678 | +59812345678 | 012 345 678"
                            maxlength="12">
                        <label for="nombre-chofer">Nombre</label>
                        <input 
                            name="nombre-chofer" 
                            type="text"
                            placeholder="John" 
                            maxlength="35">
                        <label for="apellido-chofer">Apellido</label>
                        <input 
                            name="apellido-chofer" 
                            type="text"
                            placeholder="White" 
                            maxlength="35">
                        <label for="ci-chofer">Cedula</label>
                        <input 
                            name="ci-chofer" 
                            type="text" 
                            placeholder="12345678" 
                            maxlength="8">
                        <div class="buttons">
                            <button class="cancel_button" type="button">Cancelar</button>   
                            <button class="subir_datos" type="button">Agregar</button>
                            <button class="modificar_datos" type="button">Modificar</button>
                        </div>  
                    </form>
                </div>
            </section>
        <!-- Fin CHOFERES -->

        <!-- Inicio COCHES -->
            <section class="bloque" id="coche">
                <div class="conteiner-section conteiner-coche">
                    <div class="titulo-section">
                        <i class="fa-solid fa-bars navbar_block" onclick="nav_block()"></i>
                        <i class="fi fi-ss-steering-wheel navbar_icon"></i>
                        <h2>COCHES</h2>
                    </div>
                    <div class="alert-filtrar">
                        <div class="filter-block">
                            <div>
                                <label>Matrícula</label>
                                <input class="ex-filt" type="text">
                            </div>
                            <div>
                                <label>Marca</label>
                                <input class="ex-filt" type="text">
                            </div>
                            <div>
                                <label>Modelo</label>
                                <input class="ex-filt" type="text">
                            </div>
                            <div>
                                <label>Año</label>
                                <input class="ex-filt" type="number">
                            </div>
                        </div>
                    </div>
                    <form>
                        <div class="inputs-busqueda">
                            <button class="filtrar" type="button"> FILTRAR </button>
                            <button class="agregar" onclick="ventanaSeccion('.conteiner-coche', '.BRS-coches','subir')" type="button">AÑADIR</button>
                        </div>
                    </form>
                    <table>
                        <thead>
                            <tr class="indicadores">
                                <th>MATRICULA</th>
                                <th>MARCA</th>
                                <th>MODELO</th>
                                <th>AÑO</th>
                            </tr>
                        </thead>
                        <tbody class="registro-coches"></tbody>
                    </table>
                </div>
                <div class="block_relative_section BRS-coches">
                    <form class="alert_section">
                        <label for="matricula-coche">Matrícula</label>
                        <input 
                            name="matricula-coche" 
                            type="text" 
                            placeholder="SRC4040" 
                            maxlength="7">
                        <label for="marca-coche">Marca</label>
                        <input 
                            name="marca-coche"
                            type="text"
                            placeholder="Toyota"
                            maxlength="20">
                        <label for="modelo-coche">Modelo</label>
                        <input 
                            name="modelo-coche" 
                            type="text" 
                            placeholder="ToyotaOne"
                            maxlength="20">     
                        <label for="año-coche">Año</label>
                        <input 
                            name="año-coche" 
                            type="text" 
                            placeholder="2023"
                            maxlength="4">
                        <div class="buttons">
                            <button class="cancel_button" type="button">Cancelar</button>   
                            <button class="subir_datos" type="button">Agregar</button>
                            <button class="modificar_datos" type="button">Modificar</button>
                        </div>                  
                    </form>
                </div>
            </section>
        <!-- Fin COCHES -->
         <!-- Inicio ASIGNACIONES -->
            <section class="bloque" id="asignacion">
                <div class="conteiner-section conteiner-asignacion">
                    <div class="titulo-section">
                        <i class="fa-solid fa-bars navbar_block" onclick="nav_block()"></i>
                        <i class="fa-solid fa-clipboard-list navbar_icon"></i>
                        <h2>ASIGNACIONES</h2>
                    </div>
                    <div class="alert-filtrar">
                        <div class="filter-block">
                            <div>
                                <label>Cedula</label>
                                <input class="ex-filt" type="number">
                            </div>
                            <div>
                                <label>Chofer</label>
                                <input class="ex-filt" type="text">
                            </div>
                            <div>
                                <label>Coche</label>
                                <input class="ex-filt" type="text">
                            </div>
                        </div>
                    </div>
                    <form>
                        <div class="inputs-busqueda">
                            <button class="filtrar" type="button"></button>
                            <button class="agregar" onclick="ventanaSeccion('.conteiner-asignacion', '.BRS-asignacion', 'subir')" type="button">AGREGAR</button>
                        </div>
                    </form>
                    <table>
                        <thead>
                            <tr class="indicadores">
                                <th>CEDULA</th>
                                <th>CHOFER</th>
                                <th>COCHE</th>
                            </tr>
                        </thead>
                        <tbody class="registro-asignacion"></tbody>
                    </table>
                </div>
                <div class="block_relative_section BRS-asignacion">
                    <form class="alert_section">
                        <label for="ci-asignacion">Cedula</label>
                        <input 
                            name="ci-asignacion"
                            list="ci-asignacion"
                            type="text"
                            placeholder="00000000"
                            maxlength="8">
                        <datalist id="ci-asignacion"></datalist> 
                        <label for="matricula-asignacion">Matrícula</label>
                        <input 
                            name="matricula-asignacion"
                            list="matricula-asignacion"
                            type="text"
                            placeholder="SRE0000"
                            maxlength="7">
                        <datalist id="matricula-asignacion"></datalist>
                        <div class="buttons">
                            <button class="cancel_button" type="button">Atras</button>   
                            <button class="subir_datos" type="button" onclick="btn_switch('chofer')">Agregar</button> 
                            <button class="modificar_datos" type="button">Modificar</button>
                        </div>                   
                    </form>
                </div>
            </section>
        <!-- Fin ASIGNACIONES -->
        <!-- Inicio PARTICULARES -->
            <section class="bloque" id="particular">
                <div class="conteiner-section conteiner-cliente">
                    <div class="titulo-section">
                        <i class="fa-solid fa-bars navbar_block" onclick="nav_block()"></i>
                        <i class="fa-solid fa-person navbar_icon"></i>
                        <h2>PARTICULARES</h2>
                    </div>
                    <div class="alert-filtrar">
                        <div class="filter-block">
                            <div>
                                <label>Nro_cliente</label>
                                <input class="ex-filt" type="number">
                            </div>
                            <div>
                                <label>Teléfono</label>
                                <input class="ex-filt" type="number">
                            </div>
                            <div>
                                <label>Nombre</label>
                                <input class="ex-filt" type="text">
                            </div>
                            <div>
                                <label>Apellido</label>
                                <input class="ex-filt" type="text">
                            </div>
                            <div>
                                <label>Dirección</label>
                                <input class="ex-filt" type="text">
                            </div>
                            <div>
                                <label>Lista negra</label>
                                <select class="ex-filt">
                                    <option value="2" selected>Mostrar Todos</option>
                                    <option value="1">SI</option>
                                    <option value="0">NO</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <form>
                        <div class="inputs-busqueda">
                            <button class="filtrar" type="button"></button>
                            <button class="agregar" onclick="ventanaSeccion('.conteiner-cliente', '.BRS-cliente', 'subir')" type="button">AÑADIR</button>
                        </div>
                    </form>
                    <table>
                        <thead>
                            <tr class="indicadores">
                                <th>NRO_CLIENTE</th>
                                <th>TELEFONO</th>
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
                        <label for="tel-particular">Teléfono</label>
                        <input 
                            name="tel-particular" 
                            type="text"
                            maxlength="12"
                            placeholder="012345678 | +59812345678 | 012 345 678">
                        <label for="nombre-particular">Nombre</label>
                        <input 
                            name="nombre-particular" 
                            type="text" 
                            maxlength="70"
                            placeholder="White">
                        <label for="apellido-particular">Apellido</label>
                        <input 
                            name="apellido-particular" 
                            type="text" 
                            placeholder="White"
                            maxlength="70">
                        <label for="direccion-particular">Dirección</label>
                        <input 
                            name="direccion-particular" 
                            type="text"
                            maxlength="50"
                            placeholder="Carlos de la Vega Yugoeslavia 0000">
                        <label for="ln-particular">Lista negra</label>
                        <select name="ln-particular" >
                            <option value="">-- Seleccione opción</option>
                            <option value="1">SI</option>
                            <option value="0" selected>NO</option>
                        </select>
                        <div class="buttons">
                            <button class="cancel_button" type="button">Cancelar</button>
                            <button class="subir_datos" type="button">Agregar</button>
                            <button class="modificar_datos" type="button">Modificar</button>
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
                    <div class="alert-filtrar">
                        <div class="filter-block">
                            <div>
                                <label>Nro_cliente</label>
                                <input class="ex-filt" type="number">
                            </div>
                            <div>
                                <label>RUT</label>
                                <input class="ex-filt" type="number">
                            </div>
                            <div>
                                <label>Nombre</label>
                                <input class="ex-filt" type="text">
                            </div>
                            <div>
                                <label>Correo</label>
                                <input class="ex-filt" type="text">
                            </div>
                            <div>
                                <label>Direccion</label>
                                <input class="ex-filt" type="text">
                            </div>
                            <div>
                                <label>Razón social</label>
                                <input class="ex-filt" type="text">
                            </div>
                            <div>
                                <label>Encargado de pagos</label>
                                <input class="ex-filt" type="text">
                            </div>
                            <div>
                                <label>Autorizado</label>
                                <input class="ex-filt" type="text">
                            </div>
                            <div>
                                <label>Teléfono</label>
                                <input class="ex-filt" type="number">
                            </div>
                            <div>
                                <label>Lista negra</label>
                                <select class="ex-filt">
                                    <option value="2" selected>Mostrar Todos</option>
                                    <option value="1">SI</option>
                                    <option value="0">NO</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <form>
                        <div class="inputs-busqueda">
                            <button class="filtrar" type="button"></button>
                            <button class="agregar" onclick="ventanaSeccion('.conteiner-empresa', '.BRS-empresa', 'subir')" type="button">AÑADIR</button>
                        </div>
                    </form>
                    <table>
                        <thead>
                            <tr class="indicadores">
                                <th>NRO_CLIENTE</th>
                                <th>RUT</th>
                                <th>NOMBRE</th>
                                <th>CORREO</th>
                                <th>DIRECCIÓN</th>
                            </tr>
                        </thead>
                        <tbody class="registro-empresa"></tbody>
                    </table>
                </div>
                <div class="block_relative_section BRS-empresa">
                    <form class="alert_section">
                        <label for="rut-empresa">RUT</label>
                        <input 
                            name="rut-empresa" 
                            type="text"  
                            placeholder="210000000000"
                            maxlength="12">
                        <div class="conteiner_form">
                            <div>
                                <label for="direccion-empresa">Dirección</label>
                                <input 
                                    name="direccion-empresa"
                                    type="text"
                                    maxlength="100"
                                    placeholder="Carlos de la Vega 0000">

                                <label for="tel-empresa">Teléfono</label>
                                <input 
                                    name="tel-empresa" 
                                    type="text" 
                                    placeholder="12345678 | +59812345678 | 012 345 678"
                                    maxlength="12">
                                <label for="correo-empresa">Correo</label>
                                <input 
                                    name="correo-empresa" 
                                    type="email"
                                    maxlength="125"
                                    placeholder="correo@correo.com">
                                <label for="listanegra-empresa">Lista negra</label>
                                <select name="listanegra-empresa">
                                    <option value="" selected>--Seleccione opción</option>
                                    <option value="1">SI</option>
                                    <option value="0">NO</option>
                                </select>
                            </div>
                            <div>
                                <label for="fantasia-empresa">Nombre fantasía</label>
                                <input 
                                    name="fantasia-empresa" 
                                    type="text"
                                    maxlength="70"
                                    placeholder="McDonald's">
                                <label for="razonsocial-empresa">Razón social</label>
                                <input 
                                    name="razonsocial-empresa" 
                                    type="text"
                                    maxlength="70"
                                    placeholder="Restaurantes McDonald's S.A.">
                                <label for="encargado-empresa">Encargado de pagos</label>
                                <input 
                                    name="encargado-empresa" 
                                    type="text"
                                    maxlength="70"
                                    placeholder=""> 
                                <label for="autorizado-empresa">Autorizado</label>
                                <input 
                                    name="autorizado-empresa" 
                                    type="text"
                                    maxlength="70"
                                    placeholder="">
                            </div>
                        </div>
                        <div class="buttons">
                            <button class="cancel_button" type="button">Cancelar</button>   
                            <button class="subir_datos" type="button">Agregar</button>   
                            <button class="modificar_datos" type="button">Modificar</button>
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
                    <div class="alert-filtrar">
                        <div class="filter-block">
                            <div>
                                <label>Cliente</label>
                                <input class="ex-filt" type="number">
                            </div>
                            <div>
                                <label>Nombre pasajero</label>
                                <input class="ex-filt" type="text">
                            </div>
                            <div>
                                <label>Origen</label>
                                <input class="ex-filt" type="text">
                            </div>
                            <div>
                                <label>Destino</label>
                                <input class="ex-filt" type="text">
                            </div>
                            <div>
                                <label>Chofer</label>
                                <input class="ex-filt" type="text">
                            </div>
                            <div>
                                <label>Cedula Chofer</label>
                                <input class="ex-filt" type="number">
                            </div>
                            <div>
                                <label>Apellido pasajero</label>
                                <input class="ex-filt" type="text">
                            </div>
                            <div>
                                <label>Fecha de reserva</label>
                                <input class="ex-filt" type="text">
                            </div>
                            <div>
                                <label>Hora de reserva</label>
                                <input class="ex-filt" type="number">
                            </div>
                            <div>
                                <label>Fecha de servicio</label>
                                <input class="ex-filt" type="text">
                            </div>
                            <div>
                                <label>Hora de servicio</label>
                                <input class="ex-filt" type="number">
                            </div>
                            <div>
                                <label>Comentario</label>
                                <input class="ex-filt" type="text">
                            </div>
                            <div>
                                <label>Forma_de_pago</label>
                                <select class="ex-filt">
                                    <option value="">Mostrar Todos</option>
                                    <option value="contado">Contado</option>
                                    <option value="tarjeta">Debito</option>
                                    <option value="credito">Crédito</option>
                                </select>
                            </div>
                            <div>
                                <label>Monto</label>
                                <input class="ex-filt" type="number">
                            </div>
                            <div>
                                <label>Cod Servicio</label>
                                <input class="ex-filt" type="number">
                            </div>
                        </div>
                    </div>
                    <form>
                        <div class="inputs-busqueda">
                            <button class="filtrar" type="button"></button>
                            <button class="agregar" onclick="ventanaSeccion('.conteiner-reserva', '.BRS-reserva', 'subir')" type="button">AÑADIR</button>
                        </div>
                    </form>
                    <table>
                        <thead>
                            <tr class="indicadores">
                                <th>CLIENTE</th>
                                <th>NOMBRE</th>
                                <th>ORIGEN</th>
                                <th>DESTINO</th>
                                <th>CHOFER</th>
                            </tr>
                        </thead>
                        <tbody class="registro-reserva"></tbody>
                    </table>
                </div>
                <div class="block_relative_section BRS-reserva">
                    <form class="alert_section">
                        <div class="conteiner_form">
                            <div>
                                <label for="nombre-servicio">Nombre del pasajero</label>
                                <input 
                                    name="nombre-servicio"
                                    type="text"
                                    placeholder="John"
                                    maxlength="70">
                                <label for="forma-de-pago">Forma de pago</label>
                                <select name="forma-de-pago">
                                    <option>--Seleccione Forma de Pago</option>
                                    <option value="contado">Contado</option>
                                    <option value="tarjeta">Debito</option>
                                    <option value="credito">Crédito</option>
                                </select>
                            </div>
                            <div>
                                <label for="apellido-servicio">Apellido del pasajero</label>
                                <input 
                                    name="apellido-servicio" 
                                    type="text"
                                    placeholder="White"
                                    maxlength="70">
                                <label for="monto-servicio">Monto</label>
                                <input 
                                    name="monto-servicio" 
                                    type="number">
                            </div>
                        </div>
                        <div class="conteiner_form">
                            <div>
                                <label for="cliente-reserva">Cliente</label>
                                <input 
                                    list="cliente-reserva"
                                    name="cliente-reserva"
                                    type="text"
                                    placeholder="Ingrese o Seleccione Cliente">
                                <datalist id="cliente-reserva"></datalist>
                                <label for="origen-servicio">Origen</label>
                                <input 
                                    name="origen-servicio" 
                                    type="text"
                                    placeholder="Carlos de la Vega 5348"
                                    maxlength="70">
                            </div>
                            <div>              
                                <label for="fecha-servicio">Fecha del viaje</label>
                                <input 
                                    name="fecha-servicio" 
                                    type="text"
                                    placeholder="YY-MM-DD | <?php echo date("Y-m-d")?>"
                                    value="<?php echo date("Y-m-d")?>">

                                <label for="hora-servicio">Hora del viaje</label>
                                <input 
                                    name="hora-servicio"
                                    type="text"
                                    placeholder="HH:MM | <?php echo date("H:i")?> "
                                    value="<?php echo date("H:i")?>">
                            </div>
                        </div>
                        <div class="conteiner_form">
                            <div>
                                <label for="destino-servicio">Destino</label>
                                <input 
                                    name="destino-servicio" 
                                    type="text"
                                    placeholder="18 de Julio"
                                    maxlength="70">
                            </div>
                            <div>
                                <label for="chofer-realizan">Chofer</label>
                                <input
                                    list="chofer-realizan"
                                    name="chofer-realizan" 
                                    type="text"
                                    placeholder="Ingrese o Seleccione Chofer">
                                <datalist id="chofer-realizan"></datalist>
                            </div>
                        </div>
                        <label for="comentario-servicio">Comentario</label>
                        <textarea name="comentario-servicio" maxlength="100"></textarea>
                        <div class="buttons">
                            <button class="cancel_button" type="button">Cancelar</button>   
                            <button class="subir_datos" type="button">Agregar</button>
                            <button class="modificar_datos" type="button">Modificar</button>
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
                    <div class="alert-filtrar">
                        <div class="filter-block">
                            <div>
                                <label>Cod-factura</label>
                                <input class="ex-filt" type="number">
                            </div>
                            <div>
                                <label>Matrícula</label>
                                <input class="ex-filt" type="text">
                            </div>
                            <div>
                                <label>Concepto</label>
                                <select class="ex-filt">
                                    <option value="">--Por favor elija una opción</option>
                                    <option value="Gasoil">Gasoil</option>
                                    <option value="Cambio de aceite">Cambio de aceite</option>
                                    <option value="Electricista">Electricista</option>
                                    <option value="Alineacion balanceo">Alineación y balanceo</option>
                                    <option value="Gomeria">Gomería</option>
                                    <option value="Cambio correa">Cambio de correa</option>
                                    <option value="Frenos">Frenos</option>
                                    <option value="Embrague">Embrague</option>
                                    <option value="Chapista">Chapista</option>
                                    <option value="Otros">Otros</option>
                                </select>
                            </div>
                            <div>
                                <label>Comentario</label>
                                <input class="ex-filt" type="text">
                            </div>
                            <div>
                                <label>Importe total</label>
                                <input class="ex-filt" type="number">
                            </div>
                            <div>
                                <label>Taller</label>
                                <input class="ex-filt" type="text">
                            </div>
                            <div>
                                <label>Fecha</label>
                                <input class="ex-filt" type="text">
                            </div>
                        </div>
                    </div>
                    <form>
                        <div class="inputs-busqueda">
                            <button class="filtrar" type="button">FILTRAR</button>
                            <button class="agregar" onclick="ventanaSeccion('.conteiner-GDM', '.BRS-GDM', 'subir')" type="button">AÑADIR</button>
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
                                <label for="codigo-gdm">Cod-factura</label>
                                <input 
                                    name="codigo-gdm" 
                                    type="number"
                                    placeholder="0000">
                            </div>
                            <div>
                                <label for="matricula-gdm">Coche</label>
                                <input 
                                    list="matricula-gdm"
                                    name="matricula-gdm"
                                    type="text"
                                    placeholder="Ingrese o Seleccione Coche">
                                <datalist id="matricula-gdm"></datalist>
                            </div>
                        </div>
                        <div class="conteiner_form">
                            <div> 
                                <label for="importe-gdm">Importe</label>
                                <input 
                                    name="importe-gdm"
                                    type="number"
                                    placeholder="Ingrese Importe">
                            </div>     
                            <div>
                                <label for="taller-gdm">Taller</label>
                                <input 
                                    name="taller-gdm" 
                                    type="text"
                                    placeholder="Taller"
                                    maxlength="70">
                            </div>
                        </div>
                        <label for="concepto-gdm">Concepto</label>
                        <select name="concepto-gdm">
                            <option value="">--Por favor elija una opción</option>
                            <option value="Gasoil">Gasoil</option>
                            <option value="Cambio de aceite">Cambio de aceite</option>
                            <option value="Electricista">Electricista</option>
                            <option value="Alineacion balanceo">Alineación y balanceo</option>
                            <option value="Gomeria">Gomería</option>
                            <option value="Cambio correa">Cambio de correa</option>
                            <option value="Frenos">Frenos</option>
                            <option value="Embrague">Embrague</option>
                            <option value="Chapista">Chapista</option>
                            <option value="Otros">Otros</option>
                        </select>  
                        <label for="comentario-gdm">Comentario</label>
                        <textarea 
                            name="comentario-gdm"
                            type="text"
                            placeholder="Comentario"
                            maxlength="100">
                        </textarea>
                        <div class="buttons">
                            <button class="cancel_button" type="button">Cancelar</button>   
                            <button class="subir_datos" type="button">Agregar</button>
                            <button class="modificar_datos" type="button">Modificar</button>
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
    <script src="../../view/js/uniAlerts.js"></script>
    <script src="../../view/js/tableData.js"></script>
    <script src="../../view/js/consultar.js"></script>
    <script type="module" src="../../view/js/add_all.js"></script>
    <script type="module" src="../../view/js/filter_all.js"></script>
</body>
</html>