<?php require_once '../conf_page/conexion.php';

ini_set('display_errors', 'on');

$query = 'SELECT * FROM usuario where activo = 1';
$result = mysqli_query($conn, $query);
$json = array();

if($result){
    while($row = mysqli_fetch_assoc($result)){
        if ($row['rol_usuario'] == 'operador'){
            $json[] = array(
                'col1' => $row['cedula'],
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