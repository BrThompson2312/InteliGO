<?php require_once '../conf_page/conexion.php'; ini_set('display_errors', 'on');

$cod            = $_POST['cod'];
$listanegra     = $_POST['listanegra'];
$fantasia       = $_POST['fantasia'];
$razonsocial    = $_POST['razonsocial'];
$direccion      = $_POST['direccion'];
$correo         = $_POST['correo'];
$encargado      = $_POST['encargado'];
$autorizado     = $_POST['autorizado'];

$query_cliente = "UPDATE cliente SET direccion = '$direccion', lista_negra = '$listanegra' WHERE cod_cliente = '$cod'";
$query_particular = "UPDATE empresa SET razon_social = '$razonsocial', nombre_fantasia = '$fantasia', correo = '$correo', encargado_de_pagos = '$encargado', autorizado = '$autorizado' WHERE cod_cliente = '$cod'";

if (mysqli_query($conn, $query_cliente)) {
    if (mysqli_query($conn, $query_particular)) {
        echo 'Modificado con éxito';
    }
} else {
    echo "Error".mysqli_error($conn);
}

?>