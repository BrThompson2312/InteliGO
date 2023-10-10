<?php require_once '../conexion.php';

ini_set('display_errors', 'on');

$query = 'SELECT cliente.cod_cliente as cod_cliente, rut, razon_social, nombre_fantasia, Email, telefono, direccion, lista_negra from empresa
join cliente on cliente.cod_cliente = empresa.cod_cliente
join telefono_cliente on telefono_cliente.cod_cliente = cliente.cod_cliente;';

$result = mysqli_query($conn, $query);
$json = array();

if($result){
    while($row = mysqli_fetch_assoc($result)){
        $json[] = array(
            'col1' => $row['rut'],
            'col2' => $row['lista_negra'],
            'col3' => $row['nombre_fantasia'],
            'col4' => $row['razon_social'],
            'col5' => $row['direccion'],
            'col6' => $row['telefono'],
            'col7' => $row['Email']
        );
    }
    echo json_encode($json);
} else {
    echo 'Error';
};

?>