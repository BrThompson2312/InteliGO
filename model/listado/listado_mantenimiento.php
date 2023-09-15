<?php
    ini_set('display_errors', 'on');

    require_once '../conexion.php';

    $query = 'SELECT * FROM mantenimiento ORDER BY tipo_mantenimiento';
    $result = mysqli_query($conn, $query);
    $json = array();

    if($result){
        while($row = mysqli_fetch_assoc($result)){
            $json[] = array(
                'pk' => $row['cod_mantenimiento'],
                'tipo_mantenimiento' => $row['tipo_mantenimiento'],  
                'gastos_mantenimiento' => $row['gastos_mantenimiento'], 
                'comentarios' => $row['comentarios'], 
            );
        }
        echo json_encode($json);
    } else {
        echo 'Error';
    };
?>