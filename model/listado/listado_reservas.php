<?php require_once '../conexion.php';

ini_set('display_errors', 'on');

$query = "SELECT servicio.cod_servicio, particular.cod_cliente, nombre_pasajero, realizan.ci as ci_chofer, telefono as telefono_pasajero, origen, destino, reserva.fecha as fecha_reserva, servicio.fecha as fecha_servicio, hora_inicio, distancia_recorrida, comentario from servicio
join reserva on reserva.cod_servicio = servicio.cod_servicio
join cliente on cliente.cod_cliente = reserva.cod_cliente
join telefono_cliente on telefono_cliente.cod_cliente = cliente.cod_cliente
join realizan on realizan.cod_servicio = servicio.cod_servicio
join particular on particular.cod_cliente = cliente.cod_cliente";

$query2 = "SELECT servicio.cod_servicio, empresa.cod_cliente, nombre_pasajero, realizan.ci as ci_chofer, telefono as telefono_pasajero, origen, destino, reserva.fecha as fecha_reserva, servicio.fecha as fecha_servicio, hora_inicio, distancia_recorrida, comentario from servicio
join reserva on reserva.cod_servicio = servicio.cod_servicio
join cliente on cliente.cod_cliente = reserva.cod_cliente
join telefono_cliente on telefono_cliente.cod_cliente = cliente.cod_cliente
join realizan on realizan.cod_servicio = servicio.cod_servicio
join empresa on empresa.cod_cliente = cliente.cod_cliente;";
    
$result = mysqli_query($conn, $query);
$result2 = mysqli_query($conn, $query2);

$json = array();

if($result){
    while($row = mysqli_fetch_assoc($result)){
        $json[] = array(
            'col1' => $row['cod_servicio'],
            'col2' => 'PARTICULAR',
            'col3' => $row['nombre_pasajero'],
            'col4' => $row['ci_chofer'],
            'col5' => $row['telefono_pasajero'],
            'col6' => $row['fecha_reserva'],
            'col7' => $row['fecha_servicio'],
            'col8' => $row['origen'],
            'col9' => $row['destino'],
            'col10' => $row['hora_inicio'],
            'col11' => $row['distancia_recorrida'],
            'col12' => $row['comentario'],
        );
    }
}
if($result2){
    while($row = mysqli_fetch_assoc($result2)){
        $json[] = array(
            'col1' => $row['cod_servicio'],
            'col2' => 'EMPRESA',
            'col3' => $row['nombre_pasajero'],
            'col4' => $row['ci_chofer'],
            'col5' => $row['telefono_pasajero'],
            'col6' => $row['fecha_reserva'],
            'col7' => $row['fecha_servicio'],
            'col8' => $row['origen'],
            'col9' => $row['destino'],
            'col10' => $row['hora_inicio'],
            'col11' => $row['distancia_recorrida'],
            'col12' => $row['comentario'],
        );
    }
}
echo json_encode($json);

?>