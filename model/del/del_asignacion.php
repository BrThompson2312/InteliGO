<?php require_once '../conf_page/conexion.php';

$cedula = $_POST['send'];

$query_realizan = "DELETE FROM realizan WHERE cedula = '$cedula'";
$query_asignacion = "DELETE FROM maneja WHERE cedula = '$cedula'";

if (mysqli_query($conn, $query_realizan)) {
    if (mysqli_query($conn, $query_asignacion)) {
        echo true;
    } else {
        echo false;
    }
} else {
    echo false;
}

?>