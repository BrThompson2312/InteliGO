<?php require_once '../conf_page/conexion.php';

$cod            = $data['cod'];
$concepto       = $data['concepto'];
$importe        = $data['importe'];
$taller         = $data['taller'];
$comentario     = $data['comentario'];

$query_mantenimiento = "UPDATE mantenimiento SET tipo_mantenimiento = '$concepto', gastos_mantenimiento = '$importe', comentarios = '$comentario', taller = '$taller' WHERE cod_mantenimiento = '$cod'";

if (mysqli_query($conn, $query_mantenimiento)) {
    echo true;
} else {
    echo false.mysqli_error($conn);
}

?>