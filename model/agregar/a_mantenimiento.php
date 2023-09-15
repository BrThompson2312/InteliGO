<?php

ini_set('display_errors','on');
require_once '../conexion.php';

$cod = $_POST['cod_gdm'];
$fecha = $_POST['fecha_gdm'];
$concepto = $_POST['concepto_gdm'];
$importe = $_POST['importe_gdm'];
$comentario = $_POST['comentario_gdm'];

if ($cod == NULL || $fecha == NULL || $concepto == NULL || $importe == NULL || $comentario == NULL){
    echo 'Fallo. Por favor, rellene los campos';
} else {
    $query = "INSERT INTO mantenimiento VALUES ('$cod', '$concepto','$importe','$comentario')";
    $result = mysqli_query($conn, $query);
    if ($result){
        echo 'Formulario rellenado con éxito';
    } else {
        echo 'Fallo';
    }
}

?>