<?php require_once '../conf_page/conexion.php'; ini_set('display_errors','on');

$data = json_decode(file_get_contents("php://input"), true);

$cod_cliente    = $_POST['cliente'];
$origen         = $_POST['origen'];
$destino        = $_POST['destino'];
$fecha          = $_POST['fecha'];
$hora           = $_POST['hora'];
$comentario     = $_POST['comentario'];
$nombre         = $_POST['nombre'];
$apellido       = $_POST['apellido'];
$formaPago      = $_POST['formaPago'];
$monto          = $_POST['monto'];
$chofer         = $_POST['chofer'];

$query_servicio = "INSERT INTO servicio VALUES (0, '$origen', '$destino', '$fecha', '$hora', '$comentario', '$nombre', '$apellido', 1, '$monto')";
$result_servicio = mysqli_query($conn, $query_servicio);
if ($result_servicio) {

    // echo 'Servicio + ';
    
    $query_max_cliente  = "SELECT max(cod_servicio) as codigo FROM servicio";
    $result_max_cliente = mysqli_query($conn, $query_max_cliente);
    $row = mysqli_fetch_assoc($result_max_cliente);
    $cod_servicio = $row['codigo'];
    $query_delete_servicio = "DELETE FROM servicio WHERE cod_servicio = '$cod_servicio'";

    $query_reserva = "INSERT INTO reserva VALUES ('$cod_cliente', '$cod_servicio', now(), now())";
    $query_delete_reserva = "DELETE FROM reserva WHERE cod_servicio = '$cod_servicio'";
    $result_reserva = mysqli_query($conn, $query_reserva);
    if ($result_reserva) {

        // echo 'Reserva + ';

        $query_realizan = "INSERT INTO realizan VALUES ('$cod_servicio', '$chofer')";
        $result_realizan = mysqli_query($conn, $query_realizan);
        if ($result_realizan) {

            // echo 'Realizan + ';
            $query_formaPago = "INSERT INTO forma_pago VALUES (0, '$monto', now())";
            $result_formaPago = mysqli_query($conn, $query_formaPago);
            if ($result_formaPago){


                $query_max_formaPago = "SELECT max(cod_pago) as codigo_pago FROM forma_pago";
                $result_max_formaPago = mysqli_query($conn, $query_max_formaPago);
                $row_pago = mysqli_fetch_assoc($result_max_formaPago);
                $cod_pago = $row_pago['codigo_pago'];

                switch($formaPago){
                    case 'contado':
                        $query_contado = "INSERT INTO contado VALUES ('$cod_pago', '$monto')";
                        $result_contado = mysqli_query($conn, $query_contado);
                        break;
                    
                    case 'debito':
                        $query_debito = "INSERT INTO tarjeta VALUES ('$cod_pago', 'debito')";
                        $result_contado = mysqli_query($conn, $query_debito);
                        break;

                    case 'credito':
                        $query_credito = "INSERT INTO tarjeta VALUES ('$cod_pago', 'credito')";
                        $result_contado = mysqli_query($conn, $query_credito);
                        break;
                }

                $query_delete_pagocon = "DELETE FROM pago_con WHERE cod_pago = '$cod_pago'";
                $query_pagocon = "INSERT INTO pago_con VALUES ('$cod_servicio', '$cod_pago')"; 
                $result_pagocon = mysqli_query($conn, $query_pagocon);
                if ($result_pagocon) {
                    echo true;

                } else {
                    mysqli_query($conn, $query_delete_pagocon);
                    mysqli_query($conn, $query_delete_reserva);
                    mysqli_query($conn, $query_delete_servicio);
                    echo false.'pagocon - ';
                }
            } else {
                mysqli_query($conn, $query_delete_reserva);
                mysqli_query($conn, $query_delete_servicio);
                echo false.'Forma de Pago - ';
            }
        }
        
    } else {
        mysqli_query($conn, $query_delete_servicio);
        echo false.'Reserva - ';
    }

} else {
    echo false.'Servicio - ';
}

?>