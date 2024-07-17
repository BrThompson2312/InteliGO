<?php require_once '../conf_page/conexion.php';

$cod            = $data['cod'];
$listanegra     = $data['listanegra'];
$fantasia       = $data['fantasia'];
$razonsocial    = $data['razonsocial'];
$direccion      = $data['direccion'];
$telefono       = $data['telefono'];
$correo         = $data['correo'];
$encargado      = $data['encargado'];
$autorizado     = $data['autorizado'];

$query_cliente = "UPDATE cliente SET direccion = '$direccion', lista_negra = '$listanegra' WHERE cod_cliente = '$cod'";
$query_particular = "UPDATE empresa SET razon_social = '$razonsocial', nombre_fantasia = '$fantasia', correo = '$correo', encargado_de_pagos = '$encargado', autorizado = '$autorizado' WHERE cod_cliente = '$cod'";
$query_telefono = "UPDATE telefono_cliente SET telefono = '$telefono' WHERE cod_cliente = '$cod'";

if (mysqli_query($conn, $query_cliente)) {
    if (mysqli_query($conn, $query_particular)) {
        if (mysqli_query($conn, $query_telefono)) {
            echo true;
        }
    }
} else {
    echo false.mysqli_error($conn);
}

?>