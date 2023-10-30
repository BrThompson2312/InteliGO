<?php require_once '../conf_page/conexion.php'; ini_set('display_errors', 'on');

$matricula  = $_POST['matricula'];
$marca      = $_POST['marca'];
$modelo     = $_POST['modelo'];
$año        = $_POST['año'];

// echo "$matricula \n $marca \n $modelo \n $año";

$query = "UPDATE coches SET marca = '$marca', modelo = '$modelo', año = '$año' WHERE matricula = '$matricula'";
$result = mysqli_query($conn, $query);

if ($result) {
    echo 'Modificado con éxito';
} else {
    echo "Error".mysqli_error($conn);
}

?>