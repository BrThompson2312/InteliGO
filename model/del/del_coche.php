<?php require_once '../conf_page/conexion.php';

$matricula = $data['send'];

$query = "UPDATE coches SET activo = 0 WHERE matricula = '$matricula'";
$result = mysqli_query($conn, $query);

if ($result) {
    echo true;
} else {
    echo false;
}

?>