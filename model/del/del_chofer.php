<?php require_once '../conf_page/conexion.php';

$cedula = $_POST['cedula'];

$query_chofer = "DELETE FROM chofer WHERE ci = '$cedula'";
$query_maneja = "DELETE FROM maneja WHERE ci = '$cedula'";
$result = mysqli_query($conn, $query);

if ($result) {
    echo 'Eliminado con éxito';
} else {
    echo 'Error';
}

?>