<?php require_once '../conf_page/conexion.php';

$telefono   = $data['telefono'];
$nombre     = $data['nombre'];
$apellido   = $data['apellido'];
$cedula     = $data['cedula'];

$arrCond = array();
if ($telefono) $arrCond[] = "telefono LIKE '$telefono%'";
if ($nombre) $arrCond[] = "nombre LIKE '$nombre%'";
if ($apellido) $arrCond[] = "apellido LIKE '$apellido%'";
if ($cedula) $arrCond[] = "chofer.cedula LIKE '$cedula%'";

$condicion = '';
if (count($arrCond) > 0) {
    $condicion = " AND " . implode(" AND ", $arrCond);
}

$query = 
"SELECT telefono, nombre, apellido, chofer.cedula FROM chofer 
JOIN tel_chofer ON tel_chofer.cedula = chofer.cedula WHERE activo = 1 $condicion";

$result = mysqli_query($conn, $query);
$json = array();

if ($result) {
    while ($row = mysqli_fetch_assoc($result)){
        $json[] = array(
            'col1' => $row['telefono'],
            'col2' => $row['nombre'],
            'col3' => $row['apellido'],
            'col4' => $row['cedula']
        );
    }
    echo json_encode($json);
} else {
    echo 'No hay conexion';
}

?>