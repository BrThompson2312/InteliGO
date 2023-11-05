<?php require_once '../conf_page/conexion.php'; ini_set('display_errors', 'on');

$data = json_decode(file_get_contents("php://input"), true);

$cod            = $data['cod'];
$concepto       = $data['concepto'];
$importe        = $data['importe'];
$fecha          = $data['fecha'];
$taller         = $data['taller'];
$comentario     = $data['comentario'];

$query_mantenimiento = "UPDATE mantenimiento SET tipo_mantenimiento = '$concepto', gastos_mantenimiento = '$importe', comentarios = '$comentario', taller = '$taller' WHERE cod_mantenimiento = '$cod'";
$query_necesitan = "UPDATE necesitan SET fecha = '$fecha' WHERE cod_mantenimiento = '$cod'";

if (mysqli_query($conn, $query_mantenimiento)) {
    if (mysqli_query($conn, $query_necesitan)) {
        echo 'Modificado con éxito';
    }
} else {
    echo "Error".mysqli_error($conn);
}

?>