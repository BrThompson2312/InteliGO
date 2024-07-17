<?php require_once '../conf_page/conexion.php';

$matricula = $data['matricula'];

$query = "UPDATE coches SET activo = 1 WHERE matricula = '$matricula'";
$result = mysqli_query($conn, $query);

if ($result) {
    echo true;
} else {
    echo false;
}

?>