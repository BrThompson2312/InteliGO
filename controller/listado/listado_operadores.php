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
                    'nombre' => $row['nombre_usuario'],
                    'pk' => $row['ci_usuario'],
                    'rol' => $row['rol_usuario'],
                    'fechaing' => $row['fecha_ingreso']
                );
            }
        }
        echo json_encode($json);
    } else {
        echo 'Error';
    };
?>