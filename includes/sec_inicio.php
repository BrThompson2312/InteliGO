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