<?php require_once '../conf_page/conexion.php';

$telefono   = $data['telefono'];
$nombre     = $data['nombre'];
$apellido   = $data['apellido'];
$cedula     = $data['cedula'];

$query_chofer = "UPDATE chofer SET nombre = '$nombre', apellido = '$apellido' WHERE cedula = '$cedula'";
$query_telChofer = "UPDATE tel_chofer SET telefono = '$telefono' WHERE cedula = '$cedula'"; 

if (mysqli_query($conn, $query_chofer)) {
    if (mysqli_query($conn, $query_telChofer)) {
        echo true;
    } else {
        echo false;
    }
} else {
    echo false;
}

?>