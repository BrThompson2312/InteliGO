<?php
    ini_set('display_errors', 'on');

    require_once '../conexion.php';

    // $query = "SELECT (select 'Particular' from particular where particular.cod_cliente=cliente.cod_cliente) as tipoParticular, (select 'Empresa' from empresa where empresa.cod_cliente=cliente.cod_cliente) as tipoEmpresa,  cliente.cod_cliente, servicio.cod_servicio, origen, destino, reserva.fecha as fecha_de_la_reserva, servicio.fecha as fecha_del_viaje, hora_inicio, distancia_recorrida, comentario, nombre_pasajero, apellido_pasajero, telefono from servicio
    //     join reserva on reserva.cod_servicio = servicio.cod_servicio
    //     join cliente on cliente.cod_cliente = reserva.cod_cliente
    //     join telefono_cliente on telefono_cliente.cod_cliente = cliente.cod_cliente;";

    $query = "SELECT realizan.ci as cedula_chofer, particular.cod_cliente, servicio.cod_servicio, origen, destino, reserva.fecha AS fecha_reserva, servicio.fecha as fecha_servicio, hora_inicio, distancia_recorrida, comentario, nombre_pasajero, apellido_pasajero, telefono from servicio
    join reserva on reserva.cod_servicio = servicio.cod_servicio
    join cliente on cliente.cod_cliente = reserva.cod_cliente
    join particular on particular.cod_cliente = cliente.cod_cliente
    join telefono_cliente on telefono_cliente.cod_cliente = cliente.cod_cliente
    join realizan on realizan.cod_servicio = servicio.cod_servicio;";

    $query2 = "SELECT realizan.ci as cedula_chofer, empresa.cod_cliente, servicio.cod_servicio, origen, destino, reserva.fecha as fecha_reserva, servicio.fecha as fecha_servicio, hora_inicio, distancia_recorrida, comentario, nombre_pasajero, apellido_pasajero, telefono from servicio
    join reserva on reserva.cod_servicio = servicio.cod_servicio
    join cliente on cliente.cod_cliente = reserva.cod_cliente
    join empresa on empresa.cod_cliente = cliente.cod_cliente
    join telefono_cliente on telefono_cliente.cod_cliente = cliente.cod_cliente
    join realizan on realizan.cod_servicio = servicio.cod_servicio;";
        
    $result = mysqli_query($conn, $query);
    $result2 = mysqli_query($conn, $query2);

    $json = array();

    if($result){
        while($row = mysqli_fetch_assoc($result)){
            $json[] = array(
                'pk' => $row['cod_servicio'],
                'tipo' => 'PARTICULAR',
                'nombre' => $row['nombre_pasajero'],
                'apellido' => $row['apellido_pasajero'],
                'cedula_chofer' => $row['cedula_chofer'],
                'telefono' => $row['telefono'],
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
                'apellido' => $row['apellido_pasajero'],
                'cedula_chofer' => $row['cedula_chofer'],
                'telefono' => $row['telefono'],
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