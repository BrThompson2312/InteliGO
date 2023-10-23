<?php require_once '../conf_page/conexion.php';

ini_set('display_errors', 'on');

$query = "SELECT servicio.cod_servicio, chofer.nombre as nombre_chofer, particular.cod_cliente, nombre_pasajero, realizan.ci as ci_chofer, telefono as telefono_pasajero, origen, destino, reserva.fecha as fecha_reserva, servicio.fecha as fecha_servicio, hora_inicio, comentario from servicio
join reserva on reserva.cod_servicio = servicio.cod_servicio
join cliente on cliente.cod_cliente = reserva.cod_cliente
join telefono_cliente on telefono_cliente.cod_cliente = cliente.cod_cliente
join realizan on realizan.cod_servicio = servicio.cod_servicio
join chofer on chofer.ci = realizan.ci
join particular on particular.cod_cliente = cliente.cod_cliente;";

$query2 = "SELECT servicio.cod_servicio, chofer.nombre as nombre_chofer, empresa.cod_cliente, nombre_pasajero, realizan.ci as ci_chofer, telefono as telefono_pasajero, origen, destino, reserva.fecha as fecha_reserva, servicio.fecha as fecha_servicio, hora_inicio, comentario from servicio
join reserva on reserva.cod_servicio = servicio.cod_servicio
join cliente on cliente.cod_cliente = reserva.cod_cliente
join telefono_cliente on telefono_cliente.cod_cliente = cliente.cod_cliente
join realizan on realizan.cod_servicio = servicio.cod_servicio
join chofer on chofer.ci = realizan.ci
join empresa on empresa.cod_cliente = cliente.cod_cliente;";
    
$result = mysqli_query($conn, $query);
$result2 = mysqli_query($conn, $query2);

$json = array();

if($result){
    while($row = mysqli_fetch_assoc($result)){
        $json[] = array(
            'col1' => $row['cod_servicio'],
            'col2' => 'PARTICULAR',
            // 'col3' => $row['nombre_pasajero'],
            'col3' => $row['nombre_chofer'],
            'col4' => $row['origen'],
            'col5' => $row['destino'],
            'col6' => $row['telefono_pasajero'],
            'col7' => $row['fecha_reserva'],
            'col8' => $row['fecha_servicio'],
            'col9' => $row['hora_inicio'],
            // 'col10' => $row['hora_llegada'],
            'col11' => $row['comentario'],
        );
    }
}
if($result2){
    while($row = mysqli_fetch_assoc($result2)){
        $json[] = array(
            'col1' => $row['cod_servicio'],
            'col2' => 'EMPRESA',
            // 'col3' => $row['nombre_pasajero'],
            'col3' => $row['nombre_chofer'],
            'col4' => $row['origen'],
            'col5' => $row['destino'],
            'col6' => $row['telefono_pasajero'],
            'col7' => $row['fecha_reserva'],
            'col8' => $row['fecha_servicio'],
            'col9' => $row['hora_inicio'],
            // 'col10' => $row['hora_llegada'],
            'col11' => $row['comentario'],
        );
    }
}
echo json_encode($json);

?>