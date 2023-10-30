<?php require_once '../conf_page/conexion.php'; ini_set('display_errors', 'on');

$cod            = $_POST['cod'];
$nombre         = $_POST['nombre'];
$apellido       = $_POST['apellido'];
$monto          = $_POST['monto'];
$cliente        = $_POST['cliente'];
$origen         = $_POST['origen'];
$destino        = $_POST['destino'];
$fecha          = $_POST['fecha'];
$hora           = $_POST['hora'];
$comentario     = $_POST['comentario'];

$query_servicio = 
"UPDATE servicio SET origen = '$origen', destino = '$destino', fecha = '$fecha', hora = '$hora', comentario = '$comentario', nombre_pasajero = '$nombre', apellido_pasajero = '$apellido', monto = '$monto' WHERE cod_servicio = '$cod'";

$query_reserva 
= "UPDATE reserva SET cod_cliente = '$cliente' WHERE cod_servicio = '$cod'";

if (mysqli_query($conn, $query_servicio)) {
    if (mysqli_query($conn, $query_reserva)) {
        echo true;
    }
} else {
    echo false;
}

?>