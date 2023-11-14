<?php require_once '../conf_page/conexion.php'; ini_set('display_errors','on');

$data = json_decode(file_get_contents("php://input"), true);

$telefono   = $data['telefono'];
$nombre     = $data['nombre'];
$apellido   = $data['apellido'];
$cedula     = $data['cedula'];

$query = 
"SELECT telefono, nombre, apellido, chofer.cedula FROM chofer 
JOIN tel_chofer ON tel_chofer.cedula = chofer.cedula 
WHERE telefono LIKE '$telefono%' 
AND nombre LIKE '$nombre%' 
AND apellido LIKE '$apellido%' 
AND chofer.cedula LIKE '$cedula%'
AND activo = 1";

$result = mysqli_query($conn, $query);
$json = array();

if ($result) {
    while ($row = mysqli_fetch_assoc($result)){
        $json[] = array(
            'col1' => $row['telefono'],
            'col2' => $row['nombre'],
            'col3' => $row['apellido'],
            'col4' => $row['cedula']
        );
    }
    echo json_encode($json);
} else {
    echo 'No hay conexion';
}

?>