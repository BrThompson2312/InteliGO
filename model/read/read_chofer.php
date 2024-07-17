<?php require_once '../conf_page/conexion.php';

$query = 
    'SELECT chofer.cedula , nombre, apellido, telefono FROM chofer
    JOIN tel_chofer ON tel_chofer.cedula = chofer.cedula
    WHERE activo = 1';

$result = mysqli_query($conn, $query);
$json   = array();

if($result){
    while($row = mysqli_fetch_assoc($result)){
        $json[] = array(
            'col1' => $row['telefono'],
            'col2' => $row['nombre'],
            'col3' => $row['apellido'],
            'col4' => $row['cedula']
        );
    }
    echo json_encode($json);
} else {
    echo 'Error';
};

?>