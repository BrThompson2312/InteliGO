<?php require_once '../conf_page/conexion.php'; ini_set('display_errors', 'on');

$cedula = $_POST['cedula'];
$matricula = $_POST['matricula'];

$query = "INSERT INTO maneja (cedula, matricula) VALUES ('$cedula', '$matricula')";
$result = mysqli_query($conn, $query);

if ($result) {
    echo true;
} else {
    echo false;
}

?>