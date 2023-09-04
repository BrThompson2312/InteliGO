<?php
    ini_set('display_errors', 'on');

    require_once '../conexion.php';

    $query = 'SELECT * FROM cliente'; 
    $result = mysqli_query($conn, $query);
    $json = array();

    if($result){
        while($row = mysqli_fetch_assoc($result)){
            if($row['lista_negra'] == '1'){
                $json[] = array(
                    'pk' => $row['cod_cliente'],
                    'direccion' => $row['direccion'],  
                );
            }
        }
        echo json_encode($json);
    } else {
        echo 'Error';
    };
?>