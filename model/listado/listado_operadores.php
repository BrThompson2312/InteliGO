<?php require_once '../conexion.php';

ini_set('display_errors', 'on');

$query = 'SELECT * FROM usuario ORDER BY nombre_usuario';
$result = mysqli_query($conn, $query);
$json = array();

if($result){
    while($row = mysqli_fetch_assoc($result)){
        if ($row['rol_usuario'] == 'operador'){
            $json[] = array(
                'col1' => $row['ci_usuario'],
                'col2' => $row['nombre_usuario'],
                'col3' => $row['fecha_ingreso'],
            );
        }
    }
    echo json_encode($json);
} else {
    echo 'Error';
};

?>