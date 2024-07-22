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
            echo '<link rel="stylesheet" href="./view/css/users/administrador.css">';
        } else {
            echo '<link rel="stylesheet" href="./view/css/users/operativo.css">';
        }
    ?>
    <link rel="shortcut icon" href="view/img/logofinal/logoIco3.ico">
    <script src="https://kit.fontawesome.com/4ffb78f01e.js" crossorigin="anonymous"></script>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-solid-straight/css/uicons-solid-straight.css'>
    <link rel="stylesheet" href="./view/css/optsColumna.css">
</head>
<body>
    <section id="alert-add">
        <i class="fa fa-check fa-1x"></i> 
    </section>
    <section id="alert-salir">  
        <div>
            <i id="xmark-salir" class="fa-solid fa-xmark"></i>
            <p>¿Desea cerrar sesión?</p>
            <a href="model/conf_page/salir.php">Cerrar Sesión</a>
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
        <?php
            require("includes/sec_inicio.php");
            if ($tipoUsuario == 'administrador') {
                require("includes/sec_operador.php");            
            }
            require("includes/sec_chofer.php");
            require("includes/sec_coche.php");
            require("includes/sec_asignacion.php");
            require("includes/sec_particular.php");
            require("includes/sec_empresa.php");
            require("includes/sec_reserva.php");
            require("includes/sec_gdm.php");
            require("includes/sec_promocion.php");
        ?>
    </main>
    <script src="view/js/uniAlerts.js"></script>
    <script src="view/js/tableData.js"></script>
    <script src="view/js/consultar.js"></script>
    
    <!-- Clases -->
    <script src="view/js/entidades/Asignacion.js"></script>
    <script src="view/js/entidades/Chofer.js"></script>
    <script src="view/js/entidades/Empresa.js"></script>
    <script src="view/js/entidades/Mantenimiento.js"></script>
    <script src="view/js/entidades/Operador.js"></script>
    <script src="view/js/entidades/Particular.js"></script>
    <script src="view/js/entidades/Reserva.js"></script>
    
    <script src="view/js/add_all.js"></script>

    <script type="module" src="view/js/filter_all.js"></script>
</body>
</html>