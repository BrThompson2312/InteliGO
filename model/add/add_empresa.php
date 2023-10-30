<?php require_once '../conf_page/conexion.php';

//ini_set('display_errors','on');

$rut            = $_POST['rut'];
$razonsocial    = $_POST['razonsocial'];
$fantasia       = $_POST['fantasia'];
$listanegra     = $_POST['listanegra'];
$direccion      = $_POST['direccion'];
$telefono       = $_POST['telefono'];
$correo         = $_POST['correo'];
$encargado      = $_POST['encargado'];
$autorizado     = $_POST['autorizado'];

$query_cliente = "INSERT INTO cliente VALUES (0, '$listanegra','$direccion', 1)";

if(mysqli_query($conn, $query_cliente)) {
    $query          = "SELECT max(cod_cliente) as codigo from cliente" ;
    $result_cliente = mysqli_query($conn, $query);
    $row            = mysqli_fetch_assoc($result_cliente);
    $cod_cliente    = $row['codigo'];

    $query_empresa  = "INSERT INTO empresa (cod_empresa, cod_cliente, rut, razon_social, nombre_fantasia, correo, encargado_de_pagos, autorizado) VALUES (0, $cod_cliente, '$rut', '$razonsocial', '$fantasia', '$correo', '$encargado', '$autorizado')";
    $query_telefono = "INSERT INTO telefono_cliente VALUES ($cod_cliente, '$telefono')";

    if (mysqli_query($conn, $query_empresa)) {
        if (mysqli_query($conn, $query_telefono)) {
            echo true;
        } else {
            mysqli_query($conn, "DELETE FROM cliente WHERE cod_cliente = $cod_cliente");
            mysqli_query($conn, "DELETE FROM telefono_cliente WHERE cod_cliente = $cod_cliente");
            echo "Error 2.  $query_telefono" ;
        }
    } else {
        echo 'Error 1';
    }
} else {
    echo 'Error 0';
}

?>