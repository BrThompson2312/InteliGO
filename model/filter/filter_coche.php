<?php require_once '../conf_page/conexion.php'; ini_set('display_errors','on');

$data = json_decode(file_get_contents("php://input"), true);

$matricula  = $data['matricula'];
$marca      = $data['marca'];
$modelo     = $data['modelo'];
$año        = $data['año'];

$arrCond = array();
if ($matricula) $arrCond[] = "matricula LIKE '$matricula%'";
if ($marca) $arrCond[] = "marca LIKE '$marca%'";
if ($modelo) $arrCond[] = "modelo LIKE '$modelo%'";
if ($año) $arrCond[] = "año LIKE '$año%'";

$condicion = '';
if (count($arrCond) > 0) {
    $condicion = " AND " . implode(" AND ", $arrCond);
}

$query = "SELECT matricula, marca, modelo, año FROM coches WHERE activo = 1 $condicion";

$result = mysqli_query($conn, $query);
$json = array();

if ($result){
    while ($row = mysqli_fetch_assoc($result)) {
        $json[] = array(
            'col1' => $row['matricula'],
            'col2' => $row['marca'],
            'col3' => $row['modelo'],
            'col4' => $row['año']
        );
    }    
    echo json_encode($json);
} else {
    echo 'No hay conexión';
}

?>