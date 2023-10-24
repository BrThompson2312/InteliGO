<?php require_once '../conf_page/conexion.php';

ini_set('display_errors', 'on');


// Chofer
$cedula     = $_POST['cedula'];
$nombre     = $_POST['nombre'];

// Coche
$matricula  = $_POST['matricula'];
$modelo     = $_POST['modelo'];
$marca      = $_POST['marca'];
$año        = $_POST['año'];

// Telefono
$telefono   = $_POST['telefono'];

$query_chofer   = "INSERT INTO chofer VALUES ('$cedula', '$nombre', 1)";
$query_coche    = "INSERT INTO coches VALUES ('$matricula', '$modelo','$marca','$año')";
$query_maneja   = "INSERT INTO maneja VALUES ('$cedula', '$matricula')";
$query_tel      = "INSERT INTO tel_chofer VALUES ('$cedula', '$telefono')";

$result_chofer  = mysqli_query($conn, $query_chofer);
$result_coche   = mysqli_query($conn, $query_coche);
$result_maneja  = mysqli_query($conn, $query_maneja);
$result_tel     = mysqli_query($conn, $query_tel);

if ($result_chofer){
    if ($result_coche) {
        if ($result_maneja) {
            if($result_tel){
                echo true;
            } else {
                $query_delete_chofer = "DELETE FROM chofer WHERE ci = '$cedula'";
                mysqli_query($conn, $query_delete_chofer);
                $query_delete_coche = "DELETE FROM coches WHERE matricula = '$matricula'";
                mysqli_query($conn, $query_delete_coche);
                $query_delete_maneja = "DELETE FROM maneja WHERE ci = '$cedula' AND matricula = '$matricula'";
                mysqli_query($conn, $query_delete_maneja);
                echo 'Error al guardar el telefono';
            }
        } else {
            $query_delete_chofer = "DELETE FROM chofer WHERE ci = '$cedula'";
            mysqli_query($conn, $query_delete_chofer);
            $query_delete_coche = "DELETE FROM coches WHERE matricula = '$matricula'";
            mysqli_query($conn, $query_delete_coche);
            $query_delete_maneja = "DELETE FROM maneja WHERE ci = '$cedula' AND matricula = '$matricula'";
            mysqli_query($conn, $query_delete_maneja);
            echo 'Error al guardar en la tabla maneja';
        }
    } else {
        $query_delete_chofer = "DELETE FROM chofer WHERE ci = '$cedula'";
        mysqli_query($conn, $query_delete_chofer);
        $query_delete_coche = "DELETE FROM coches WHERE matricula = '$matricula'";
        mysqli_query($conn, $query_delete_coche);
        echo "Error al guardar los datos del Coche";
    }
} else {
    $query_delete_chofer = "DELETE FROM chofer WHERE ci = '$cedula'";
    mysqli_query($conn, $query_delete_chofer);
    echo 'Error al guardar los datos del Chofer';
}

?>