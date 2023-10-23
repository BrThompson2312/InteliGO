<?php require_once '../conf_page/conexion.php';

ini_set('display_errors', 'on');

$query = 'SELECT mantenimiento.cod_mantenimiento, matricula, tipo_mantenimiento, gastos_mantenimiento, comentarios from mantenimiento
join necesitan on necesitan.cod_mantenimiento = mantenimiento.cod_mantenimiento;';

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
            // 'col6' => $row['fecha'];
            // 'col7' => $row['empresa'],
        );
    }
    echo json_encode($json);
} else {
    echo 'Error';
};

?>