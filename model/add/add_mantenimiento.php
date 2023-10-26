<?php require_once '../conf_page/conexion.php'; ini_set('display_errors','on');

$cod        = $_POST['codigo'];
$matricula  = $_POST['matricula'];
$fecha      = $_POST['fecha'];
$concepto   = $_POST['concepto'];
$importe    = $_POST['importe'];
$taller     = $_POST['taller'];
$comentario = $_POST['comentario'];

$query_mantenimiento = "INSERT INTO mantenimiento VALUES ('$cod', '$concepto','$importe','$comentario','$taller',1)";
$query_necesitan     = "INSERT INTO necesitan VALUES ('$cod', '$matricula', '$fecha')";
$query_coche         = "UPDATE coches SET activo = 0 WHERE matricula = '$matricula'";

$result_mantenimiento  = mysqli_query($conn, $query_mantenimiento);
$result_necesitan      = mysqli_query($conn, $query_necesitan);
$result_coche          = mysqli_query($conn, $query_coche);

if ($result_mantenimiento){
    if ($result_necesitan) {
        if ($result_coche) {
            echo true;
        } else {
            $result_delete_mantenimiento = "DELETE FROM mantenimiento where cod_mantenimiento = $cod"; 
            $result_delete_necesitan = "DELETE FROM necesitan where cod_mantenimiento = $cod"; 
            mysqli_query($conn, $result_delete_mantenimiento);
            mysqli_query($conn, $result_delete_necesitan);
            echo 'Error Update Coche';
        }
    } else {
        $query_coche = "UPDATE coches SET activo = 1 WHERE matricula = '$matricula'";
        $result_delete_mantenimiento = "DELETE FROM mantenimiento WHERE cod_mantenimiento = $cod"; 
        mysqli_query($conn, $query_coche);
        mysqli_query($conn, $result_delete_mantenimiento);
        echo 'Error necesitan';
    }
} else {
    $query_coche = "UPDATE coches SET activo = 1 WHERE matricula = '$matricula'";
    mysqli_query($conn, $query_coche);
    echo 'Error Mantenimiento';
}

?>