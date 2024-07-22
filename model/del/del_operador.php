<?php require_once '../conf_page/conexion.php';

$cedula = $data['send'];

$query = "UPDATE usuario SET activo = 0 WHERE cedula = '$cedula'";
$result = mysqli_query($conn, $query);

if ($result) {
    echo true;
} else {
    echo false;
}

// echo $cedula

?>