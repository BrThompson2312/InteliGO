<?php
    session_start();
    $usuario = $_POST['user'];
    $contraseña = $_POST['pass'];
    $_SESSION = $usuario;

    if (isset($usuario) && isset($contraseña)) {
        if ($usuario == 'root' && $contraseña == 'root') {
            header("location: administrador.php");
        } else if ($usuario == 'operative' && $contraseña == 'operative') {
            header("location: operador.php");  
        } else {
            echo "Usuario y/o contraseña incorrectos";
        }
    }
?>