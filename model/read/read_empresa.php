<?php require_once '../conf_page/conexion.php'; ini_set('display_errors', 'on');

$query = 
'SELECT empresa.cod_cliente, telefono, empresa.cod_cliente as nro_empresa, rut, razon_social, nombre_fantasia, correo, encargado_de_pagos, autorizado, activo, direccion, lista_negra from empresa
JOIN cliente on cliente.cod_cliente = empresa.cod_cliente
JOIN telefono_cliente on telefono_cliente.cod_cliente = empresa.cod_cliente
WHERE activo = 1';

$result = mysqli_query($conn, $query);
$json = array();

if($result){
    while($row = mysqli_fetch_assoc($result)){
        $json[] = array(
            'col1' => $row['nro_empresa'],
            'col2' => $row['rut'],
            'col3' => $row['nombre_fantasia'],
            'col4' => $row['correo'],
            'col5' => $row['direccion'],
            'col6' => $row['razon_social'],
            'col7' => $row['encargado_de_pagos'],
            'col8' => $row['autorizado'],
            'col9' => $row['telefono'],
            'col10' => $row['cod_cliente'],
            'col11' => $row['lista_negra']
        );
    }
    echo json_encode($json);
} else {
    echo 'Error';
};

?>