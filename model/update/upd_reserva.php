<?php require_once '../conf_page/conexion.php';

$cod            = $data['cod'];
$nombre         = $data['nombre'];
$forma_pago     = $data['forma_pago'];
$apellido       = $data['apellido'];
$monto          = $data['monto'];
$cliente        = $data['cliente'];
$origen         = $data['origen'];
$destino        = $data['destino'];
$chofer         = $data['chofer'];
$fecha          = $data['fecha'];
$hora           = $data['hora'];
$comentario     = $data['comentario'];

$query_servicio = "UPDATE servicio SET origen = '$origen', destino = '$destino', fecha = '$fecha', hora = '$hora', comentario = '$comentario', nombre_pasajero = '$nombre', apellido_pasajero = '$apellido' WHERE cod_servicio = '$cod'";
$query_formaPago = "UPDATE forma_pago SET monto = '$monto' WHERE cod_pago = (SELECT cod_pago FROM pago_con WHERE cod_servicio = '$cod')";
$query_reserva = "UPDATE reserva SET cod_cliente = '$cliente' WHERE cod_servicio = '$cod'";
$query_realizan = "UPDATE realizan SET cedula = '$chofer' WHERE cod_servicio = '$cod'";

$result_servicio = mysqli_query($conn, $query_servicio);
if ($result_servicio) {

    $result_formaPago = mysqli_query($conn, $query_formaPago);
    if ($result_formaPago) {

        $result_reserva = mysqli_query($conn, $query_reserva);
        if ($result_reserva) {

            $result_realizan = mysqli_query($conn, $query_realizan);
            if ($result_realizan) {

                echo true;

            } else {
                echo 'Realizan - '.mysqli_error($conn);
            }
        } else {
            echo 'Reserva - ';
        }
    }
} else {
    echo 'Servicio - '.mysqli_error($conn);
}

?>