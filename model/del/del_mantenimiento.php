<?php require_once '../conf_page/conexion.php';

$codigo = $data['send'];

$query = "UPDATE mantenimiento SET activo = 0 WHERE cod_mantenimiento = '$codigo'";
$result = mysqli_query($conn, $query);

if ($result) {
    echo true;
} else {
    echo false;
}

?>