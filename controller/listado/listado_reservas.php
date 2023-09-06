<?php
    ini_set('display_errors', 'on');

    require_once '../conexion.php';

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
                'pk' => $row['cod_servicio'],
                'tipo' => 'PARTICULAR',
                'nombre' => $row['nombre_pasajero'],
                'cedula_chofer' => $row['ci_chofer'],
                'telefono' => $row['telefono_pasajero'],
                'fecha_reserva' => $row['fecha_reserva'],
                'fecha_servicio' => $row['fecha_servicio'],
                'origen' => $row['origen'],
                'destino' => $row['destino'],
                'hora_inicio' => $row['hora_inicio'],
                'distancia_recorrida' => $row['distancia_recorrida'],
                'comentario' => $row['comentario'],
            );
        }
    } else {
        echo 'Error';
    };
    if($result2){
        while($row = mysqli_fetch_assoc($result2)){
            $json[] = array(
                'pk' => $row['cod_servicio'],
                'tipo' => 'EMPRESA',
                'nombre' => $row['nombre_pasajero'],
                'cedula_chofer' => $row['ci_chofer'],
                'telefono' => $row['telefono_pasajero'],
                'fecha_reserva' => $row['fecha_reserva'],
                'fecha_servicio' => $row['fecha_servicio'],
                'origen' => $row['origen'],
                'destino' => $row['destino'],
                'hora_inicio' => $row['hora_inicio'],
                'distancia_recorrida' => $row['distancia_recorrida'],
                'comentario' => $row['comentario'],
            );
        }
    } else {
        echo 'Error';
    };
    echo json_encode($json);
?>