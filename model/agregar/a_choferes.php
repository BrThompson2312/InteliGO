<?php

ini_set('display_errors', 'on');
require_once '../conexion.php';

$nombre = $_POST['nombre'];
$cedula = $_POST['cedula'];
$tel = $_POST['tel'];
$matricula = $_POST['matricula'];
$marca = $_POST['marca'];
$año = $_POST['año']; 

echo "$nombre \n $cedula \n $tel \n $matricula \n $marca \n $año";

// if ($nombre_chofer == NULL || $cedula_chofer == NULL || $tel == NULL) {
//     echo 'Debe rellenar todo el formulario';
// } else if (strlen($cedula_chofer) == 8 && strlen($tel) == 9) {
//     $query_chofer = "INSERT INTO chofer VALUES ('$cedula_chofer', '$nombre_chofer')";
//     $query_tel = "INSERT INTO tel_chofer VALUES ('$cedula_chofer', '$tel')";

//     $result_chofer = mysqli_query($conn, $query_chofer);
//     $result_tel = mysqli_query($conn, $query_tel);
//     if ($result_chofer) {
//         if ($result_tel){
//             echo 'Formulario rellenado con éxito';
//         }
//     } else {
//         echo 'Error';
//     }
// } else {
//     echo 'Error en los campos ingresados';
// }

?>