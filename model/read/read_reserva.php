<?php require_once '../conf_page/conexion.php'; ini_set('display_errors', 'on');

$query = 
"SELECT reserva.cod_servicio 
AS servicio, 
realizan.cedula AS cedula_chofer, chofer.nombre AS nombre_chofer, 
reserva.cod_cliente AS cliente, origen, 
servicio.fecha AS fecha_servicio, 
reserva.fecha AS fecha_reserva, destino, 
reserva.hora AS hora_reserva, servicio.hora AS hora_servicio, comentario, nombre_pasajero, apellido_pasajero, monto FROM servicio
JOIN reserva ON reserva.cod_servicio = servicio.cod_servicio
JOIN cliente ON cliente.cod_cliente = reserva.cod_cliente
JOIN realizan ON realizan.cod_servicio = servicio.cod_servicio
JOIN chofer ON chofer.cedula = realizan.cedula
WHERE servicio.activo = 1;";
    
$result = mysqli_query($conn, $query);

$json = array();

if($result){
    while($row = mysqli_fetch_assoc($result)){
        $json[] = array(
            'col1' => $row['cliente'],
            'col2' => $row['nombre_pasajero'],
            'col3' => $row['origen'],
            'col4' => $row['destino'],
            'col5' => $row['nombre_chofer'],
            'col6' => $row['cedula_chofer'],
            'col7' => $row['apellido_pasajero'],
            'col8' => $row['fecha_reserva'],
            'col9' => $row['hora_reserva'],
            'col10' => $row['fecha_servicio'],
            'col11' => $row['hora_servicio'],
            'col12' => $row['comentario'],
            'col13' => $row['monto'],
            'col14' => $row['servicio'],
        );
    }
    echo json_encode($json);
}

?>