<?php require_once '../conf_page/conexion.php'; ini_set('display_errors', 'on');

$cedula     = $_POST['cedula'];
$nombre     = $_POST['nombre'];
$apellido   = $_POST['apellido'];

$query = "UPDATE chofer SET nombre = '$nombre', apellido = '$apellido' WHERE cedula = '$cedula'";
$result = mysqli_query($conn, $query);

if ($result) {
    echo 'Modificado con éxito';
} else {
    echo "Error".mysqli_error($conn);
}

?>