<?php
    ini_set('display_errors', 'on');

    require_once '../conexion.php';

    $query = 'SELECT * FROM coches';
    $result = mysqli_query($conn, $query);
    $json = array();

    if($result){
        while($row = mysqli_fetch_assoc($result)){
            $json[] = array(
                'pk' => $row['matricula'],
                'marca' => $row['marca'],
                'modelo' => $row['modelo'],
                'año' => $row['año']
            );
        }
        echo json_encode($json);
    } else {
        echo 'Error';
    };
?>