<?php
    session_start();
    $usuario = $_POST['user'];
    $contraseña = $_POST['pass'];
    $_SESSION = $usuario;

    if (isset($usuario) && isset($contraseña)) {
        if ($usuario !== 'Bruno' && $contraseña !== '1234') {
            echo 'Usuario y/o contraseña incorrectos';   
        }
    }
?>