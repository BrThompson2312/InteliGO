<?php require_once '../conf_page/conexion.php';

ini_set('display_errors', 'on');

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$listanegra = $_POST['listanegra'];

$query_particular = "INSERT INTO cliente VALUES (0,'$listanegra','$direccion')";

if(mysqli_query($conn, $query_particular)) {
    $query          = "SELECT max(cod_cliente) as codigo from cliente" ;
    $result_cliente = mysqli_query($conn, $query);
    $row            = mysqli_fetch_assoc($result_cliente);
    $cod_cliente    = $row['codigo'];

    $query_particular = "INSERT INTO particular VALUES ($cod_cliente,'$nombre','$apellido')";
    $query_telefono = "INSERT INTO telefono_cliente VALUES ($cod_cliente,'$telefono')";

    if( mysqli_query($conn, $query_particular) ) {
        if( mysqli_query($conn, $query_telefono) ) {
            echo true;
        } else {
            echo "error 2.  $query_telefono" ;
        }
    } else {
        echo 'error 1';
    }
} else {
    echo 'error 0';
}

?>