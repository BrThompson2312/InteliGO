<?php require_once '../conexion.php';

ini_set('display_errors', 'on');

$cedula = $_POST['cedula'];
$nombre = $_POST['nombre'];
$rol = 'operador';
$pass = $_POST['pass'];
$fecha = $_POST['fecha'];

$query = "INSERT INTO usuario VALUES ('$cedula','$nombre','$pass','$rol','$fecha')";
$result = mysqli_query($conn, $query);

if ($result){
    echo 'Datos guardados con éxito';
} else {
    echo "No cumple con los requisitos: \n $cedula \n $nombre \n $pass \n $rol \n $fecha";
}

?>