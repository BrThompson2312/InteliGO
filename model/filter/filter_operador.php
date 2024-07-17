<?php require_once '../conf_page/conexion.php';

$cedula     = $data['cedula'];
$nombre     = $data['nombre'];
$fechaing   = $data['fechaing'];

$arrCond = array();
if ($cedula) $arrCond[] = "cedula LIKE '$cedula%'";
if ($nombre) $arrCond[] = "nombre_usuario LIKE '$nombre%'";
if ($fechaing) $arrCond[] = "fecha_ingreso LIKE '$fechaing%'";

$condicion = '';
if (count($arrCond) > 0) {
    $condicion = " AND " . implode(" AND ", $arrCond);
}

$query_cedula = 
"SELECT cedula, nombre_usuario, fecha_ingreso FROM usuario
WHERE rol_usuario = 'operador' AND activo = 1 $condicion";

$array = array();

$result_cedula = mysqli_query($conn, $query_cedula);
if ($result_cedula) {
    while ($row = mysqli_fetch_assoc($result_cedula)) {
        $array[] = array (
            'col1' => $row['cedula'],
            'col2' => $row['nombre_usuario'],
            'col3' => $row['fecha_ingreso']
        );
    }
    echo json_encode($array);
}

?>