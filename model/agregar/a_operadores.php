<?php require_once '../conexion.php';

ini_set('display_errors', 'on');

$nombre = $_POST['nombre'];
$cedula = $_POST['cedula'];
$edad = $_POST['edad'];
$pass = $_POST['pass'];
$rol = $_POST['rol'];    
$fecha = $_POST['fecha'];

// echo "$nombre \n $cedula \n $edad \n $pass \n $rol \n $fecha";

$query = "INSERT INTO usuario VALUES ('$cedula', '$nombre', '$pass','$rol','$fecha')";
$result = mysqli_query($conn, $query);

if ($result){
    echo 'Datos guardados con éxito';
} else {
    echo "No cumple con los requisitos \n";
    echo "$nombre \n $cedula \n $edad \n $pass \n $rol \n $fecha";
}

?>