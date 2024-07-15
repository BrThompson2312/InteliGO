<?php require_once '../conf_page/conexion.php'; ini_set('display_errors','on');

$data = json_decode(file_get_contents("php://input"), true);

$codigo     = $data['codigo'];
$matricula  = $data['matricula'];
$concepto   = $data['concepto'];
$comentario = $data['comentario'];
$importe    = $data['importe'];
$taller     = $data['taller'];
$fecha      = $data['fecha'];

$arrCond = array();
if ($codigo) $arrCond[] = "mantenimiento.cod_mantenimiento LIKE '$codigo%'";
if ($matricula) $arrCond[] = "matricula LIKE '$matricula%'";
if ($concepto) $arrCond[] = "tipo_mantenimiento LIKE '$concepto%'";
if ($comentario) $arrCond[] = "comentarios LIKE '$comentario%'";
if ($importe) $arrCond[] = "gastos_mantenimiento LIKE '$importe%'";
if ($taller) $arrCond[] = "taller LIKE '$taller%'";
if ($fecha) $arrCond[] = "fecha LIKE '$fecha%'";

$condicion = '';
if (count($arrCond) > 0) {
     $condicion = " AND " . implode(" AND ", $arrCond);
}

$query = 
"SELECT mantenimiento.cod_mantenimiento, matricula, tipo_mantenimiento, gastos_mantenimiento, comentarios, taller, fecha from mantenimiento
join necesitan on necesitan.cod_mantenimiento = mantenimiento.cod_mantenimiento WHERE activo = 1 $condicion";

$result = mysqli_query($conn, $query);
$json = array();

if($result){
    while($row = mysqli_fetch_assoc($result)){
        $json[] = array(
            'col1' => $row['cod_mantenimiento'],
            'col2' => $row['matricula'],
            'col3' => $row['tipo_mantenimiento'],  
            'col4' => $row['comentarios'], 
            'col5' => $row['gastos_mantenimiento'],
            'col6' => $row['taller'],
            'col7' => $row['fecha'],
        );
    }
    echo json_encode($json);
} else {
    echo 'Error'.mysqli_error($conn);
};

?>