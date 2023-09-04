<?php
    ini_set('display_errors', 'on');

    require_once '../conexion.php';

    $query = 'SELECT cliente.cod_cliente, rut, razon_social, lista_negra, direccion, telefono from cliente
    join empresa on empresa.cod_cliente = cliente.cod_cliente
    join telefono_cliente on telefono_cliente.cod_cliente = cliente.cod_cliente;';

    $result = mysqli_query($conn, $query);
    $json = array();

    if($result){
        while($row = mysqli_fetch_assoc($result)){
                $json[] = array(
                    'pk' => $row['cod_cliente'],
                    'rut' => $row['rut'],
                    'lista_negra' => $row['lista_negra'],
                    'razon_social' => $row['razon_social'],
                    'direccion' => $row['direccion'],
                    'telefono' => $row['telefono'],
                );
            }
        echo json_encode($json);
    } else {
        echo 'Error';
    };
?>