<?php require_once '../conf_page/conexion.php'; ini_set('display_errors', 'on');

$cedula     = $_POST['cedula'];
$telefono   = $_POST['telefono'];
$nombre     = $_POST['nombre'];
$apellido   = $_POST['apellido'];

$query_chofer = "UPDATE chofer SET nombre = '$nombre', apellido = '$apellido' WHERE cedula = '$cedula'";
$query_telChofer = "UPDATE tel_chofer SET telefono = '$telefono' WHERE cedula = '$cedula'"; 

if (mysqli_query($conn, $query_chofer)) {
    if (mysqli_query($conn, $query_telChofer)) {
        echo "Chofer actualizado correctamente";
    } else {
        echo false;
    }
} else {
    echo false;
}

?>