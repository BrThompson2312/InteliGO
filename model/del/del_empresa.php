<?php require_once '../conf_page/conexion.php';

$cod_cliente = $_POST['send'];

$query = "UPDATE cliente SET activo = 0 WHERE cod_cliente = $cod_cliente";
$result = mysqli_query($conn, $query);

if ($result){
    echo true;
} else {
    echo false;
}

?>