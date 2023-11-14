<?php require_once '../conf_page/conexion.php'; ini_set('display_errors','on');

$data = json_decode(file_get_contents("php://input"), true);

$codigo     = $data['codigo'];
$matricula  = $data['matricula'];
$concepto   = $data['concepto'];
$comentario = $data['comentario'];
$importe    = $data['importe'];
$taller     = $data['taller'];
$fecha      = $data['fecha'];

$query = "SELECT mantenimiento.cod_mantenimiento, matricula, tipo_mantenimiento, gastos_mantenimiento, comentarios, taller, fecha from mantenimiento
join necesitan on necesitan.cod_mantenimiento = mantenimiento.cod_mantenimiento
WHERE activo = 1
AND mantenimiento.cod_mantenimiento LIKE '$codigo%'
AND matricula LIKE '$matricula%'
AND tipo_mantenimiento LIKE '$concepto%'
AND comentarios LIKE '$comentario%'
AND gastos_mantenimiento LIKE '$importe%'
AND taller LIKE '$taller%'
AND fecha LIKE '$fecha%'";

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