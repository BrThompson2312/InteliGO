<?php require_once '../conf_page/conexion.php';

ini_set('display_errors', 'on');

$query = 'SELECT cliente.cod_cliente, lista_negra, nombre, apellido, direccion, telefono from cliente
join particular on particular.cod_cliente = cliente.cod_cliente
join telefono_cliente on telefono_cliente.cod_cliente = cliente.cod_cliente;';

$result = mysqli_query($conn, $query);
$json = array();

if($result){
    while($row = mysqli_fetch_assoc($result)){
        $json[] = array(
            'col1' => $row['telefono'],
            'col2' => $row['lista_negra'],  
            'col3' => $row['nombre'],
            'col4' => $row['apellido'],  
            'col5' => $row['direccion'],
        );
    }
    echo json_encode($json);
} else {
    echo 'Error';
};

?>