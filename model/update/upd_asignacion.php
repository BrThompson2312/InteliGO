<?php require_once '../conf_page/conexion.php'; ini_set('display_errors', 'on');

$data = json_decode(file_get_contents("php://input"), true);

$cedula = $data['cedula'];
$coche  = $data['coche'];

$query = "UPDATE maneja SET matricula = '$coche' WHERE cedula = '$cedula'";

if (mysqli_query($conn, $query)) {
    echo true;
} else {
    echo false.mysqli_error($conn);
}

?>