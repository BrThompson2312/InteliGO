<?php 

require_once '../conf_page/conexion.php';

$data = json_decode(file_get_contents("php://input"), true);

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