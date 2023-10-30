<?php require_once '../conf_page/conexion.php';

$cedula = $_POST['send'];

$query = "DELETE FROM maneja WHERE cedula = '$cedula'";
$result = mysqli_query($conn, $query);

if ($result) {
    echo true;
} else {
    echo false;
}

?>