<?php require_once '../conf_page/conexion.php';

$matricula  = $data['matricula'];
$marca      = $data['marca'];
$modelo     = $data['modelo'];
$año        = $data['año'];

$query = "INSERT INTO coches VALUES ('$matricula', '$marca', '$modelo', '$año', 1)";
$result = mysqli_query($conn, $query);

if ($result) {
    echo true;
} else {
    echo false;
}

?>