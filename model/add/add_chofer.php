<?php require_once '../conf_page/conexion.php';

$telefono   = $data['telefono'];
$nombre     = $data['nombre'];
$apellido   = $data['apellido'];
$cedula     = $data['cedula'];

$query  = "INSERT INTO chofer VALUES ('$cedula', '$nombre', '$apellido', NULL, 1)";
$result = mysqli_query($conn, $query);

if ($result) {
    $query_tel  = "INSERT INTO tel_chofer VALUES ('$cedula', '$telefono')";
    $result_tel = mysqli_query($conn, $query_tel);
    if ($result_tel) {
        echo true;
    } else {
        $result_delete = mysqli_query($conn, "DELETE FROM chofer WHERE cedula = '$cedula'");
        echo false;
    }
} else {
    echo false;
}

?>