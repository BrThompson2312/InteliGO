<?php
    ini_set('display_errors', 'on');

    require_once '../conexion.php';

    $query = 'SELECT * FROM usuario ORDER BY nombre_usuario';
    $result = mysqli_query($conn, $query);
    $json = array();

    if($result){
        while($row = mysqli_fetch_assoc($result)){
            if ($row['rol_usuario'] == 'operador'){
                $json[] = array(
                    'pk' => $row['ci_usuario'],
                    'nombre' => $row['nombre_usuario'],
                    'fechaing_operador' => $row['fecha_ingreso'],
                );
            }
        }
        echo json_encode($json);
    } else {
        echo 'Error';
    };
?>