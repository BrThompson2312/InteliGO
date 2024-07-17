<?php require_once '../conf_page/conexion.php';

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