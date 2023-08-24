<?php
    require_once 'conexion.php';

    $query = 'SELECT * FROM chofer';
    $result = mysqli_query($conn, $query);
    $json = array();

    if($result){
        while($row = mysqli_fetch_assoc($result)){
            //$json[] = array($row['ci'], $row['nombre'], $row['id_chofer']);
            $json[] = array(
                'ci' => $row['ci'],
                'nombre_completo' => $row['nombre'],
                'id' => $row['id_chofer']
            );
        }
        echo json_encode($json);
    } else {
        echo 'Error';
    }
?>