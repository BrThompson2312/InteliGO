<?php require_once '../conf_page/conexion.php';

$cedula = $data['cedula'];
$coche  = $data['coche'];

$query = "UPDATE maneja SET matricula = '$coche' WHERE cedula = '$cedula'";

if (mysqli_query($conn, $query)) {
    echo true;
} else {
    echo false.mysqli_error($conn);
}

?>