<?php require_once '../conf_page/conexion.php'; ini_set('display_errors', 'on');

$query = 
"SELECT reserva.cod_servicio AS servicio, reserva.cod_cliente AS cliente, origen, servicio.fecha, destino, comentario, nombre_pasajero, apellido_pasajero, monto FROM servicio
JOIN reserva ON reserva.cod_servicio = servicio.cod_servicio
JOIN cliente ON cliente.cod_cliente = reserva.cod_cliente
WHERE servicio.activo = 1";
    
$result = mysqli_query($conn, $query);

$json = array();

if($result){
    while($row = mysqli_fetch_assoc($result)){
        $json[] = array(
            'col1' => $row['cliente'],
            'col2' => $row['nombre_pasajero'],
            'col3' => $row['origen'],
            'col4' => $row['destino'],
            'col5' => $row['fecha'],
            'col8' => $row['comentario'],
            'col9' => $row['apellido_pasajero'],
            'col10' => $row['monto'],
            'col11' => $row['servicio']
        );
    }
    echo json_encode($json);
}

?>