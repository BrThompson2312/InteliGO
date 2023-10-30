<?php require_once '../conf_page/conexion.php'; ini_set('display_errors', 'on');

$cod            = $_POST['cod'];
$nombre         = $_POST['nombre'];
$apellido       = $_POST['apellido'];
$direccion      = $_POST['direccion'];
$listanegra     = $_POST['listanegra'];

$query_cliente      = "UPDATE cliente SET direccion = '$direccion', lista_negra = '$listanegra' WHERE cod_cliente = '$cod'";
$query_particular   = "UPDATE particular SET nombre = '$nombre', apellido = '$apellido' WHERE cod_cliente = '$cod'";

if (mysqli_query($conn, $query_cliente)) {
    if (mysqli_query($conn, $query_particular)) {
        echo 'Modificado con éxito';
    }
} else {
    echo "Error".mysqli_error($conn);
}

?>