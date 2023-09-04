<?php
    ini_set('display_errors','on');

    require_once 'conexion.php';

    session_start();

    $cedula = $_POST['cedula'];
    $contrasena = $_POST['pass'];
    
    $operator_ci = "SELECT * FROM usuario WHERE ci_usuario = '$cedula'";

    $result = mysqli_query($conn, $operator_ci);

    if($result){
        $existeUsuario = false;
        while($row = mysqli_fetch_assoc($result)) {
            $rowContra = $row['contraseña'];
            if($rowContra==$contrasena)  {
                $_SESSION['tipoUsuario'] = $row['rol_usuario'];
                $_SESSION['nombreUsuario']  = $row['nombre_usuario'];
                header('location: ../menu.php');
            } else {
                echo "Error en la contraseña";
            }   
        }
    } else {
        echo 'Fallo en el $result';
    }  
?>