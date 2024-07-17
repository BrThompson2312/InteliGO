<?php require_once '../conf_page/conexion.php';

$matricula  = $data['matricula'];
$marca      = $data['marca'];
$modelo     = $data['modelo'];
$año        = $data['año'];

$query = "UPDATE coches SET marca = '$marca', modelo = '$modelo', año = '$año' WHERE matricula = '$matricula'";
$result = mysqli_query($conn, $query);

if ($result) {
    echo true;
} else {
    echo "Error".mysqli_error($conn);
}

?>