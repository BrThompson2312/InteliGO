<?php

ini_set('display_errors', 'on');
require_once '../conexion.php';

$nombre_chofer = $_POST['nombre-chofer'];
$cedula_chofer = $_POST['cedula-chofer'];
$tel = $_POST['tel-chofer'];

if ($nombre_chofer == NULL || $cedula_chofer == NULL || $tel == NULL) {
    echo 'Debe rellenar todo el formulario';
} else if (strlen($cedula_chofer) == 8 && strlen($tel) == 9) {
    $query_chofer = "INSERT INTO chofer VALUES ('$cedula_chofer', '$nombre_chofer')";
    $query_tel = "INSERT INTO tel_chofer VALUES ('$cedula_chofer', '$tel')";

    $result_chofer = mysqli_query($conn, $query_chofer);
    $result_tel = mysqli_query($conn, $query_tel);
    if ($result_chofer) {
        if ($result_tel){
            echo 'Formulario rellenado con éxito';
        }
    } else {
        echo 'Error';
    }
} else {
    echo 'Error en los campos ingresados';
}

?>