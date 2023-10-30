<?php require_once '../conf_page/conexion.php'; ini_set('display_errors','on');

// Servicio
$origen         = $_POST['origen'];
$destino        = $_POST['destino'];
$fecha          = $_POST['fecha'];
$hora           = $_POST['hora'];
$comentario     = $_POST['comentario'];
$nombre         = $_POST['nombre'];
$apellido       = $_POST['apellido'];
$monto          = $_POST['monto'];

// Realizan
$chofer         = $_POST['chofer'];

// Telefono del cliente
$telefono       = $_POST['telefono'];

// Reserva del viaje
$cod_cliente    = $_POST['cliente'];
$fecha_reserva  = $_POST['fecha_reserva'];
$hora_reserva   = $_POST['hora_reserva'];

$query_servicio = "INSERT INTO servicio 
VALUES (0, '$origen', '$destino', '$fecha', '$hora', '$comentario', '$nombre', '$apellido', '$monto', 1)";

if (mysqli_query($conn, $query_servicio)) {
    
    $query_max_cliente  = "SELECT max(cod_servicio) as codigo FROM servicio";
    $result_max_cliente = mysqli_query($conn, $query_max_cliente);
    $row                = mysqli_fetch_assoc($result_max_cliente);
    $cod_servicio       = $row['codigo'];

    $query_delete_servicio = "DELETE FROM servicio WHERE cod_servicio = '$cod_servicio'";


    $query_reserva          = "INSERT INTO reserva VALUES ('$cod_cliente', '$cod_servicio', '$hora', '$fecha_reserva')";
    $query_delete_reserva   = "DELETE FROM reserva WHERE cod_servicio = '$cod_servicio'"; 

    $query_telefono         = "INSERT INTO telefono_cliente VALUES ($cod_cliente, '$telefono')";

    if (mysqli_query($conn, $query_reserva)) {
        
        if (mysqli_query($conn, $query_telefono)){
            echo true;

        } else {
            mysqli_query($conn, $query_delete_reserva);
            echo 'Error Telefono';
        }
    } else {
        mysqli_query($conn, $query_delete_servicio);
        echo 'Error Reserva';
    }
} else {
    echo 'Error Servicio';
}

?>