<?php require_once '../conf_page/conexion.php';

ini_set('display_errors','on');

$cod = $_POST['cod_gdm'];
$fecha = $_POST['fecha_gdm'];
$concepto = $_POST['concepto_gdm'];
$importe = $_POST['importe_gdm'];
$comentario = $_POST['comentario_gdm'];

$query = "INSERT INTO mantenimiento VALUES ('$cod', '$concepto','$importe','$comentario')";
$result = mysqli_query($conn, $query);
if ($result){
    echo 'Formulario rellenado con éxito';
} else {
    echo 'Fallo';
}

?>