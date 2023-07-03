<?php
    session_start();
    $usuario = $_POST['user'];
    $contraseña = $_POST['pass'];
    $_SESSION['usuario'] = $usuario;

    if (isset($usuario) && isset($contraseña)) {
        if ($usuario == 'root' && $contraseña == 'root') {
            $_SESSION['tipoUsuario'] = "admin";
            header("location: menu.php");
        } else if ($usuario == 'operativo' && $contraseña == 'operativo') {
            $_SESSION['tipoUsuario'] = "operador";
            header("location: menu.php");  
        } else {
            header('location: index.php?error=1');
        }
    }
?>