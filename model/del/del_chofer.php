<?php require_once '../conf_page/conexion.php';

$cedula = $data['send'];

$query = "UPDATE chofer SET activo = 0, fecha_desactivacion = now() WHERE cedula = '$cedula'";
$result = mysqli_query($conn, $query);

if ($result) {
    echo true;
} else {
    echo false;
}

?>