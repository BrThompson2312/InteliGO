<?php require_once '../conf_page/conexion.php'; ini_set('display_errors', 'on');

$cedula     = $_POST['cedula'];
$nombre     = $_POST['nombre'];
$telefono   = $_POST['telefono'];
$matricula  = $_POST['matricula'];

$query_chofer   = "INSERT INTO chofer VALUES ('$cedula', '$nombre', 1)";
$query_maneja   = "INSERT INTO maneja VALUES ('$cedula', '$matricula')";
$query_tel      = "INSERT INTO tel_chofer VALUES ('$cedula', '$telefono')";

$result_chofer  = mysqli_query($conn, $query_chofer);
$result_maneja  = mysqli_query($conn, $query_maneja);
$result_tel     = mysqli_query($conn, $query_tel);

if ($result_chofer) {
    if ($result_tel) {
        if ($result_maneja) {
            echo true;
        } else {
            $query_delete_chofer    = "DELETE FROM chofer WHERE cedula ='$cedula'";
            $query_delete_tel       = "DELETE FROM tel_chofer WHERE telefono = '$telefono'";
            mysqli_query($conn, $query_delete_chofer);
            mysqli_query($conn, $query_delete_tel);
            echo false;
        }
    } else {
        $query_delete_chofer = "DELETE FROM chofer WHERE cedula = '$cedula'";
        mysqli_query($conn, $query_delete_chofer);
        echo false;
    }
} else {
    echo false;
}

?>