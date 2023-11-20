<?php require_once '../conf_page/conexion.php'; ini_set('display_errors','on');

$data = json_decode(file_get_contents("php://input"), true);

$cliente        = $data['cliente'];
$nombre         = $data['nombre'];
$origen         = $data['origen'];
$destino        = $data['destino'];
$chofer         = $data['chofer'];
$cedulaChofer   = $data['cedulaChofer'];
$apellido       = $data['apellido'];
$fechaReserva   = $data['fechaReserva'];
$horaReserva    = $data['horaReserva'];
$fechaServicio  = $data['fechaServicio'];
$horaServicio   = $data['horaServicio'];
$comentario     = $data['comentario'];
$monto          = $data['monto'];
$formaPago      = $data['formaPago'];
$codServicio    = $data['codServicio'];

$arrCond = array();
if ($cliente) $arrCond[]        = "Re.cod_cliente LIKE '$cliente%'";
if ($nombre) $arrCond[]         = "nombre_pasajero LIKE '$nombre%'";
if ($apellido) $arrCond[]       = "apellido_pasajero LIKE '$apellido%'";
if ($origen) $arrCond[]         = "origen LIKE '$origen%'";
if ($destino) $arrCond[]        = "destino LIKE '$destino%'";
if ($cedulaChofer) $arrCond[]   = "Rea.cedula LIKE '$cedulaChofer%'";
if ($chofer) $arrCond[]         = "Ch.nombre LIKE '$chofer%'";
if ($fechaReserva) $arrCond[]   = "Re.fecha LIKE '$fechaReserva%'";
if ($horaReserva) $arrCond[]    = "Re.hora LIKE '$horaReserva%'";
if ($fechaServicio) $arrCond[]  = "Se.fecha LIKE '$fechaServicio%'";
if ($horaServicio) $arrCond[]   = "Re.hora LIKE '$horaServicio%'";
if ($comentario) $arrCond[]     = "comentario LIKE '$comentario%'";
if ($monto) $arrCond[]          = "Se.monto LIKE '$monto%'";
if ($codServicio) $arrCond[]    = "Re.cod_servicio LIKE '$codServicio%'";

$condicion = '';
if (count($arrCond) > 0){
    $condicion = " AND " . implode(" AND ", $arrCond);
}

$query = 
"SELECT 
Re.cod_servicio AS cod_servicio,
Re.cod_cliente AS cod_cliente, 
Rea.cedula AS cedula_chofer, 
Ch.nombre AS chofer_nombre, origen, 
Se.fecha AS fecha_viaje, 
Re.fecha AS fecha_reserva, destino, 
Re.hora AS hora_reserva, 
Se.hora AS hora_servicio, 
comentario, nombre_pasajero, apellido_pasajero, Se.monto, F.cod_pago FROM servicio Se
JOIN reserva Re ON Re.cod_servicio = Se.cod_servicio
JOIN cliente Cli ON Cli.cod_cliente = Re.cod_cliente
JOIN realizan Rea ON Rea.cod_servicio = Se.cod_servicio
JOIN chofer Ch ON Ch.cedula = Rea.cedula
JOIN pago_con Pc ON Pc.cod_servicio = Se.cod_servicio
JOIN forma_pago F ON F.cod_pago = Pc.cod_pago
WHERE Se.activo = 1 $condicion";
    
$result = mysqli_query($conn, $query);
$json = array();

if($result){
    while($row = mysqli_fetch_assoc($result)){
        $json[] = array(
            'col1' => $row['cod_cliente'],
            'col2' => $row['nombre_pasajero'],
            'col3' => $row['origen'],
            'col4' => $row['destino'],
            'col5' => $row['chofer_nombre'],
            'col6' => $row['cedula_chofer'],
            'col7' => $row['apellido_pasajero'],
            'col8' => $row['fecha_reserva'],
            'col9' => $row['hora_reserva'],
            'col10' => $row['fecha_viaje'],
            'col11' => $row['hora_servicio'],
            'col12' => $row['comentario'],
            'col13' => $row['monto'],
            'col14' => $row['cod_servicio'],
        );
    }
    echo json_encode($json);
}

?>