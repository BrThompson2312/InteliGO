<?php require_once '../conf_page/conexion.php'; ini_set('display_errors','on');

$query_cod = "SELECT cod_cliente FROM cliente WHERE activo = 1";

$query_particular = "SELECT cliente.cod_cliente AS cod_cliente, nombre, apellido FROM cliente 
join particular on particular.cod_cliente = cliente.cod_cliente";

$query_empresa = "SELECT cliente.cod_cliente AS cod_cliente, razon_social, autorizado from cliente
join empresa on empresa.cod_cliente = cliente.cod_cliente;";

$cliente = array();

$result_particular = mysqli_query($conn, $query_particular);
if ($result_particular) {
    while ($row = mysqli_fetch_assoc($result_particular)){
        $cliente[] = array (
            'cod_cliente' => $row['cod_cliente'],
            'col1' => $row['nombre'],
            'col2' => $row['apellido'],
            'col3' => $row['apellido']
        );
    }
}

$result_empresa = mysqli_query($conn, $query_empresa);
if ($result_empresa) {
    while ($row = mysqli_fetch_assoc($result_empresa)){
        $cliente[] = array (
            'cod_cliente' => $row['cod_cliente'],
            'col1' => $row['razon_social'],
            'col2' => $row['autorizado']
        );
    }
}

echo json_encode($cliente);

?>