<?php
    require_once 'conexion.php';

    $query = 'SELECT * FROM empleados';
    $result = mysqli_query($conn, $query);
    $json = array();

    if($result){
        while($row = mysqli_fetch_assoc($result)){
            $json[] = array(
                'id' => $row['CI'],
                'nombre' => $row['nombre'],
                'apellido' => $row['apellido']
            );
        }
        echo json_encode($json);
    } else {
        echo 'Error';
    }
?>