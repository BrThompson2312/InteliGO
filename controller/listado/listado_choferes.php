<?php
    ini_set('display_errors', 'on');

    require_once '../conexion.php';

    $query = 'SELECT chofer.ci as ci, nombre, telefono from chofer
    join tel_chofer on tel_chofer.ci = chofer.ci';

    $result = mysqli_query($conn, $query);
    $json = array();

    $fecha_ingreso = date("d-m-Y");
    $hora_ingreso = date("h:i:s");

    if($result){
        while($row = mysqli_fetch_assoc($result)){
            $json[] = array(
                'pk' => $row['ci'],
                'nombre' => $row['nombre'],
                'telefono' => $row['telefono'],
            );
        }
        echo json_encode($json);
    } else {
        echo 'Error';
    };
?>