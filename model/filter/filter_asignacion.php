<?php require_once '../conf_page/conexion.php'; ini_set('display_errors','on');

$data = json_decode(file_get_contents("php://input"), true);

$cedula = $data['cedula'];
$chofer = $data['chofer'];
$coche  = $data['coche'];

$query = 
"SELECT maneja.cedula, nombre, matricula FROM maneja
JOIN chofer ON chofer.cedula = maneja.cedula
WHERE maneja.cedula LIKE '$cedula%'
AND nombre LIKE '$chofer%'
AND matricula LIKE '$coche%'";

$result = mysqli_query($conn, $query);
$json = array();

if ($result){
    while ($row = mysqli_fetch_assoc($result)) {
        $json[] = array(
            'col1' => $row['cedula'],
            'col2' => $row['nombre'],
            'col3' => $row['matricula']
        );
    }
    echo json_encode($json);
} else {
    echo 'No hay conexión';
}

?>