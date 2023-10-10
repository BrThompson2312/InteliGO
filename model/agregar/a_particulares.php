<?php

ini_set('display_errors', 'on');

require_once '../conexion.php';

$cod = $_POST['cod'];
$lista_negra = $_POST['ln'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$cedula = $_POST['cedula'];
$direccion = $_POST['direccion'];
$telefono = $_POST['tel'];

if ($cod == NULL || $lista_negra == NULL || $nombre == NULL || $apellido == NULL || $apellido == NULL || $cedula == NULL || $direccion == NULL || $telefono == NULL){
    echo 'Error, debe rellenar el formulario';
} else {
    $query_particular = "INSERT INTO particular VALUES ('$cod','$nombre','$apellido')";
    $query_cliente = "INSERT INTO cliente VALUES ('$cod','$lista_negra','$direccion')";
    $query_tel = "INSERT INTO telefono_cliente VALUES ('$cod','$telefono')";

    $result_particular = mysqli_query($conn, $query_particular);
    $result_cliente = mysqli_query($conn, $query_cliente);
    $result_tel = mysqli_query($conn, $query_tel);
    if($result_particular){
        if($result_cliente){
            if($result_tel){ 
                echo 'Formulario rellenado con éxito';
            } else {
                echo 'Fallo result tel';
            }
        } else {
            echo 'Fallo result cliente';
        }
    } else {
        echo 'fallo result particular';
    }
}

?>