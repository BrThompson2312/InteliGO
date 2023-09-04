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
            echo '<link rel="stylesheet" href="view/css/administrador.css">';
        } else {
            echo '<link rel="stylesheet" href="view/css/operativo.css">';
        }
    ?>
    <link rel="shortcut icon" href="view/img/logofinal/logoIco3.ico">
    <script src="https://kit.fontawesome.com/58fb14bc94.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-solid-straight/css/uicons-solid-straight.css'>
    <script src="view/js/jquery.min.js"></script>
</head>
<body>
    <section id="alert-salir">
        <div>
            <i id="xmark-salir" class="fa-solid fa-xmark"></i>
            <!-- <i id="xmark-salir "class="fi fi-sr-circle-xmark"></i> -->
            <p>¿Desea cerrar sesión?</p>
                <a href="controller/salir.php">CERRAR SESIÓN</a>
        </div>
    </section>
    <nav>
        <section id="user">
            <div class="info-user">
                <i class="fa-solid fa-user"></i>
                <div>
                    <?php
                        if ($tipoUsuario == 'administrador') {
                            ?>
                                <h3><?php echo $_SESSION['nombreUsuario'];?></h3>
                                <span>administrador</span>
                            <?php
                        } else {
                            ?>
                                <h3><?php echo $_SESSION['nombreUsuario'];?></h3>
                                <span>operador</span>
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
            <button class="opciones-hilera" rel="#coches" onclick=opcion_menu(this)> 
                <i class="fa-solid fa-car"></i>
                <span>Coches</span> 
            </button>
            <button class="opciones-hilera" rel="#chofer" onclick="opcion_menu(this)"> 
                <i class="fi fi-ss-steering-wheel"></i>
                <span>Choferes</span> 
            </button>
            <!-- <button class="opciones-hilera" rel="#lista-negra" onclick="opcion_menu(this)"> 
                <i class="fi fi-bs-trash-list"></i>
                <span>Lista negra</span>
            </button> -->
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
                    <div class="inicio-logoProducto">
                        <img src="view/img/logofinal/blackLogo.png" alt="">         
                    </div>
                    <div class="inicio-usuario">
                        <h1 style="margin: 0"> BIENVENIDO DE NUEVO </h1>
                        <?php
                            if ($tipoUsuario == 'administrador') {
                                ?>
                                    <span> 
                                        <?php echo $_SESSION['nombreUsuario'];?> <span> | </span> <?php echo $_SESSION['tipoUsuario']?>
                                    </span>
                                <?php
                            } else {
                                ?>
                                    <span> 
                                        <?php echo $_SESSION['nombreUsuario'];?> <span> | </span> <?php echo $_SESSION['tipoUsuario']?>
                                    </span>
                                <?php
                            }
                        ?>
                    </div>
                    <div class="inicio-logoEmpresa">          
                        <table>
                            <tbody>
                                <tr>
                                    <td> 
                                        <ul>
                                            <li><i class="fa-solid fa-copyright"></i> Copyright</li>
                                            <!-- &nbsp;
                                            <li>Factibilidad legal</li> -->
                                        </ul>
                                    </td>
                                    <td></td>
                                    <td>
                                        <div>
                                            <h3>HECHO POR</h3>
                                            <img src="view/img/logo.png" style="width: 150px;">
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td></td>
                                    <td>
                                        <ul>
                                            <li>Términos y condiciones</li>
                                            &nbsp;
                                            &nbsp;
                                            &nbsp;
                                            <li>Política de privacidad</li>
                                            &nbsp;
                                            &nbsp;
                                            &nbsp;
                                            <li>Política de cookies</li>
                                        </ul>
                                    </td>
                                    <td></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </section>
        <!-- Fin HOME -->

        <?php
                if ($tipoUsuario == 'administrador') {
                ?>
        <!-- Inicio OPERADORES -->
                <section class="bloque" id="operador">
                    <div class="conteiner-section conteiner-administradores">
                        <h2 class="titulo-section">OPERADORES</h2>
                        <form action="GET">
                            <div class="inputs-busqueda">
                                <button class="filtrar"> FILTRAR </button>
                                <button class="agregar" onclick="ventanaSeccion('.conteiner-administradores', '.BRS-administradores', '#xmark-administrador')" type="button">AGREGAR</button>
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
                                <tbody class="registro-administradores">
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <i id="xmark-administrador" class="fa-solid fa-xmark"></i>
                    <div class="block-relative-section BRS-administradores">
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
                    <h2 class="titulo-section"> ELIMINADOS </h2>
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

        <!-- Inicio COCHES -->
            <section class="bloque" id="coches">
                <div class="conteiner-section conteiner-coches">
                    <h2 class="titulo-section"> COCHES </h2>
                    <form action="GET">
                        <div class="inputs-busqueda">
                            <button class="filtrar"> FILTRAR </button>
                            <button class="agregar" onclick="ventanaSeccion('.conteiner-coches', '.BRS-coches', '#xmark-coches')" type="button">AGREGAR</button>
                        </div>
                    </form>
                    <div>
                        <table>
                            <thead>
                                <tr class="indicadores">
                                    <th> MATRÍCULA </th>
                                    <th> MARCA </th>
                                    <th> MODELO </th>
                                    <th> AÑO </th>
                                </tr>
                            </thead>
                            <tbody class="registro-coches"></tbody>
                        </table>
                    </div>
                </div>

                <i id="xmark-coches" class="fa-solid fa-xmark"></i>
                <div class="block-relative-section BRS-coches">
                    <div class="alert-section">
                        <form method="POST" action="controller/agregar/coches.php">
                            <div>
                                <label for="marca-coches">Marca</label>
                                <input name="marca-coches" type="text" placeholder="Marca">
                                <label for="modelo-coches">Modelo</label>
                                <input name="modelo-coches" type="text" placeholder="Modelo">
                                <label for="matricula-coches">Matricula</label>
                                <input name="matricula-coches" type="number" placeholder="Matrícula">
                                <label for="año-coches">Año</label>
                                <input name="año-coches" type="date">
                            </div>    
                            <button type="submit"> AGREGAR </button>    
                        </form>
                    </div>
                </div>
            </section>            
        <!-- Fin COCHES -->

        <!-- Inicio CHOFERES -->
            <section class="bloque" id="chofer">
                <div class="conteiner-section conteiner-chofer">
                    <h2 class="titulo-section"> CHOFERES </h2>
                    <form action="GET">
                        <div class="inputs-busqueda">
                            <button class="filtrar"> FILTRAR </button>
                            <button class="agregar" onclick="ventanaSeccion('.conteiner-chofer', '.BRS-choferes', '#xmark-chofer')" type="button">AGREGAR</button>
                        </div>
                    </form>
                    <div>
                        <table>
                            <thead>
                                <tr class="indicadores">
                                    <th> CEDULA </th>
                                    <th> NOMBRE DEL CHOFER </th>
                                    <th> TELÉFONO </th>
                                </tr>
                            </thead>
                            <tbody class="registro-chofer"></tbody>
                        </table>
                    </div>
                </div>

                <!-- Bloque Agregar -->
                <i id="xmark-chofer" class="fa-solid fa-xmark"></i>
                <div class="block-relative-section BRS-choferes">
                    <div class="alert-section">
                        <form action="">
                            <div>
                                <label for="nombre-chofer">Nombre completo</label>
                                <input name="nombre-chofer" type="text" placeholder="Nombre completo">
                                <label for="cedula-chofer">Cedula</label>
                                <input name="cedula-chofer" type="number" placeholder="Cédula">
                                <label for="libreta-chofer">Tipo de libreta de conducir</label>
                                <input name="libreta-chofer" type="text" value="Categoria F" readonly>
                            </div>    
                            <button type="submit"> AGREGAR </button>                                  
                        </form>
                    </div>
                </div>

            </section>
        <!-- Fin CHOFERES -->

        <!-- Inicio LISTA NEGRA -->
            <!-- <section class="bloque" id="lista-negra">
                <div class="conteiner-section conteiner-LN">
                    <h2 class="titulo-section"> LISTA NEGRA </h2>
                    <form action="GET">
                        <label for="search"> Buscar clientes </label>
                        <div class="inputs-busqueda">
                            <button class="filtrar"> FILTRAR </button>
                            <button class="agregar" onclick="ventanaSeccion('.conteiner-LN', '.BRS-LN', '#xmark-administrador')" type="button">AGREGAR</button>
                        </div>
                    </form>
                    <div>
                        <table>
                            <thead>
                                <tr class="indicadores">
                                    <th> ID </th>
                                    <th> NOMBRE </th>
                                </tr>
                            </thead>
                            <tbody class="registro-LN"></tbody>
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

            </section> -->
        <!-- Fin LISTA NEGRA -->

        <!-- Inicio PARTICULARES -->
            <section class="bloque" id="particular">
                <div class="conteiner-section conteiner-cliente">
                    <h2 class="titulo-section"> CLIENTES FRECUENTES </h2>
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
                                    <th> TELÉFONO </th>
                                </tr>
                            </thead>
                            <tbody class="registro-cliente"></tbody>
                        </table>
                    </div>
                </div>
                <i id="xmark-cliente" class="fa-solid fa-xmark"></i>
                <div class="block-relative-section BRS-cliente">
                    <div class="alert-section">
                        <form action="">
                            <div>
                                <label for="nombre-cliente">Nombre completo</label>
                                <input name="nombre-cliente" type="text" placeholder="Nombre completo">
                                <label for="edad-cliente">Edad</label>
                                <input name="edad-cliente" type="number" placeholder="Edad">
                                <label for="cedula-cliente">Cedula</label>
                                <input name="cedula-cliente" type="number" placeholder="Cédula">
                                <label for="fechaing-cliente">Fecha de ingreso</label>
                                <input name="fechaing-cliente" type="date" value="<?php echo date("Y-m-d");?>" required readonly>
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
                    <h2 class="titulo-section"> EMPRESAS </h2>
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
                                    <th> RUT </th>
                                    <th> LISTA NEGRA </th>
                                    <th> NOMBRE FANTASÍA </th>
                                    <th> RAZÓN SOCIAL </th>
                                    <th> DIRECCIÓN </th>
                                    <th> TELÉFONO </th>
                                </tr>
                            </thead>
                            <tbody class="registro-empresa"></tbody>
                        </table>
                    </div>
                </div>

                <i id="xmark-empresa" class="fa-solid fa-xmark"></i>
                <div class="block-relative-section BRS-empresa">
                    <div class="alert-section">
                        <form action="">
                            <div>
                                <label for="nombre-empresa">Nombre de la empresa</label>
                                <input name="nombre-empresa" type="text" placeholder="Nombre" required>
                                <label for="RUT-empresa">RUT</label>
                                <input name="RUT-empresa" type="number" placeholder="RUT" required>
                                <label for="direccion-empresa">Dirección</label>
                                <input name="direccion-empresa" type="number" placeholder="Dirección" required>
                                <label for="telefono-empresa">Teléfono</label>
                                <input name="telefono-empresa" type="number" placeholder="Teléfono" required>
                                <label for="contacto-empresa">Persona de contacto</label>
                                <input name="contacto-empresa" type="number" placeholder="Persona de contacto" required>
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
                        <div class="inputs-busqueda">
                            <button class="filtrar"> FILTRAR </button>
                            <button class="agregar" onclick="ventanaSeccion('.conteiner-reserva', '.BRS-reserva', '#xmark-reserva')" type="button">AGREGAR</button>
                        </div>
                    </form>
                    <div>
                        <table>
                            <thead>
                                <tr class="indicadores">
                                    <th> COD </th>
                                    <th> TIPO </th>
                                    <th> PASAJERO </th>
                                    <th> CHOFER </th>
                                    <th> TELÉFONO DEL PASAJERO </th>
                                    <th> ORIGEN </th>
                                    <th> DESTINO </th>
                                </tr>
                            </thead>
                            <tbody class="registro-reserva"></tbody>
                        </table>
                    </div>
                </div>
                <i id="xmark-reserva" class="fa-solid fa-xmark"></i>
                <div class="block-relative-section BRS-reserva">
                    <div class="alert-section-reserva">
                        <form action="">
                            <table>
                                <tr>
                                    <td>
                                        <div>
                                            <label for="fecha-reserva">Fecha</label>
                                            <input name="fecha-reserva" type="date">
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <label for="hora-reserva">Hora de inicio</label>
                                            <input name="hora-reserva" type="time">
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <label for="empresa-reserva">Empresa</label>
                                            <input name="empresa-reserva" type="text">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div>
                                            <label for="pasajero-reserva">Pasajero</label>
                                            <input name="pasajero-reserva" type="text">
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <label for="origen-reserva">Origen</label>
                                            <input name="origen-reserva" type="text">
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <label for="destino-reserva">Destino</label>
                                            <input name="destino-reserva" type="text">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div>
                                            <label for="importe-reserva">Importe</label>
                                            <input name="importe-reserva" type="number">
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <label for="formaPago-reserva">Forma de pago</label>
                                            <select name="formaPago-reserva">
                                                <option value="">--Seleccione forma de pago</option>
                                                <option value="formaPago_contado-reserva">Contado</option>
                                                <option value="formaPago_tarjeta-reserva">Tarjeta</option>
                                                <option value="formaPago_transferencia-reserva">Transferencia</option>
                                                <option value="formaPago_cuentacorriente-reserva">Cuenta corriente</option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <div>
                                            <label for="comentario-reserva">Comentario</label>
                                            <textarea name="comentario-reserva" id="comentario" cols="30" rows="10"></textarea>
                                        </div>
                                    </td>
                                    <td></td>
                                </tr>
                            </table>
                            <button type="submit"> AGREGAR </button>                              
                        </form>
                    </div>
                </div>
            </section>
        <!-- Fin RESERVA -->

        <!-- Inicio HISTORIAL DE MOVIMIENTO -->
            <!-- <section class="bloque" id="historial-de-movimiento">
                <div class="conteiner-section conteiner-HDM">
                    <h2 class="titulo-section"> HISTORIAL DE MOVIMIENTO </h2>
                    <form action="GET">
                        <label for="search"> Buscar movimientos </label>
                        <div class="inputs-busqueda">
                            <input type="number" placeholder="ID" min="4 "max="4">
                            <input type="text">
                            <button type="submit"> Buscar </button>
                            <input class="agregar agregar-HDM" onclick="ventanaSeccion('.conteiner-HDM', '.BRS-HDM','#xmark-HDM')" type="button" value=" + AGREGAR ">
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
                    <div class="alert-section-reserva">
                        <form action="">
                            <table>
                                <tr>
                                    <td>
                                        <div>
                                            <label for="">Fecha</label>
                                            <input type="date">
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <label for="">Hora Inicio</label>
                                            <input type="time">
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <label for="">Origen</label>
                                            <input type="text">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div>
                                            <label for="">Destino</label>
                                            <input type="text">
                                        </div>
                                        </td>
                                    <td>
                                        <div>
                                            <label for="">Forma de pago</label>
                                            <select name="forma-pago" id="forma-pago">
                                                <option value="">--Escoja el método de pago</option>
                                                <option value="Efectivo">Efectivo</option>
                                                <option value="Debito">Tarjeta débito</option>
                                                <option value="Credito">Tarjeta crédito</option>
                                                <option value="Corriente">Cuenta corriente</option>
                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <label for="">Empresa</label>
                                            <input type="text">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div>
                                            <label for="">Pasajero</label>
                                            <input type="text">
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <label for="">Chofer</label>
                                            <input type="text">
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <label for="">Importe</label>
                                            <input type="text">
                                        </div>
                                    </td>
                                </tr>
                            </table>
                           
                            <button type="submit"> AGREGAR </button>                                  
                        </form>
                    </div>
                </div>
            </section> -->
        <!-- Fin HISTORIAL DE MOVIMIENTO -->

        <!-- Inicio GASTOS DE MANTENIMIENTO -->
            <section class="bloque" id="gastos-de-mantenimiento">
                <div class="conteiner-section conteiner-GDM">
                    <h2 class="titulo-section"> GASTOS DE MANTENIMIENTO </h2>
                    <form action="GET">
                        <div class="inputs-busqueda">
                            <button class="filtrar"> FILTRAR </button>
                            <button class="agregar" onclick="ventanaSeccion('.conteiner-GDM', '.BRS-GDM', '#xmark-GDM')" type="button">AGREGAR</button>
                        </div>
                    </form>
                    <div>
                        <table >
                            <thead>
                                <tr class="indicadores">
                                    <th> COD </th>
                                    <th> TIPO DE MANTENIMIENTO </th>
                                    <th> GASTOS DE MANTENIMIENTO </th>
                                    <th> COMENTARIOS </th>
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
                        <form action="">
                            <div>
                                <label for="Concepto">Concepto</label>
                                <select name="Concepto" id="Concepto">
                                    <option value="">--Por favor eliga una opción</option>
                                    <option value="con1">GASOIL</option>
                                    <option value="con2">CAMBIO ACEITE</option>
                                    <option value="con3">ELECTRICISTA</option>
                                    <option value="con4">ALINEACIÓN Y BALANCEO</option>
                                    <option value="con1">GOMERÍA</option>
                                    <option value="con2">CAMBIO DE CORREA</option>
                                    <option value="con3">FRENOS</option>
                                    <option value="con4">EMBRAGUE</option>
                                    <option value="con1">CHAPISTA</option>
                                    <option value="con2">OTROS</option>
                                </select>
                                <label for="fecha-GDM">Fecha</label>
                                <input name="fecha-GDM"type="date">
                                <label for="importe-GDM">Importe</label>
                                <input name="importe-GDM"type="text" placeholder="Importe">
                                <label for="descripcion-GDM">Comentario</label>
                                <textarea name="descripcion-GDM" cols="30" rows="10" placeholder="Comentario"></textarea>
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