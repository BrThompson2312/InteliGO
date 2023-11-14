<?php require_once '../conf_page/conexion.php'; ini_set('display_errors','on');

$data = json_decode(file_get_contents("php://input"), true);

$cliente    = $data['cliente'];
$telefono   = $data['telefono'];
$nombre     = $data['nombre'];
$apellido   = $data['apellido'];
$direccion  = $data['direccion'];

$query = "SELECT particular.cod_cliente as nro_particular, telefono, nombre, apellido, direccion, lista_negra FROM particular
JOIN cliente on cliente.cod_cliente = particular.cod_cliente
JOIN telefono_cliente on telefono_cliente.cod_cliente = particular.cod_cliente
WHERE activo = 1 
AND particular.cod_cliente LIKE '$cliente%' 
AND telefono LIKE '$telefono%'
AND nombre LIKE '$nombre%'
AND apellido LIKE '$apellido%'
AND direccion LIKE '$direccion%'";

$result = mysqli_query($conn, $query);
$json = array();

if ($result) {
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
    echo 'No hay conexión';
}


?>