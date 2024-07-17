<?php require_once '../conf_page/conexion.php'; 

$cedula = $data['cedula'];
$nombre = $data['nombre'];
$pass   = $data['pass'];

$query = "INSERT INTO usuario VALUES ('$cedula','$nombre','$pass','operador',now(), 1)";
$result = mysqli_query($conn, $query);

if ($result){
    echo true;
} else {
    echo false;
}

?>