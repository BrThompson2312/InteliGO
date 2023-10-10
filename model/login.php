<?php

ini_set('display_errors','on');
require_once 'conexion.php';
session_start();

$user = $_POST['cedula'];
$pass = $_POST['pass'];

$query = "SELECT * FROM usuario WHERE ci_usuario = '$user'";
$ejQuery = mysqli_query($conn, $query);

if($ejQuery){
    $flgEncontroUsuario=false;
    while($row = mysqli_fetch_assoc($ejQuery)) {
        $flgEncontroUsuario=true;
        if($row['contraseña'] == $pass)  {
            $_SESSION['tipoUsuario'] = $row['rol_usuario'];
            $_SESSION['nombreUsuario']  = $row['nombre_usuario'];
            header('location: menu.php');
        } else {
            header('location: ../index.php?error=1');
        }
    }
    if(!$flgEncontroUsuario) {
        header('location: ../index.php?&error=1');
    }
} else {
    echo 'Fallo en el $result';
}

?>