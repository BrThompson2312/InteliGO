<?php require_once '../conf_page/conexion.php';
$query = 'SELECT mantenimiento.cod_mantenimiento, matricula, tipo_mantenimiento, gastos_mantenimiento, comentarios, taller, fecha from mantenimiento
join necesitan on necesitan.cod_mantenimiento = mantenimiento.cod_mantenimiento
WHERE activo = 1;';

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
    echo 'Error';
};

?>