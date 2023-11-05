<?php require_once '../conf_page/conexion.php'; ini_set('display_errors', 'on');

$data = json_decode(file_get_contents("php://input"), true);

$cedula     = $data['cedula'];
$nombre     = $data['nombre'];
$contrasena = $data['contrasena'];

$query = "UPDATE usuario SET nombre_usuario = '$nombre', contrasena = '$contrasena' WHERE cedula = '$cedula'";
$result = mysqli_query($conn, $query);

if ($result) {
    echo true;
} else {
    echo false;
}

?>