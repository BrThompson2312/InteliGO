<?php
    ini_set('display_errors', 'on');

    require_once '../conexion.php';

    $query = 'SELECT cliente.cod_cliente as cod_cliente, rut, razon_social, nombre_fantasia, Email, telefono, direccion, lista_negra from empresa
    join cliente on cliente.cod_cliente = empresa.cod_cliente
    join telefono_cliente on telefono_cliente.cod_cliente = cliente.cod_cliente;';

    $result = mysqli_query($conn, $query);
    $json = array();

    if($result){
        while($row = mysqli_fetch_assoc($result)){
            $json[] = array(
                'pk' => $row['rut'],
                'lista_negra' => $row['lista_negra'],
                'nombre_fantasia' => $row['nombre_fantasia'],
                'razon_social' => $row['razon_social'],
                'direccion' => $row['direccion'],
                'telefono' => $row['telefono'],
                'correo' => $row['Email']
            );
        }
        echo json_encode($json);
    } else {
        echo 'Error';
    };
?>