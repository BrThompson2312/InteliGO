<?php require_once '../conexion.php';

ini_set('display_errors', 'on');

$cedula = $_POST['cedula'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$lista_negra = $_POST['lista_negra'];

$query_particular = "INSERT INTO particular VALUES ('$cedula','$nombre','$apellido')";
$query_cliente = "INSERT INTO cliente VALUES ('$cedula','$lista_negra','$direccion')";
$query_tel = "INSERT INTO telefono_cliente VALUES ('$cedula','$telefono')";

$result_particular = mysqli_query($conn, $query_particular);
$result_cliente = mysqli_query($conn, $query_cliente);
$result_tel = mysqli_query($conn, $query_tel);

// if($result_particular){
//     if($result_cliente){
//         if($result_tel){ 
//             echo 'Formulario rellenado con éxito';
//         } else {
//             echo 'Fallo result tel';
//         }
//     } else {
//         echo 'Fallo result cliente';
//     }
// } else {
//     echo 'fallo result particular';
// }

if ($result_particular && $result_cliente && $result_tel) {
    echo 'Formulario rellenado con éxito';
} else {
    echo 'Fallo al rellenar el formulario';
}


?>