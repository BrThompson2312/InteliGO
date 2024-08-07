<?php require_once '../conf_page/conexion.php';

$cliente        = $data['cliente'];
$rut            = $data['rut'];
$nombre         = $data['nombre'];
$correo         = $data['correo'];
$direccion      = $data['direccion'];
$razonsocial    = $data['razonsocial'];
$encargado      = $data['encargado'];
$autorizado     = $data['autorizado'];
$telefono       = $data['telefono'];
$listanegra     = $data['listanegra'];

$arrCond = array();
if ($cliente) $arrCond[]        = "empresa.cod_cliente LIKE '$cliente%'";
if ($rut) $arrCond[]            = "rut LIKE '$rut%'";
if ($nombre) $arrCond[]         = "nombre_fantasia LIKE '$nombre%'";
if ($correo) $arrCond[]         = "correo LIKE '$correo%'";
if ($direccion) $arrCond[]      = "direccion LIKE '$direccion%'";
if ($razonsocial) $arrCond[]    = "razon_social LIKE '$razonsocial%'";
if ($encargado) $arrCond[]      = "encargado_de_pagos LIKE '$encargado%'";
if ($autorizado) $arrCond[]     = "autorizado LIKE '$autorizado%'";
if ($telefono) $arrCond[]       = "telefono LIKE '$telefono%'";
if ($listanegra==1 || $listanegra==0) $arrCond[] = "lista_negra='$listanegra'";

$condicion = '';
if (count($arrCond) > 0){
    $condicion = " AND " . implode(" AND ", $arrCond);
}

$query = 
"SELECT 
    empresa.cod_cliente as nro_empresa, 
    telefono, 
    rut, 
    razon_social, 
    nombre_fantasia, 
    correo, 
    encargado_de_pagos, 
    autorizado, 
    activo, 
    direccion, 
    lista_negra
FROM empresa
JOIN cliente on cliente.cod_cliente = empresa.cod_cliente
JOIN telefono_cliente on telefono_cliente.cod_cliente = empresa.cod_cliente
WHERE activo = 1 $condicion";

$result = mysqli_query($conn, $query);
$json = array();

if($result){
    while($row = mysqli_fetch_assoc($result)){
        $json[] = array(
            'col1'=>$row['nro_empresa'],
            'col2'=>$row['rut'],
            'col3'=>$row['nombre_fantasia'],
            'col4'=>$row['correo'],
            'col5'=>$row['direccion'],
            'col6'=>$row['razon_social'],
            'col7'=>$row['encargado_de_pagos'],
            'col8'=>$row['autorizado'],
            'col9'=>$row['telefono'],
            'col10'=>$row['lista_negra']
        );
    }
    echo json_encode($json);
} else {
    echo 'Error de conexión a la BD';
};

?>