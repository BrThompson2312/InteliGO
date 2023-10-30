<?php require_once '../conf_page/conexion.php'; ini_set('display_errors','on');

$cod        = $_POST['codigo'];
$matricula  = $_POST['matricula'];
$fecha      = $_POST['fecha'];
$concepto   = $_POST['concepto'];
$importe    = $_POST['importe'];
$taller     = $_POST['taller'];
$comentario = $_POST['comentario'];

$query_mantenimiento = "INSERT INTO mantenimiento VALUES ('$cod', '$concepto','$importe','$comentario','$taller',1)";
$query_necesitan     = "INSERT INTO necesitan VALUES ('$cod','$matricula','$fecha')";
$query_coche         = "UPDATE coches SET activo = 0 WHERE matricula = '$matricula'";
$query_maneja        = "DELETE FROM maneja WHERE matricula = '$matricula'"; 

$result_mantenimiento  = mysqli_query($conn, $query_mantenimiento);
$result_necesitan      = mysqli_query($conn, $query_necesitan);
$result_coche          = mysqli_query($conn, $query_coche);
$result_maneja         = mysqli_query($conn, $query_maneja);

if ($result_mantenimiento){
    if ($result_necesitan) {
        if ($result_coche) {
            if ($result_maneja) {
                echo true;
            } else {
                mysqli_query($conn, "DELETE FROM mantenimiento where cod_mantenimiento = $cod");
                mysqli_query($conn, "DELETE FROM necesitan where cod_mantenimiento = $cod");
                mysqli_query($conn, "UPDATE coches SET activo = 1 WHERE matricula = '$matricula'");
                echo 'Error Maneja';
            }
        } else {
            mysqli_query($conn, "DELETE FROM mantenimiento where cod_mantenimiento = $cod");
            mysqli_query($conn, "DELETE FROM necesitan where cod_mantenimiento = $cod");
            echo 'Error Update Coche';
        }
    } else {
        mysqli_query($conn, "UPDATE coches SET activo = 1 WHERE matricula = '$matricula'");
        mysqli_query($conn, "DELETE FROM mantenimiento WHERE cod_mantenimiento = $cod");
        echo 'Error necesitan';
    }
} else {
    $query_coche = "UPDATE coches SET activo = 1 WHERE matricula = '$matricula'";
    mysqli_query($conn, $query_coche);
    echo 'Error Mantenimiento';
}

?>