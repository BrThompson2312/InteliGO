<?php require_once '../conf_page/conexion.php';

ini_set('display_errors', 'on');

$cedula = $_POST['cedula'];
$nombre = $_POST['nombre'];
$rol = 'operador';
$pass = $_POST['pass'];
$fecha = $_POST['fecha'];

$query = "INSERT INTO usuario VALUES ('$cedula','$nombre','$pass','$rol','$fecha', 1)";
$result = mysqli_query($conn, $query);

if ($result){
    echo true;
} else {
    echo false;
}

?>