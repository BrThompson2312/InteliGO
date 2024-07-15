<?php require_once '../conf_page/conexion.php'; ini_set('display_errors', 'on');

$matricula  = $_POST['matricula'];
$marca      = $_POST['marca'];
$modelo     = $_POST['modelo'];
$año        = $_POST['año'];

$query = "INSERT INTO coches VALUES ('$matricula', '$marca', '$modelo', '$año', 1)";
$result = mysqli_query($conn, $query);

if ($result) {
    echo true;
} else {
    echo false;
}

?>