<?php require_once '../conf_page/conexion.php'; ini_set('display_errors', 'on');

$telefono   = $_POST['telefono'];
$nombre     = $_POST['nombre'];
$apellido   = $_POST['apellido'];
$direccion  = $_POST['direccion'];

$query_cliente = "INSERT INTO cliente VALUES (0, 0, '$direccion', 1)";

if(mysqli_query($conn, $query_cliente)) {
    $query_max_cliente  = "SELECT max(cod_cliente) as codigo from cliente" ;
    $result_cliente     = mysqli_query($conn, $query_max_cliente);
    $row                = mysqli_fetch_assoc($result_cliente);
    $cod_cliente        = $row['codigo'];

    $query_particular   = "INSERT INTO particular VALUES (0, $cod_cliente,'$nombre','$apellido')";
    $query_telefono     = "INSERT INTO telefono_cliente VALUES ($cod_cliente,'$telefono')";

    if(mysqli_query($conn, $query_particular)) {
        if(mysqli_query($conn, $query_telefono) ) {
            echo true;
        } else {
            echo false;
        }
    } else {
        echo false;
    }
} else {
    echo false;
}

?>