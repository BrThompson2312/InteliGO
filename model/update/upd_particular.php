<?php require_once '../conf_page/conexion.php'; ini_set('display_errors', 'on');

$data = json_decode(file_get_contents("php://input"), true);

$cod            = $data['cod'];
$nombre         = $data['nombre'];
$apellido       = $data['apellido'];
$direccion      = $data['direccion'];
$telefono       = $data['telefono'];
$listanegra     = $data['listanegra'];

// echo "$cod \n $nombre \n $apellido \n $direccion \n $telefono \n $listanegra";

$query_cliente      = "UPDATE cliente SET direccion = '$direccion', lista_negra = '$listanegra' WHERE cod_cliente = '$cod'";
$query_particular   = "UPDATE particular SET nombre = '$nombre', apellido = '$apellido' WHERE cod_cliente = '$cod'";
$query_telefono     = "UPDATE telefono_cliente SET telefono = '$telefono' WHERE cod_cliente = '$cod'";

if (mysqli_query($conn, $query_cliente)) {
    if (mysqli_query($conn, $query_particular)) {
        if (mysqli_query($conn, $query_telefono)) {
            echo true;
        } else {
            echo 'Error particular';
        }
    }
} else {
    echo "Error".mysqli_error($conn);
}

?>