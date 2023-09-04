<?php
    ini_set('display_errors', 'on');

    require_once '../conexion.php';

    $query = 'SELECT cliente.cod_cliente, lista_negra, direccion, nombre, apellido from cliente 
            join particular on particular.cod_cliente = cliente.cod_cliente;'; 
    $result = mysqli_query($conn, $query);
    $json = array();

    if($result){
        while($row = mysqli_fetch_assoc($result)){
            $json[] = array(
                'pk' => $row['cod_cliente'],
                'nombre' => $row['nombre'],
                'apellido' => $row['apellido'],  
                'direccion' => $row['direccion'],
                'lista_negra' => $row['lista_negra'],  
            );
        }
        echo json_encode($json);
    } else {
        echo 'Error';
    };
?>