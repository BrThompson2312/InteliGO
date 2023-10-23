<?php require_once '../conf_page/conexion.php';

ini_set('display_errors', 'on');

$cedula = $_POST['cedula'];
$nombre = $_POST['nombre'];
$telefono = $_POST['telefono'];
$matricula = $_POST['matricula'];
$modelo = $_POST['modelo'];
$marca = $_POST['marca'];
$año = $_POST['año']; 

echo "$cedula \n $nombre \n $telefono \n $matricula \n $modelo \n $marca \n $año";

$query_chofer = "INSERT INTO chofer VALUES ('$cedula', '$nombre')";
$query_coche = "INSERT INTO coches VALUES ('$matricula', '$modelo','$marca','$año')";
$query_maneja = "INSERT INTO maneja VALUES ('$cedula', '$matricula')";
$query_tel = "INSERT INTO tel_chofer VALUES ('$cedula', '$telefono')";

$result_chofer = mysqli_query($conn, $query_chofer);
$result_coche = mysqli_query($conn, $query_coche);
$result_maneja = mysqli_query($conn, $query_maneja);
$result_tel = mysqli_query($conn, $query_tel);

if ($result_chofer && $result_coche && $result_maneja && $result_tel) {
    echo true;
} else {
    echo false;
}

?>