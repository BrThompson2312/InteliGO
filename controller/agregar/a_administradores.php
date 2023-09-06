<?php
    ini_set('display_errors', 'on');

    require_once '../conexion.php';
  
    $ci_usuario = $_POST['ci-operador'];
    $nombre_usuario = $_POST['nombre-operador'];
    $contraseña = $_POST['contrasena-operador'];
    $rol_usuario = $_POST['rol-operador'];    
    $fecha_ingreso = $_POST['fechaing-operador'];
    
    if (strlen($ci_usuario) == 8){
        $query = "INSERT INTO usuario VALUES ('$ci_usuario', '$nombre_usuario', '$contraseña','$rol_usuario','$fecha_ingreso')";
        $result = mysqli_query($conn, $query);
        echo 'Datos guardados con éxito';
    } else {
        echo 'No cumple con los requisitos';
    }
?>