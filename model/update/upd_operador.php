<?php require_once '../conf_page/conexion.php'; ini_set('display_errors', 'on');

$cedula     = $_POST['cedula'];
$nombre     = $_POST['nombre'];
$contrasena = $_POST['contrasena'];

$query = "UPDATE usuario SET nombre_usuario = '$nombre', contrasena = '$contrasena' WHERE cedula = '$cedula'";
$result = mysqli_query($conn, $query);

if ($result) {
    echo 'Modificado con éxito';
} else {
    echo "Error".mysqli_error($conn);
}

?>