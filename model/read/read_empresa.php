<?php require_once '../conf_page/conexion.php'; ini_set('display_errors', 'on');

$query = 
'SELECT empresa.cod_cliente as nro_empresa, rut, razon_social, nombre_fantasia, correo, encargado_de_pagos, autorizado, activo, direccion from empresa
JOIN cliente on cliente.cod_cliente = empresa.cod_cliente
where activo = 1';

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
            'col7' => $row['correo'],
            'col8' => $row['encargado_de_pagos'],
            'col9' => $row['autorizado'],
        );
    }
    echo json_encode($json);
} else {
    echo 'Error';
};

?>