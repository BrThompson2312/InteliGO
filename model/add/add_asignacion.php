<?php require_once '../conf_page/conexion.php';

$cedula     = $data['cedula'];
$matricula  = $data['matricula'];

$query = "INSERT INTO maneja (cedula, matricula) VALUES ('$cedula', '$matricula')";
$result = mysqli_query($conn, $query);

if ($result) {
    echo true;
} else {
    echo false;
}

?>