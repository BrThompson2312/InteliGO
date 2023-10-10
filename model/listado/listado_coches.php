<?php require_once '../conexion.php';

ini_set('display_errors', 'on');

$query = 'SELECT * FROM coches';
$result = mysqli_query($conn, $query);
$json = array();

if($result){
    while($row = mysqli_fetch_assoc($result)){
        $json[] = array(
            'col1' => $row['matricula'],
            'col2' => $row['marca'],
            'col3' => $row['modelo'],
            'col4' => $row['año']
        );
    }
    echo json_encode($json);
} else {
    echo 'Error';
};

?>