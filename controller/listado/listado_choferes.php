<?php
    ini_set('display_errors', 'on');

    require_once '../conexion.php';

    $query = 'SELECT * FROM chofer ORDER BY nombre';
    $result = mysqli_query($conn, $query);
    $json = array();

    if($result){
        while($row = mysqli_fetch_assoc($result)){
            $json[] = array(
                'pk' => $row['ci'],
                'nombre' => $row['nombre'],
                'id' => $row['id_chofer']
            );
        }
        echo json_encode($json);
    } else {
        echo 'Error';
    };
?>