<?php require_once '../conf_page/conexion.php';

$cod        = $data['codigo'];
$matricula  = $data['matricula'];
$concepto   = $data['concepto'];
$importe    = $data['importe'];
$taller     = $data['taller'];
$comentario = $data['comentario'];

$query_mantenimiento = "INSERT INTO mantenimiento VALUES ('$cod', '$concepto','$importe','$comentario','$taller', 1)";
$result_mantenimiento  = mysqli_query($conn, $query_mantenimiento);
if ($result_mantenimiento){

    $query_necesitan = "INSERT INTO necesitan VALUES ('$cod','$matricula', now())";
    $result_necesitan = mysqli_query($conn, $query_necesitan);
    if ($result_necesitan) {

        $query_coche = "UPDATE coches SET activo = 0 WHERE matricula = '$matricula'";
        $result_coche = mysqli_query($conn, $query_coche);
        if ($result_coche) {

            echo true;

        } else {
            mysqli_query($conn, "DELETE FROM necesitan where cod_mantenimiento = $cod");
            mysqli_query($conn, "DELETE FROM mantenimiento where cod_mantenimiento = $cod");
            echo 'Error Update Coche'.mysqli_error($conn);
        }
    } else {
        mysqli_query($conn, "UPDATE coches SET activo = 1 WHERE matricula = '$matricula'");
        mysqli_query($conn, "DELETE FROM mantenimiento WHERE cod_mantenimiento = $cod");
        echo 'Error necesitan'.mysqli_error($conn);
    }
} else {
    $query_coche = "UPDATE coches SET activo = 1 WHERE matricula = '$matricula'";
    mysqli_query($conn, $query_coche);
    echo 'Error Mantenimiento'.mysqli_error($conn);
}

?>