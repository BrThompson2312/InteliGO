<?php require_once '../conexion.php';

ini_set('display_errors', 'on');

$query = 'SELECT * FROM mantenimiento ORDER BY tipo_mantenimiento';
$result = mysqli_query($conn, $query);
$json = array();

if($result){
    while($row = mysqli_fetch_assoc($result)){
        $json[] = array(
            'col1' => $row['cod_mantenimiento'],
            'col2' => '',
            'col3' => $row['tipo_mantenimiento'],  
            'col4' => $row['gastos_mantenimiento'], 
            'col5' => $row['comentarios'], 
        );
    }
    echo json_encode($json);
} else {
    echo 'Error';
};

?>