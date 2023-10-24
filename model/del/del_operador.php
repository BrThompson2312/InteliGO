<?php require_once '../conf_page/conexion.php';

$cedula = $_POST['cedula'];

$query = "UPDATE usuario SET activo = 0 WHERE ci_usuario = '$cedula'";
$result = mysqli_query($conn, $query);

if ($result) {
    echo true;
} else {
    echo false;
}

?>