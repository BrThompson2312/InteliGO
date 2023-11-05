<?php require_once '../conf_page/conexion.php'; ini_set('display_errors','on');

$query = "SELECT cod_cliente FROM cliente WHERE activo = 1";
$result = mysqli_query($conn, $query);
$cod_cliente = array();

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $cod_cliente[] = array(
            'cod_cliente' => $row['cod_cliente']
        );
    }
    echo json_encode($cod_cliente);
}


?>