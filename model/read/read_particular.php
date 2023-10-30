<?php require_once '../conf_page/conexion.php'; ini_set('display_errors', 'on');

$query = 
'SELECT particular.cod_cliente as nro_particular, telefono, nombre, apellido, direccion, lista_negra FROM particular
JOIN cliente on cliente.cod_cliente = particular.cod_cliente
JOIN telefono_cliente on telefono_cliente.cod_cliente = particular.cod_cliente
WHERE activo = 1';

$result = mysqli_query($conn, $query);
$json = array();

if($result){
    while($row = mysqli_fetch_assoc($result)){
        $json[] = array(
            'col1' => $row['nro_particular'],
            'col2' => $row['telefono'],  
            'col3' => $row['nombre'],
            'col4' => $row['apellido'],  
            'col5' => $row['direccion'],
            'col6' => $row['lista_negra']
        );
    }
    echo json_encode($json);
} else {
    echo 'Error';
};

?>