<?php require_once '../conf_page/conexion.php'; ini_set('display_errors','on');

$data = json_decode(file_get_contents("php://input"), true);

$cedula     = $data['cedula'];
$nombre     = $data['nombre'];
$fechaing   = $data['fechaing'];

$query_cedula = 
"SELECT cedula, nombre_usuario, fecha_ingreso FROM usuario
WHERE rol_usuario = 'operador' AND activo = 1 AND cedula LIKE '$cedula%' AND nombre_usuario LIKE '$nombre%' AND fecha_ingreso LIKE '$fechaing%'";

$array = array();

$result_cedula = mysqli_query($conn, $query_cedula);
if ($result_cedula) {
    while ($row = mysqli_fetch_assoc($result_cedula)) {
        $array[] = array (
            'col1' => $row['cedula'],
            'col2' => $row['nombre_usuario'],
            'col3' => $row['fecha_ingreso']
        );
    }
    echo json_encode($array);
}

?>