<?php require_once '../conf_page/conexion.php'; ini_set('display_errors', 'on');

$matricula = $_POST['matricula'];

$query = "UPDATE coches SET activo = 1 WHERE matricula = '$matricula'";
$result = mysqli_query($conn, $query);

if ($result) {
    echo true;
} else {
    echo false;
}

?>