<?php require_once '../conf_page/conexion.php';

$cod_servicio = $data['send'];

$query = "UPDATE servicio SET activo = 0 WHERE cod_servicio = '$cod_servicio'";
$result = mysqli_query($conn, $query);

if ($result) {
    echo true;
} else {
    echo false;
}

?>